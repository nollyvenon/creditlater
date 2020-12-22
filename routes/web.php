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
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\ProductReviewController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\InstallmentController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\ProductReturnController;
use App\Http\Controllers\Web\BrandsController;


// paystack payment controller class



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

Route::group(['middleware' => 'visitor'], function(){

// HOME PAGE
Route::get("/", [IndexController::class, "index"]);


// DETAIL SECTION ROUTE
Route::get("/detail", [DetailController::class, "index"]);
Route::get("/detail/{product_id}", [DetailController::class, "show"]);

// CATEGORY SECTION ROUTE
Route::get("/category", [CategoryController::class, "index"]);
Route::get("category/{category_name}", [CategoryController::class, "show"]);


// BRAND ROUTE SECTION
Route::get("brand/{brand_name}", [BrandsController::class, "show"]);


// PRODUCT SECTION ROUTE
Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/{string}", [ProductController::class, "create"]);
Route::post("/products", [ProductController::class, "show"]);
Route::post("/quick-view", [ProductController::class, "quick_view_ajax"]);


// PRODUCT REVIEW ROUTE
Route::post("/product-review", [ProductReviewController::class, "product_review_ajax"]);


// CART SECTION ROUTE
Route::get("/cart", [CartController::class, "index"]);
Route::post("/add-to-cart", [CartController::class, "add_to_cart_ajax"]);
Route::post("/cart-item-delete", [CartController::class, "cart_item_delete_ajax"]);
Route::post("/get-cart-quantity", [CartController::class, "get_cart_quantity_ajax"]);
Route::post("/cart-quantity-action", [CartController::class, "cart_quantity_action_ajax"]);
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
Route::get("/login", [LoginController::class, "index"]);
Route::post("/login", [LoginController::class, "show"]);
Route::post("/login-ajax", [LoginController::class, "login_ajax"]);

Route::get("/logout", [LogoutController::class, "create"]);




// PAYSTACK PAYMENT ROUTES
Route::post('/pay', [PaymentController::class,'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);


// PAYSTACK INLINE 
Route::get('/checkout', [PaymentController::class, 'checkout_view']);
Route::post('/checkout', [PaymentController::class, 'checkout_one_time_payment_paystack']);


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
Route::post('/installments', [InstallmentController::class, 'pay_installment']);
Route::post('/installments-check-out', [InstallmentController::class, 'installments_check_out_ajax']);
Route::post('/verification-check', [InstallmentController::class, 'get_verification_check_ajax']);
Route::post('/intallment-paymanet', [InstallmentController::class, 'intallment_payment_ajax']);
Route::post('/store-intallment-items', [InstallmentController::class, 'store_intallment_items_ajax']);
Route::get('/installment-success', [InstallmentController::class, 'installment_success']);
Route::get('/installment-orders', [InstallmentController::class, 'installment_orders']);
Route::get('/installment-orders/all', [InstallmentController::class, 'installment_orders_all']);
Route::get('/installment-orders/complete-payment', [InstallmentController::class, 'installment_complete_payment_show']);
Route::get('/complete-payment/{reference}', [InstallmentController::class, 'complete_payment_show']);
Route::post('/complete-payment', [InstallmentController::class, 'complete_installment_payment']);
Route::post('/update-installments', [InstallmentController::class, 'update_installments_ajax']);


// RETURN PRODUCT ROUTE SECTION
Route::get('/return-product', [ProductReturnController::class, 'index']);
Route::post('/return-product', [ProductReturnController::class, 'store']);


}); //end of visitor middleware






// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//                    ADMIN ROUTE
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ADMIN CONTROLLER SECTION
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminInstallmentPayment;
use App\Http\Controllers\Admin\AdminPaidController;
use App\Http\Controllers\Admin\AdminProductDelivery;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProductSoldController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminVendorController;





Route::get('/admin', [AdminIndexController::class, 'index']);

// CATEGORY ROUTE SECTION
Route::get('/admin/category', [AdminCategoryController::class, 'index']);
Route::get('/admin/category_approve/{id}', [AdminCategoryController::class, 'category_approve']);

// PRODUCT ROUTE SECTION
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/approve/{id}', [AdminProductController::class, 'product_approve']);

// BRAND ROUTE SECTION
Route::get('/admin/brand', [AdminBrandController::class, 'index']);
Route::get('/admin/brand_approved/{id}', [AdminBrandController::class, 'brand_approved']);

// INSTALLMENTS ROUTE SECTION
Route::get('/admin/installments', [AdminInstallmentPayment::class, 'index']);
Route::get('/admin/installments-detial', [AdminInstallmentPayment::class, 'installment_detials']);
Route::get('/admin/installments-detial/{key}', [AdminInstallmentPayment::class, 'installment_detials_create']);
Route::get('/admin/installment-products', [AdminInstallmentPayment::class, 'installment_products']);
Route::get('/admin/installment-products/delete/{id}', [AdminInstallmentPayment::class, 'installment_products_delete']);

// PAID ROUTE SECTION
Route::get('/admin/paid', [AdminPaidController::class, 'index']);
Route::get('/admin/paid-detail/{refernce}', [AdminPaidController::class, 'paid_detail']);

// REGISTER SECTION
Route::get('/admin/register', [AdminRegisterController::class, 'index']);
Route::post('/admin/register', [AdminRegisterController::class, 'store']);
Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::get('/admin/logout', [AdminLogoutController::class, 'logout']);

// PRODUCT DELIVERY ROUTE SECTION
Route::get('/admin/product-delivery', [AdminProductDelivery::class, 'index']);
Route::get('/admin/installment-delivery', [AdminProductDelivery::class, 'installment_delivery']);

// PRODUCT RETURN ROUTE SECTION
Route::get('/admin/product-return', [AdminProductDelivery::class, 'product_return']);

// PRODUCT SOLD SECTION
Route::get('/admin/sold-products', [AdminProductSoldController::class, 'index']);
Route::get('/admin/sold-products/delete/{id}', [AdminProductSoldController::class, 'sold_products_delete']);


// SETTINGS SECTION
Route::get('/admin/settings', [AdminSettingsController::class, 'index']);
Route::post('/admin/settings', [AdminSettingsController::class, 'store_seetings']);
Route::post('/admin/payment-method-header', [AdminSettingsController::class, 'payment_metho_header']);

Route::post('/admin-add-payment-method', [AdminSettingsController::class, 'admin_add_payment_method_ajax']);
Route::get('/admin/payment_method-activate/{id}', [AdminSettingsController::class, 'payment_method_activate']);
Route::get('/admin/payment_method-deactivate/{id}', [AdminSettingsController::class, 'payment_method_deactivate']);
Route::get('/admin/payment_method-delete/{id}', [AdminSettingsController::class, 'payment_method_delete']);

// ADMIN VENDOR SECTION
Route::get('/admin/vendor', [AdminVendorController::class, 'index']);
Route::get('admin/vendor-deactivate/{id}', [AdminVendorController::class, 'vendor_deactivate_toggle']);
Route::get('admin/vendor-edit/{id}', [AdminVendorController::class, 'vendor_edit']);
Route::post('admin/vendor-edit/{id}', [AdminVendorController::class, 'vendor_update']);
Route::get('/admin/vendor-delete/{id}', [AdminVendorController::class, 'vendor_delete']);
Route::get('/admin/vendor-add', [AdminVendorController::class, 'vendor_add_page']);
Route::post('/admin/vendor-add', [AdminVendorController::class, 'vendor_add_store']);









// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//                    VENDOR ROUTE
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------

use App\Http\Controllers\Vendor\VendorIndexController;
use App\Http\Controllers\Vendor\VendorBrandController;
use App\Http\Controllers\Vendor\VendorCategoryController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Vendor\VendorRegisterController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorLoginController;




// DEACTIVAGE VENDOR MIDDLWARE
Route::group(['middleware' => 'is_deactivate'], function(){

// VENDOR DASHBOARD ROUTE SECTION
Route::get('/vendor', [VendorIndexController::class, 'index']);


// BRAND ROUTE SECTION
Route::get('/vendor/brand', [VendorBrandController::class, 'index']);
Route::post('/vendor/brand/add', [VendorBrandController::class, 'store']);
Route::post('/vendor/brand-delete', [VendorBrandController::class, 'vendor_brand_delete_ajax']);
Route::post('/vendor/brand-feature', [VendorBrandController::class, 'vendor_brand_feature_ajax']);
Route::post('/vendor/brand-edit', [VendorBrandController::class, 'vendor_brand_edit_ajax']);




// CATEGROY ROUTE SECTION
Route::get('/vendor/category', [VendorCategoryController::class, 'index']);
Route::get('/vendor/category/add', [VendorCategoryController::class, 'category_add']);
Route::post('/vendor/category-feature', [VendorCategoryController::class, 'vendor_category_feature_ajax']);
Route::get('/vendor/category-delete/{id}', [VendorCategoryController::class, 'vendor_category_delete']);
Route::post('/vendor/category/add', [VendorCategoryController::class, 'store']);
Route::get('/vendor/category/{id}', [VendorCategoryController::class, 'show']);
Route::post('/vendor/category/{id}', [VendorCategoryController::class, 'update']);




// PRODUCT ROUTE SECTION
Route::get('/vendor/products', [VendorProductController::class, 'index']);
Route::get('/vendor/products/add', [VendorProductController::class, 'product_add']);
Route::get('/vendor/products_feature/{id}', [VendorProductController::class, 'product_feature']);
Route::get('/vendor/products/edit/{id}', [VendorProductController::class, 'product_edit']);
Route::post('/vendor/products/edit/{id}', [VendorProductController::class, 'product_update']);
Route::get('/vendor/products/delete/{id}', [VendorProductController::class, 'product_delete']);
Route::get('/vendor/products/delete_image/{id}/{key}', [VendorProductController::class, 'product_delete_image']);
Route::post('/vendor/products/add', [VendorProductController::class, 'product_add_store']);
Route::get('/vendor/products-return', [VendorProductController::class, 'product_return_show']);
Route::post('/maximize-warranty-slip', [VendorProductController::class, 'maximize_warranty_slip_ajax']);




//VENDOR REGISTRATION
Route::get('/vendor/register', [VendorRegisterController::class, 'index']);
Route::post('/vendor/register', [VendorRegisterController::class, 'store']);


// VENDOR ACCOUNT ROUTE SECTION
Route::get('/vendor/account', [VendorController::class, 'index']);
Route::get('/vendor/logout', [VendorController::class, 'logout']);
Route::get('/vendor/login', [VendorLoginController::class, 'index']);
Route::post('/vendor/login', [VendorLoginController::class, 'create']);


}); //end of is_deactivate vendor












