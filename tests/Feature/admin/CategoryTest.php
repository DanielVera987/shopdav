<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_screen_can_be_rendered()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }

    public function test_admin_can_create_new_category()
    {
        Role::create(['name' => 'super-admin']);
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        Storage::fake('categories');
        $image = UploadedFile::fake()->image('new_category.jpg');
        $imageName = time() . bcrypt('new_category') . '.jpg';

        $response = $this->post(route('admin.categories.store'), [
            "name" => "New Category",
            "description" => "A description",
            "image" => $image
        ]);

        $response->assertStatus(302)
                 ->assertRedirect(route('admin.categories.index'));

        //Storage::disk('categories')->assertExists($imageName);

        $this->assertDatabaseHas('categories', [
            "name" => "New Category"
        ]);
    }

    public function test_admin_can_destroy_category()
    {
        $this->admin_authenticate();

        $category = Category::factory()->create();

        $response = $this->delete(route('admin.categories.destroy', $category->id));

        $response->assertStatus(302)
                 ->assertRedirect(route('admin.categories.index'));
    }

    public function test_admin_can_be_rendered_edit_category_screen() 
    {
        $this->admin_authenticate();

        $category = Category::factory()->create();

        $res = $this->get(route('admin.categories.edit', $category->id));
        $res->assertStatus(200)
            ->assertSee($category->name);
    }

    public function test_admin_can_edit_category_without_image()
    {
        $this->admin_authenticate();

        $category = Category::factory()->create();

        $res = $this->put(route('admin.categories.update', $category->id), [
            "name" => "New Category 2",
            "description" => "New description"
        ]);

        $res->assertStatus(302)
            ->assertRedirect(route('admin.categories.edit', $category->id));

        $this->assertDatabaseHas('categories', [
            "name" => "New Category 2",
            "description" => "New description" 
        ]);
    }

    public function test_admin_can_edit_category_with_image()
    {
        $this->admin_authenticate();

        $category = Category::factory()->create();

        Storage::fake('categories');
        $image = UploadedFile::fake()->image('new_category.jpg');

        $res = $this->put(route('admin.categories.update', $category->id), [
            "name" => "New Category 2",
            "description" => "New description",
            "image" => $image
        ]);

        $res->assertStatus(302)
            ->assertRedirect(route('admin.categories.edit', $category->id));

        $this->assertDatabaseHas('categories', [
            "name" => "New Category 2",
            "description" => "New description"
        ]);
    }

    public function admin_authenticate()
    {
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }

    //expected errors

    public function test_admin_when_creating_category_required_name() 
    {
        $this->admin_authenticate();

        $response = $this->post(route('admin.categories.store'), [
            "name" => "",
            "description" => "A description",
            "image" => ""
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_admin_when_creating_category_required_description() 
    {
        $this->admin_authenticate();

        $response = $this->post(route('admin.categories.store'), [
            "name" => "new category",
            "description" => "",
            "image" => ""
        ]);

        $response->assertSessionHasErrors(['description']);
    }

    public function test_admin_when_creating_category_required_image() 
    {
        $this->admin_authenticate();

        $response = $this->post(route('admin.categories.store'), [
            "name" => "New category",
            "description" => "a description",
            "image" => ""
        ]);

        $response->assertSessionHasErrors(['image']);
    }
}
