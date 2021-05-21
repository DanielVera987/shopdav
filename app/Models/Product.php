<?php

namespace App\Models;

use Illuminate\Support\Facades\Request;
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

    public static function filtersAnPaginate()
    {
        return Product::with('brand', 'subcategory', 'discount')
                ->orderByPrice(Request::get('sort'))
                ->orderByDiscount(Request::get('sort'))
                ->bySubcategory(Request::get('categories'))
                ->paginate(20)
                ->withQueryString();
    }

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
        return $this->belongsToMany(Color::class, 'color_products');
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'cart_items');
    }

    public function scopeOrderByPrice($query, $order = '')
    {
        if ($order == '<' || $order == '>') {
            $clone = clone $query;

            if ($order == '>') return $query->orderByDesc('price');

            return $query->orderBy('price');
        }
    }

    public function scopeBySubcategory($query, $categories = [])
    {
        if ($categories) {
            foreach ($categories as $subcategory) {
                $query->orWhere('subcategory_id', $subcategory);
            }
        }

        return $query;
    }
    
    public function scopeOrderByDiscount($query, $discount)
    {
        if ($discount == 'by_discount') {
            $query->whereNotNull('discount_id');
        }
    }
}
