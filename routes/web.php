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
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\InstallmentController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\ProductReturnController;


// paystack payment controller class









// ADMIN CONTROLLER SECTION
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminInstallmentPayment;
use App\Http\Controllers\Admin\AdminPaidController;
use App\Http\Controllers\Admin\AdminProductDelivery;




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

// DETAIL SECTION ROUTE
Route::get("/detail", [DetailController::class, "index"]);
Route::get("/detail/{product_id}", [DetailController::class, "show"]);

// CATEGORY SECTION ROUTE
Route::get("/category", [CategoryController::class, "index"]);
Route::get("category/{category_name}", [CategoryController::class, "show"]);

// PRODUCT SECTION ROUTE
Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/{string}", [ProductController::class, "create"]);
Route::post("/products", [ProductController::class, "show"]);
Route::post("/quick-view", [ProductController::class, "quick_view_ajax"]);


Route::post("/product-review", [ProductReviewController::class, "product_review_ajax"]);

// CART SECTION ROUTE
Route::get("/cart", [CartController::class, "index"]);
Route::post("/add-to-cart", [CartController::class, "add_to_cart_ajax"]);
Route::post("/cart-item-delete", [CartController::class, "cart_item_delete_ajax"]);
Route::post("/get-cart-quantity", [CartController::class, "get_cart_quantity_ajax"]);
Route::post("/quick-add-to-cart", [CartController::class, "quick_add_to_cart_ajax"]);
Route::post("/get-cart-dropdown", [CartController::class, "get_cart_dropdown_ajax"]);
Route::post("/delete-cart-dropdown", [CartController::class, "delete_cart_dropdown_ajax"]);
Route::post("/quick-view-add-to-cart", [CartController::class, "quick_view_add_to_cart_ajax"]);


// WISHLIST SECTION ROUTE
Route::get("/wishlist", [WishlistController::class, "index"])->middleware('guest');
Route::post("/add-to-wishlist", [WishlistController::class, "add_to_wishlist_ajax"]);
Route::post("/delete-wishlist-item", [WishlistController::class, "delete_wishlist_item_ajax"]);
Route::post("/quick-add-to-wishlist", [WishlistController::class, "quick_add_to_wishlist_ajax"]);
Route::post("/get-wishlist-quantity", [WishlistController::class, "get_list_quantity_ajax"]);
Route::post("/get-quick-wishlist-items", [WishlistController::class, "get_quick_wishlist_items_ajax"]);
Route::post("/quick-delete-wishlist-item", [WishlistController::class, "quick_delete_wishlist_item_ajax"]);
Route::post("/add-wishlist-item-to-cart", [WishlistController::class, "add_wishlist_item_to_cart_ajax"]);



// ACCOUNT SECTION EROUTE
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



// LOGIN SECTION ROUTE
Route::get("/login", [loginController::class, "index"]);
Route::post("/login", [loginController::class, "show"]);
Route::post("/login-ajax", [loginController::class, "login_ajax"]);

Route::get("/logout", [LogoutController::class, "create"]);




// PAYSTACK PAYMENT ROUTES
Route::post('/pay', [PaymentController::class,'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


// PAYSTACK INLINE 
Route::get('/checkout', [PaymentController::class, 'checkout_view']);
Route::post('/paystack-payment', [PaymentController::class, '_store_paid_products']);
Route::post('/get-loggedin-user', [PaymentController::class, 'get_loggedin_user_ajax']);
Route::post('/get-checkout-form-validation', [PaymentController::class, 'get_checkout_form_validationajax']);


// ORDER SUCCESS PAGE
Route::get('/order-success', [PaymentController::class, 'order_success']);
Route::post('/order-success', [PaymentController::class, 'get_order_success_ajax']);


// ORDER HISTORY PAGE
Route::get('/order-history', [OrderController::class, 'index']);
Route::get('/order-history/all', [OrderController::class, 'show']);



// INSTALLMENT PAGE
Route::get('/installments', [InstallmentController::class, 'index']);
Route::post('/verification-check', [InstallmentController::class, 'get_verification_check_ajax']);
Route::post('/intallment-paymanet', [InstallmentController::class, 'intallment_payment_ajax']);
Route::post('/store-intallment-items', [InstallmentController::class, 'store_intallment_items_ajax']);
Route::get('/installment-success', [InstallmentController::class, 'installment_success']);
Route::get('/installment-orders', [InstallmentController::class, 'installment_orders']);
Route::get('/installment-orders/all', [InstallmentController::class, 'installment_orders_all']);
Route::get('/installment-orders/complete-payment', [InstallmentController::class, 'installment_complete_payment_show']);
Route::get('/complete-payment', [InstallmentController::class, 'complete_payment_show']);
Route::post('/complete-payment-now', [InstallmentController::class, 'complete_payment_now_ajax']);
Route::post('/update-installments', [InstallmentController::class, 'update_installments_ajax']);


// RETURN PRODUCT ROUTE SECTION
Route::get('/return-product', [ProductReturnController::class, 'index']);
Route::post('/return-product', [ProductReturnController::class, 'store']);









// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//                    VENDOR ROUTE
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Route::get('/dashboard', [AdminIndexController::class, 'index']);

// CATEGORY ROUTE SECTION
Route::get('/dashboard/category', [AdminCategoryController::class, 'index']);
Route::get('/dashboard/category/add', [AdminCategoryController::class, 'category_add']);


// PRODUCT ROUTE SECTION
Route::get('/dashboard/products', [AdminProductController::class, 'index']);
Route::get('/dashboard/products/add', [AdminProductController::class, 'product_add']);


// BRAND ROUTE SECTION
Route::get('/dashboard/brand', [AdminBrandController::class, 'index']);


// INSTALLMENTS ROUTE SECTION
Route::get('/dashboard/installments', [AdminInstallmentPayment::class, 'index']);
Route::get('/dashboard/installments-detial', [AdminInstallmentPayment::class, 'installment_detials']);
Route::get('/dashboard/installments-detial/{key}', [AdminInstallmentPayment::class, 'installment_detials_create']);


// PAID ROUTE SECTION
Route::get('/dashboard/paid', [AdminPaidController::class, 'index']);
Route::get('/dashboard/paid-detail/{refernce}', [AdminPaidController::class, 'paid_detail']);




// PRODUCT DELIVERY ROUTE SECTION
Route::get('/dashboard/product-delivery', [AdminProductDelivery::class, 'index']);
Route::get('/dashboard/installment-delivery', [AdminProductDelivery::class, 'installment_delivery']);


// PRODUCT RETURN ROUTE SECTION
Route::get('/dashboard/product-return', [AdminProductDelivery::class, 'product_return']);