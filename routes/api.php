<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\OrdersController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
});

Route::get('api-test', function () {
    return response('Hello from the API');
});


Route::get("animals/list",[AnimalsController::class, "index"]);
Route::get("animals/get/{id}",[AnimalsController::class, "showIndividualApi"]);

Route::get("cars/list",[CarsController::class, "indexAPI"]);
Route::get("cars/manufacturer/{id}",[CarsController::class ,"showManufacturer"]);
Route::get("cars/fuel/{id}",[CarsController::class ,"showFuel"]);
Route::post("cars/search", [CarsController::class, "search"]);
Route::post("cars/create",[CarsController::class, "store"])->middleware("envpass");
//Route::post("cars/order", [CarsController::class, "order"]);
Route::post("cars/order",[OrdersController::class, "orderReceipt"]);

