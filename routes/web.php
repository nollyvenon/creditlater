<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\DetailController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\WishlistController;
use App\Http\Controllers\Web\LogoutController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\loginController;
use App\Http\Controllers\Web\ProductReviewController;

// admin controller section
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\ProfileController;









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


Route::get("/detail", [DetailController::class, "index"]);
Route::get("/detail/{product_id}", [DetailController::class, "show"]);


Route::get("/category", [CategoryController::class, "index"]);
Route::get("category/{category_name}", [CategoryController::class, "show"]);


Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/{string}", [ProductController::class, "create"]);
Route::post("/products", [ProductController::class, "show"]);
Route::post("/quick-view", [ProductController::class, "quick_view_ajax"]);


Route::post("/product-review", [ProductReviewController::class, "product_review_ajax"]);


Route::get("/cart", [CartController::class, "index"]);
Route::post("/add-to-cart", [CartController::class, "add_to_cart_ajax"]);
Route::post("/cart-item-delete", [CartController::class, "cart_item_delete_ajax"]);
Route::post("/get-cart-quantity", [CartController::class, "get_cart_quantity_ajax"]);
Route::post("/quick-add-to-cart", [CartController::class, "quick_add_to_cart_ajax"]);
Route::post("/get-cart-dropdown", [CartController::class, "get_cart_dropdown_ajax"]);
Route::post("/delete-cart-dropdown", [CartController::class, "delete_cart_dropdown_ajax"]);
Route::post("/quick-view-add-to-cart", [CartController::class, "quick_view_add_to_cart_ajax"]);


Route::get("/wishlist", [WishlistController::class, "index"])->middleware('guest');
Route::post("/add-to-wishlist", [WishlistController::class, "add_to_wishlist_ajax"]);
Route::post("/delete-wishlist-item", [WishlistController::class, "delete_wishlist_item_ajax"]);
Route::post("/quick-add-to-wishlist", [WishlistController::class, "quick_add_to_wishlist_ajax"]);
Route::post("/get-wishlist-quantity", [WishlistController::class, "get_list_quantity_ajax"]);
Route::post("/get-quick-wishlist-items", [WishlistController::class, "get_quick_wishlist_items_ajax"]);
Route::post("/quick-delete-wishlist-item", [WishlistController::class, "quick_delete_wishlist_item_ajax"]);




Route::get("/register", [UserController::class, "index"]);
Route::post("/register", [UserController::class, "store"]);
Route::get("/account", [UserController::class, "account"])->middleware('guest');
Route::get("/edit-info", [UserController::class, "edit_info"]);
Route::post("/edit-info/{user_id}", [UserController::class, "edit_user_info"]);
Route::get("/registration-form", [UserController::class, "registration_form"])->middleware('guest');
Route::post("/registration-form/{user_id}", [UserController::class, "registration_form_store"]);
Route::get("/verification", [UserController::class, "verification"])->middleware('guest');
Route::get("/registration-form/{user_id}/edit", [UserController::class, "registration_form_edit"]);
Route::get("/registration-success", [UserController::class, "registration_success"])->middleware('thankyou');
Route::get("/change-password", [UserController::class, "change_password"]);
Route::post("/change-password/{user_id}", [UserController::class, "change_password_update"]);



Route::get("/login", [loginController::class, "index"]);
Route::post("/login", [loginController::class, "show"]);
Route::post("/login-ajax", [loginController::class, "login_ajax"]);

Route::get("/logout", [LogoutController::class, "create"]);









// -----------------------------------------------------------------------------------------------------
//                    VENDOR ROUTE
// -----------------------------------------------------------------------------------------------------


Route::get("/delivery", [DeliveryController::class, "index"]);


Route::get("/payment", [PaymentController::class, "index"]);

Route::get("/buyers", [BuyerController::class, "index"]);


Route::get("/profile", [ProfileController::class, "index"]);
Route::get("/profile/{buyer_id}", [ProfileController::class, "create"]);
