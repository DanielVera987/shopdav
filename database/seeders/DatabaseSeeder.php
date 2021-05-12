<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Subcategory;
use App\Models\BrandCategory;
use App\Models\ColorProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->create();

        BrandCategory::factory()
            ->count(1)
            ->for(Brand::factory()->create())
            ->for(Category::factory()->create())
            ->create();

        BrandCategory::factory()
            ->count(1)
            ->for(Brand::factory()->create())
            ->for(Category::factory()->create())
            ->create();

        BrandCategory::factory()
            ->count(1)
            ->for(Brand::factory()->create())
            ->for(Category::factory()->create())
            ->create();

        Subcategory::factory()
            ->count(3)
            ->for(Category::factory()->create())
            ->create();

        Discount::factory()->count(3)->create();

        $products = Product::factory()
            ->count(5)
            ->for(Subcategory::factory()->for(Category::factory()->create())->create())
            ->for(Brand::factory()->create())
            ->for(Discount::factory()->create())
            ->create();

        $product = Product::factory()
            ->for(Subcategory::factory()->for(Category::factory()->create())->create())
            ->for(Brand::factory()->create())
            ->for(Discount::factory()->create())
            ->create();

        Coupon::factory()
            ->count(3)
            ->for($product)
            ->create();

        Image::factory()
            ->count(4)
            ->for($product)
            ->create();
        
        $sizes = Size::factory()
            ->count(4)
            ->for($product)
            ->create();

        $colors = Color::factory()
            ->count(3)
            ->create();

        foreach ($products as $product) {
            foreach ($colors as $color) {
                ColorProduct::firstOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $color->id,
                ]);
            }
        }       

        foreach ($sizes as $size) {
            foreach ($colors as $color) {
                ColorProduct::firstOrCreate([
                    'color_id' => $color->id,
                    'size_id' => $size->id,
                ]);
            }
        }  
    }
}
