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

    public function admin_authenticate()
    {
        $this->post('/login', [
            'email' => 'test@correo.com',
            'password' => 'password',
        ]);
    }
}
