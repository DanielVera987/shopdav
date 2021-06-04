<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Subcategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    public function test_admin_can_be_screen_list_products()
    {
        $this->admin_authenticate();

        $product = Product::factory()
            ->for(Subcategory::factory()->for(Category::factory()->create())->create())
            ->for(Brand::factory()->create())
            ->create();
            
        $response = $this->get(route('admin.products.index'));

        $response->assertStatus(200)
            ->assertSee($product->name);
    }

    public function test_admin_can_be_screen_create_product()
    {
        $this->admin_authenticate();

        $response = $this->get(route('admin.products.create'));

        $response->assertStatus(200)
            ->assertSee('Crear Nuevo Producto');
    }

    public function test_admin_can_be_create_product()
    {
        $this->admin_authenticate();

        $subcategory = Subcategory::factory()
            ->for(Category::factory()->create())
            ->create();

        $brand = Brand::factory()->create();
        $colors = Color::factory()->create();

        Storage::fake('categories');
        $image = UploadedFile::fake()->image('new_category.jpg');

        $response = $this->from(route('admin.products.index'))
            ->post(route('admin.products.store'), [
                'name' => 'Name of product',
                'content' => 'Description of product',
                'code' => 0000000001,
                'price' => 52.30,
                'quantity' => 5.00,
                'subcategory_id' => $subcategory->id,
                'brand_id' => $brand->id,
                'colors' => [
                    "0" => $colors->id
                ], 
                /*'discount_id' => null, */
                'image1' => $image,
                'image2' => null,
                'image3' => null,
                'image4' => null,
                'image5' => null,
            ]
        );

        //dd($response);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.products.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('products', [
            'name' => 'Name of product',
            'code' => 0000000001,
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
