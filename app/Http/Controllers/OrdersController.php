<?php

namespace App\Http\Controllers;
use App\Order;
use App\Car;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orderReceipt(Request $request)
    {
        $carsAndAmounts = $request->except(["name", "address", "date"]);
        $order = new Order;
        $order->name =  request("name");
        $order->adress = request("address");
        $order->save();

        foreach ($carsAndAmounts as $key => $carAndAmount ) {
            $carId = Car::find($key);
            $order->vehicles()->attach($carId, ["orderQty" => $carAndAmount]);
        }

        return redirect("cars/receipt");
    
    }


    public function showReceipt()
    {
        $orders = Order::find(38)->vehicles()->get();

        return view("cars/receipt", [
            "orders" => $orders
        ]);
    }
}
