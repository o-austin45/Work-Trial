<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasFactory;
    protected $table="fueltype";

    public function fuelOfCar() 
    {
        return $this->hasMany(Car::class, "fuel_id", "id");

        
    }


}