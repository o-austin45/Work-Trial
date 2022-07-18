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
        Schema::create("cars", function(Blueprint $table ){
            $table->bigIncrements('id');
            $table->unsignedInteger("manufacturer_id");
            $table->unsignedInteger("fuel_id");
            $table->string("name");
            $table->integer("seats");
            $table->integer("doors");
            $table->integer("top_speed");
            $table->foreign("manufacturer_id")->references("id")->on("manufacturers");
            $table->foreign("fuel_id")->references("id")->on("fueltypes");


            
        } );
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
