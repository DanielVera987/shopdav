<?php

namespace Tests\Feature\admin;

use App\Models\Brand;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_be_rendered_screen_list_brand()
    {
        Role::create(['name' => 'super-admin']);
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $this->admin_authenticate();
        $res = $this->get(route('admin.brands.index'));

        $res->assertStatus(200);
    }

    public function test_admin_can_be_rendered_screen_new_brand_create() 
    {
        $this->admin_authenticate();
        $res = $this->get(route('admin.brands.create'));

        $res->assertStatus(200);
    }

    public function test_admin_can_be_create_new_brand() 
    {
        $this->admin_authenticate();

        $res = $this->post(route('admin.brands.store'), [
            'name' => 'HUAWEI'
        ]);

        $res->assertStatus(302)
            ->assertRedirect(route('admin.brands.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('brands', ['name' => 'HUAWEI']);
    }

    public function test_admin_can_be_rendered_screen_edit_brand()
    {
        $this->admin_authenticate();

        $brand = Brand::factory()->create();

        $res = $this->get(route('admin.brands.edit', $brand->id));
        $res->assertStatus(200)
            ->assertSee($brand->name);
    }

    public function test_admin_can_be_update_brand() 
    {
        $this->admin_authenticate();

        $brand = Brand::factory()->create();

        $res = $this->put(route('admin.brands.update', $brand->id), [
            'name' => 'HUAWEI'
        ]);

        $res->assertStatus(302)
            ->assertRedirect(route('admin.brands.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('brands', ['name' => 'HUAWEI']);
    }

    public function test_admin_can_be_delete_brand() 
    {
        $this->admin_authenticate();

        $brand = Brand::factory()->create();

        $res = $this->delete(route('admin.brands.destroy', $brand->id));

        $res->assertStatus(302)
            ->assertRedirect(route('admin.brands.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('brands', ['name' => $brand->name]);
    }

    public function admin_authenticate()
    {        
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
