<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot(['quantity','amount','invoice_number','order_date','delivery_date','payment_mode','payment_status','delivery_address']);
    }
}
