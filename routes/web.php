<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\DetailController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\AjaxController;
use App\Http\Controllers\Web\CartController;



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
// Route::post("/", [IndexController::class, "quick_view_ajax"]);


Route::get("/detail", [DetailController::class, "index"]);
Route::get("/detail/{product_id}", [DetailController::class, "show"]);

Route::get("/category", [CategoryController::class, "index"]);
Route::get("category/{category_name}", [CategoryController::class, "show"]);


Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/{string}", [ProductController::class, "create"]);
Route::post("/products", [ProductController::class, "show"]);

Route::post("/", [AjaxController::class, "quick_view_ajax"]);
Route::post("/cart", [AjaxController::class, "add_to_cart_ajax"]);

Route::get("/cart", [CartController::class, "index"]);


