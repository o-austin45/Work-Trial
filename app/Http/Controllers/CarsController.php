<?php

namespace App\Http\Controllers;
use App\Car;
use App\FuelType;
use Illuminate\Http\Request;
use App\Manufacturer;
use App\Order;
Use Session;
use Illuminate\Support\Carbon;

class CarsController extends Controller
{
    //WebRoutes

    public function index(Request $request)
    {
        $manufacturer = $request->query("manufacturer");
        $fueltype = $request->query("fueltype");
        $seats = $request->query("seats");
        $topspeed = $request->query("topspeed");
        $doors = $request->query("doors");
        $name = $request->query("name");
        $cars = Car::orderBy("name");

        if ($manufacturer) {
            $cars = Manufacturer::with("cars")->where("name", "like", "%".$manufacturer."%")->get()->map(function($manus)
            {
                return $manus->cars;
            })->flatten();
        } elseif ($seats) {
            $cars = Car::orderBy("name")->where("seats", "=", $seats)->get();
        } elseif ($doors) {
             $cars = Car::orderBy("name")->where("doors", "=", $doors)->get();
        } elseif ($fueltype) {
            $cars = Fueltype::orderBy("name")->where("name", "like" , "%".$fueltype."%")->first()->fuelOfCar;
        } elseif ($name) {
            Car::orderBy("name")->where("name", "like", "%".$name."%")->get();
        } elseif ($topspeed) {
            $cars = Car::orderBy("name")->where("top_speed", ">=", $topspeed)->get();
        } else {
            $cars = Car::orderBy("name")->get();
        }    
        return view("cars.list", [
            "cars"=> $cars
        ]);
    }


    public function show($id) 
    {
        $cars = Car::find($id);
        if($cars) {
            $fueltype = $cars->fueltype;
            $manufacturer = $cars->manufacturer;
            return view("cars.get",[
                $id,
                "fueltype" => $fueltype,
                "manufacturer" => $manufacturer,
                "cars" => $cars
            ]);

        } else {
            return "resource does not exist";
        }
    }


    public function create() 
    {
        return view("cars.create");
    }

    public function showFuel($id) 
    {
        $fueltype = Car::find($id)->fueltype;
        return $fueltype;
    }

     public function store() 
    {
        $car = new Car;
        $car->name = request("carName");
        $car->top_speed = request("topSpeed");
        $car->seats = request("seats");
        $car->doors = request("doors");
        $car->fuel_id = request("fuelType");
        $manufacturer = request("manufacturer");

        $manufacturerId = Manufacturer::firstOrCreate(["name" => $manufacturer]);
        $car->manufacturer()->associate($manufacturerId);
        $car->save();

        return redirect("cars/list");
    }

    public function analytics() 
    {
       $cars_sold = array();

       $order = Car::orderBy("name")->each(function ($item) 
       {
        $test = $item->orders()->get()->flatten();
        
        foreach ($test as $role) {
        $columnId = $role->pivot->cars_id;
        $name = $role->name;
        $orderQty = $role->pivot->where("cars_id", "=" ,$columnId)->sum("orderQty");
        $cars_sold[] = $orderQty;
        dump($cars_sold);

       }
    });
        dd($cars_sold);

        $manufacturer = Manufacturer::orderBy("id")->pluck("name");
        $fuelType = FuelType::orderBy("id")->pluck("name");
        $cars = Car::orderBy("id")->pluck("name");
        $sumOrders = Car::orderBy("id")->get()->sum("orderQty");
        $time = Carbon::now()->month;

        $carNumber =  Manufacturer::with("cars")->get()->map(function($manus)
        {
            return $manus->cars->count();

        });
        $fuelNumber =  FuelType::with("fuelOfCar")->get()->map(function($fuel)
        {
            return $fuel->fuelOfCar->count();
        });


        return view("cars.analytics", [
            "manufacturer" => $manufacturer,
            "carNumber" => $carNumber,
            "fuelNumber" => $fuelNumber,
            "fuelType" => $fuelType,
            "cars" => $cars,
            "sumOrders" => $sumOrders,
            "time" => $time

        ]);
    }


    public function addToCart($id)
    {
        $cars = Car::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $cars->id,
                "name" => $cars->name,
                "quantity" => 1,
                "price" => $cars->price,
            ];
        } 
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function  cart()
    {
        return view("cars.cart");

    }
    
    public function remove($id )
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }

    public function decrease($id)
    {
        $cart = session()->get('cart');

        if ($cart[$id]['quantity'] == 0) {
            $cart[$id]['quantity'] = 0;
            session()->put('cart', $cart);
        } else {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Quantity decreased successfully!');

    }

    public function increase($id)
    {
        $cart = session()->get('cart');
        
        $cart[$id]['quantity']++;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Quantity increased successfully!');
    }

 

    public function search() 
    {
        $carAndMan = request("search");
        $cars = Manufacturer::with("cars")->where("name", "like", "%".$carAndMan."%")->get()->map(function($manus)
        {return $manus->cars;
        })->flatten();
        return view("cars.get" , [
            "cars" => $cars
        ]);
    }

} 