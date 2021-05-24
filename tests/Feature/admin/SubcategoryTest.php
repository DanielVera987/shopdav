<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Subcategory;
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

        $res = $this->get(route('admin.subcategories.index'));

        $res->assertStatus(200);
    }

    /*public function test_admin_can_be_new_create_subcategory()
    {

    }

    public function test_admin_can_be_rendered_screen_edit_subcategories()
    {
        
    }

    public function test_admin_can_be_rendered_screen_edit_subcategory()
    {

    }

    public function test_admin_can_edit_subcategory()
    {

    }

    public function test_admin_can_destroy_subcategory()
    {
        
    } */

    public function admin_authenticate()
    {
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
