<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_cars', function (Blueprint $table) {
        
            $table ->integer("cars_id")->unsigned();
            $table->integer("orders_id")->unsigned();
            $table->foreign("cars_id")->references("id")->on("cars");
            $table->foreign("orders_id")->references("id")->on("orders");
            $table->unsignedInteger("orderQty")->default(0);
            $table->unsignedInteger("total_products")->nullable();
            $table->time("total_products_time")->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
