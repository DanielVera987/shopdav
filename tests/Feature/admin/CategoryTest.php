<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
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
        $this->admin_authenticate();

        Storage::fake('categories');
        $image = UploadedFile::fake()->image('new_category.jpg');

        $response = $this->post(route('admin.categories.store'), [
            "name" => "New Category",
            "description" => "A description",
            "image" => $image
        ]);

        $response->assertStatus(200);

        Storage::disk('categories')->assertExists($image->hashName());

        $this->assertDatabaseHas('categories', [
            "name" => "New Category"
        ]);
    }

    public function admin_authenticate()
    {
        $response = $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
