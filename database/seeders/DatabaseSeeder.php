<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Subcategory;
use App\Models\ColorProduct;
use App\Models\BrandCategory;
use App\Models\ColorSize;
use App\Models\OrderItem;
use App\Models\OrderStatu;
use App\Models\Shipping;
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
        $this->call([
            PermissionsAndRolesSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            MunicipalitySeeder::class
        ]);

        $user = User::factory()->create();

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
            ->count(10)
            ->for(Subcategory::factory()->for(Category::factory()->create())->create())
            ->for(Brand::factory()->create())
            ->create();

        $products = Product::factory()
            ->count(10)
            ->for(Subcategory::factory()->for(Category::factory()->create())->create())
            ->for(Brand::factory()->create())
            ->for(Discount::factory()->create())
            ->create();

        $product = Product::factory()
            ->for(Subcategory::factory()->for(Category::factory()->create())->create())
            ->for(Brand::factory()->create())
            ->for(Discount::factory()->create())
            ->create();

        Image::factory()
            ->count(4)
            ->for($product)
            ->create();

        $sizes = Size::factory()
            ->count(4)
            ->create();

        $colors = Color::factory()
            ->count(3)
            ->create();

        $orderStatus = OrderStatu::factory()->create([
            'name' => 'Pendiente'
        ]);

        $order = Order::factory()
            ->for($user)
            ->for($orderStatus)
            ->create();

        OrderItem::factory(3)
            ->for($order)
            ->create();
/*
        Shipping::factory()
            ->for($order)
            ->create(); */
    }
}
