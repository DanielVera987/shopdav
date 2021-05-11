<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Subcategory;
use App\Models\User;
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
    }
}
