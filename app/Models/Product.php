<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'code', 
        'price', 
        'quantity', 
        'subcategory_id', 
        'brand_id', 
        'discount_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function color()
    {
        return $this->belongsToMany(Color::class);
    }
}
