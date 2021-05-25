<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubcategoryTest extends TestCase
{
    public function test_admin_can_be_rendered_screen_list_categories()
    {
        $this->admin_authenticate();

        $subcategory = Subcategory::factory()
            ->for(Category::factory()->create())
            ->create();

        $response = $this->get(route('admin.subcategories.index'));

        $response->assertStatus(200)
            ->assertSee($subcategory->name);
    }

    public function test_admin_can_be_rendered_screen_create_subcategory()  
    {
        $this->admin_authenticate();

        $res = $this->get(route('admin.subcategories.create'));

        $res->assertStatus(200);    
    }

    public function test_admin_can_be_new_create_subcategory()
    {
        $this->admin_authenticate();

        Storage::fake('subcategories');
        $image = UploadedFile::fake()->image('new_subcategory.jpg');
        $category = Category::factory()->create();

        $res = $this->post(route('admin.subcategories.store'), [
            'name' => 'New Subcategory',
            'description' => 'Description of new subcategory',
            'category_id' => $category->id,
            'image' => $image
        ]);

        $res->assertStatus(302)
            ->assertRedirect(route('admin.subcategories.index'))
            ->assertSessionHas('success', 'Subcategoria creada');

        $this->assertDatabaseHas('subcategories', [
            'name' => 'New Subcategory',
            'description' => 'Description of new subcategory',
            'category_id' => $category->id,
        ]);
    }

    public function test_admin_can_be_rendered_screen_edit_subcategories()
    {
        $this->admin_authenticate();
        $subcate = Subcategory::factory()
            ->for(Category::factory()->create())
            ->create();

        $res = $this->get(route('admin.subcategories.edit', $subcate->id));
        $res->assertStatus(200)
            ->assertSee($subcate->name);            
    }

    public function test_admin_can_edit_subcategory_with_image()
    {
        $this->admin_authenticate();

        $sub = Subcategory::factory()
            ->for(Category::factory()->create())
            ->create();

        Storage::fake('subcategories');
        $image = UploadedFile::fake()->image('new_subcategory.jpg');

        $res = $this->put(route('admin.subcategories.update', $sub->id), [
            'name' => 'New Subcategory update',
            'description' => 'Description update',
            'category_id' => $sub->category_id,
            'image' => $image
        ]);

        $res->assertStatus(302)
            ->assertRedirect(route('admin.subcategories.index'))
            ->assertSessionHas('success', 'Subcategoria actualizada');

        $this->assertDatabaseHas('subcategories', [
            'name' => 'New Subcategory update',
            'description' => 'Description update',
            'category_id' => $sub->category_id,
        ]);
    }

    public function test_admin_can_destroy_subcategory()
    {
        $this->admin_authenticate();

        $subcategory = Subcategory::factory()
            ->for(Category::factory()->create())
            ->create();

        $res = $this->delete(route('admin.subcategories.destroy', $subcategory->id));
        
        $res->assertStatus(302)
            ->assertRedirect(route('admin.subcategories.index'))
            ->assertSessionHas('success', 'Subcategoria eliminada');

        $this->assertDatabaseMissing('subcategories', [
            'id' => $subcategory->id
        ]);
    }

    public function admin_authenticate()
    {
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
