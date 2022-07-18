<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::name('mission')
    ->get('/mission', function () {
        return view('mission');
    });



Route::get("images/asc",[ItemsController::class, "indexAsc"]);
Route::get("images/desc",[ItemsController::class, "indexDesc"]);
Route::get("images/random",[ItemsController::class, "indexRandom"]);

Route::get("animals/get/{id}",[AnimalsController::class, "show"]);
Route::get("animals/list",[AnimalsController::class, "index"]);

Route::get("cars/list",[CarsController::class, "index"]);
Route::get("cars/get/{id}",[CarsController::class,"show"]);
Route::get("cars/create", [CarsController::class, "create"] );
Route::get("cars/analytics",[CarsController::class, "analytics"]);
Route::get('add-t0-cart/{id}', [CarsController::class, 'addToCart'])->name('add.to.cart');
Route::get('cars/cart',[CarsController::class, "cart"])->name("cart");
Route::get('remove-from-cart/{id}', [CarsController::class, 'remove'])->name('remove.from.cart');
Route::get("decrease-quantity/{id}", [CarsController::class, "decrease"])->name("decrease.quantity");
Route::get("increase-quantity/{id}", [CarsController::class, "increase"])->name("increase.quantity");
Route::get("cars/receipt", [OrdersController::class, "showReceipt"]);



