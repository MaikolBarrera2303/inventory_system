<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route("login"));
});

Route::get("login",[AuthController::class,"create"])->name("login");
Route::post("login",[AuthController::class,"store"]);
Route::post("logout",[AuthController::class,"destroy"])->name("logout");

Route::middleware("authentication")->group(function (){
    Route::resource("users",UserController::class);
});





