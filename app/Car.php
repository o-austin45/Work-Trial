<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table="cars";
    public $timestamps=false;
    public function manufacturer()
    {
         return $this->belongsTo(Manufacturer::class, "manufacturer_id", "id");
    }

    public function fueltype()
    {
         return $this->belongsTo(FuelType::class, "fuel_id", "id");
    }
    

    public function orders()
    {
        return $this->belongsToMany(Order::class, "orders_cars", "cars_id", "orders_id")->withPivot(["orderQty", "total_products", "total_products_time"]);

    }
}
