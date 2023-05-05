<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','metal_type','product_img','grams','category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products')->withPivot('quantity');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_products')->withPivot(['quantity','amount','invoice_number','order_date','delivery_date','payment_mode','payment_status','delivery_address']);
    }
}
