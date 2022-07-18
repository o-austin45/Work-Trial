<?php

namespace App\Http\Controllers;
use App\Animal; 


class AnimalsController extends Controller
{
    public function index() {
        $animals = Animal::orderBy("name")->get();
        return view("animals.list",[
            "animals" => $animals,

        ]);
    
    }

    public function show($id) {
        $animal = Animal::find($id);
        if ($animal) {
            return view ("animals.get",[
                $id,
                "id" => $id,
                "animal"=> $animal]);
        } else {
            return "Resource does not exist";
        }

    }

    
}


