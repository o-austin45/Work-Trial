<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function vehicles() 
    {
        return $this->belongsToMany(Car::class, "orders_cars", "orders_id", "cars_id")->withPivot("orderQty", "total_products", "total_products_time");
    }
}
