<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\DetailController;
use App\Http\Controllers\Web\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", [IndexController::class, "index"]);
Route::post("/", [IndexController::class, "ajax"]);


Route::get("/detail", [DetailController::class, "index"]);
Route::get("/detail/{product_id}", [DetailController::class, "show"]);

Route::get("/category", [CategoryController::class, "index"]);
Route::get("/category/{category_id}", [CategoryController::class, "show"]);

