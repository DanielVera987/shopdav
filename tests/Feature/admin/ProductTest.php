<?php

namespace Tests\Feature\admin;

use Tests\TestCase;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
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

        $response = $this->post(route('admin.products.store'), [
            'name' => 'Name of product',
            'description' => 'Description of product',
            'code' => 0000000001,
            'price' => 52.30,
            'quantity' => 5,
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id,
            'sizes' => [],
            'colors' => [],
            'discount_id' => null,
            'image1' => null,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null,
        ]);

        $response->assertStatus(302)
            ->assertRedirect(route('admin.products.index'))
            ->assertSee('Producto Creado');

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
