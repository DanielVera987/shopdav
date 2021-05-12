<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'code',
        'active',
        'discount_percent',
        'start_date',
        'end_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
