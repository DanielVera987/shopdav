<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function brand_categories()
    {
        return $this->hasMany(BrandCategory::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
