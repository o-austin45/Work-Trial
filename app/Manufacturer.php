<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "manufacturers";
    protected $fillable = ["name"];

    public function cars() {
        return $this->hasMany(Car::class, "manufacturer_id", "id") ;
    }
}
