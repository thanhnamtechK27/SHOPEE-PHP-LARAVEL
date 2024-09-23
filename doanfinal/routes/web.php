<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BLogController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\BlogFEController;
use App\Http\Controllers\Frontend\RateBlogController;
use App\Http\Controllers\Frontend\CmtController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\CartController;




Route::get('/', function () {
    return view('welcome');
});
// Route::get('/profile', function(){
//     return view('admin.user.profile');
// });
Auth::routes();
// ADMIN: --------------------------------------------------------------------------------------------------------------------
// Home:
// Admin middleware group
// Route::group(['middleware' => 'admin'], function () {
    Route::get('/logout_admin', [App\Http\Controllers\admin\UserController::class, 'logout_admin'])->name('logout_admin');
    
// Dashboard
    Route::get('/dashboard', [DashboardController::class, 'checkdashboard'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [UserController::class, 'checkprofile'])->name('profile');
    Route::post('/profile', [UserController::class, 'update'])->name('profile.update');
    
    // Country
    Route::get('/country', [CountryController::class, 'checkcountry'])->name('country');
    Route::get('/create_country', [CountryController::class, 'check_createcountry'])->name('check_createcountry');
    Route::post('/create_country', [CountryController::class, 'create_country'])->name('create_country');
    Route::get('/delete_country', [CountryController::class, 'delete'])->name('delete_country');
    
    // Blog
    Route::get('/blog', [BlogController::class, 'check_blog'])->name('check_blog');
    Route::get('/create_blog', [BlogController::class, 'check_create_blog'])->name('check_create_blog');
    Route::post('/create_blog', [BlogController::class, 'create_blog'])->name('create_blog');
    Route::get('delete_blog/{id}', [BlogController::class, 'delete_blog'])->name('delete_blog');
    Route::get('edit_blog/{id}', [BlogController::class, 'edit_blog'])->name('edit_blog');
    Route::post('edit_blog/{id}', [BlogController::class, 'update_blog'])->name('update_blog');
    
    // Category
    Route::get('/category', [CategoryController::class, 'checkcategory'])->name('category');
    Route::get('/create_category', [CategoryController::class, 'check_createcategory'])->name('check_createcategory');
    Route::post('/create_category', [CategoryController::class, 'create_category'])->name('create_category');
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete'])->name('delete_category');
    
    // Brand
    Route::get('/brand', [BrandController::class, 'checkbrand'])->name('brand');    
    Route::get('/create_brand', [BrandController::class, 'check_createbrand'])->name('check_createbrand');
    Route::post('/create_brand', [BrandController::class, 'create_brand'])->name('create_brand');
    Route::get('/delete_brand/{id}', [BrandController::class, 'delete'])->name('delete_brand');
    
// });

// ADMIN: ----------------------------------------------------------------------------------------------------------------------

// FRONTEND: ----------------------------------------------------------------------------------------------------------------------
// Login:
// Frontend middleware group
// Route::group([
//     // chỉ vao folder frontend
//     'namespace' => 'Frontend'
// ], function () {
//     // Account
   
    // Blog:
    Route::get('/blog_list', [App\Http\Controllers\Frontend\BlogFEController::class, 'blog_list'])->name('blog_list');
    Route::get('/blog_detail/{id}', [App\Http\Controllers\Frontend\BlogFEController::class, 'blog_detail'])->name('blog_detail');
    // Rate blog:
    Route::post('/blog_rate_ajax', [App\Http\Controllers\Frontend\RateBlogController::class, 'rateAjax'])->name('blog_rate_ajax');
    // Account:
    Route::get('/account_fe', [App\Http\Controllers\Frontend\AccountController::class, 'account_fe'])->name('account_fe');
    Route::post('/update_account', [App\Http\Controllers\Frontend\MemberController::class, 'update_fe'])->name('update_account');
    
    // Product:
    // Home product:
    Route::get('/my_product', [App\Http\Controllers\Frontend\ProductController::class, 'my_product'])->name('my_product');
    // Add product
    Route::get('/add_product', [App\Http\Controllers\Frontend\ProductController::class, 'add_product'])->name('add_product');
    Route::post('/add_product', [App\Http\Controllers\Frontend\ProductController::class, 'add_product_form'])->name('add_product_form');
    // Edit product
    Route::get('/edit_product/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'edit_product'])->name('edit_product');
    Route::post('/update_product/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'update_product'])->name('update_product');
    // Product Detail:
    Route::get('/product_detail/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'product_detail'])->name('product_detail');
    // Comment:
    Route::post('/comment',[App\Http\Controllers\Frontend\CmtController::class, 'cmt'])->name('comment');
    // Home_FE:
    Route::get('/home_fe', [App\Http\Controllers\Frontend\HomeFEController::class, 'home_fe'])->name('home_fe');
    // ADD TO CART:
    Route::get('/cart', [App\Http\Controllers\Frontend\CartController::class, 'cart'])->name('cart');
    Route::post('/add_to_cart', [App\Http\Controllers\Frontend\CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/clear_cart', [App\Http\Controllers\Frontend\CartController::class, 'clear_cart'])->name('clear_cart');
    // + - delete PRODUCT:
    Route::post('/cart/update/{id}', [App\Http\Controllers\Frontend\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [App\Http\Controllers\Frontend\CartController::class, 'delete'])->name('cart.delete');
    
    Route::get('/login_fe',[App\Http\Controllers\Frontend\MemberController::class, 'login_fe'])->name("login_fe");
    Route::post('/check_login', [App\Http\Controllers\Frontend\MemberController::class, 'check_login'])->name('check_login');
    // Logout:
    // Register:
    Route::get('/register_fe', [App\Http\Controllers\Frontend\MemberController::class, 'showregister_fe'])->name('register_fe');
    Route::post('/register_fe', [App\Http\Controllers\Frontend\MemberController::class, 'register_fe'])->name('register_fe');
    // Route::group(['middleware' => 'memberNotLogin'], function () {
    // Route::get('/account_fe', [AccountController::class, 'account_fe'])->name('account_fe');
    Route::post('/register_checkout', [App\Http\Controllers\CheckoutController::class, 'register_checkout'])->name('register_checkout');
    // });
    Route::get('/logout_fe',[App\Http\Controllers\Frontend\MemberController::class, 'logout_fe'])->name("logout_fe");
    
//    Route::group(['middleware' => 'member'], function () {
        
    // Các route liên quan đến Checkout và Order
        Route::post('/checkout/process', [App\Http\Controllers\Frontend\CheckoutController::class, 'checkout_process'])->name('checkout_process');
        Route::get('frontend/checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');
        Route::get('checkout/update', [App\Http\Controllers\Frontend\CheckoutController::class, 'updateCartCheckout'])->name('updateCartCheckout');
        Route::post('/register-order', [App\Http\Controllers\Frontend\CheckoutController::class, 'registerOrder'])->name('register-order');

        // Route để gửi email
        Route::get('/test', [App\Http\Controllers\MailController::class, 'index'])->name('index');
        Route::post('/order', [App\Http\Controllers\Frontend\CheckoutController::class, 'submitOrder'])->name('frontend.order');
        

        // search:
        Route::get('/search/products', [App\Http\Controllers\Frontend\ProductController::class, 'search'])->name('search');
        Route::get('/search_advanced', [App\Http\Controllers\Frontend\ProductController::class, 'search_advanced'])->name('search_advanced');
        Route::post('/search_form_advanced', [App\Http\Controllers\Frontend\ProductController::class, 'search_advanced'])->name('search_form_advanced');

        Route::post('/filtered-products', [App\Http\Controllers\Frontend\ProductController::class, 'filterProducts'])->name('filtered-products');
        
        // + thêm delete product :
        Route::delete('/products/{id}', [ProductController::class, 'delete_product'])->name('delete_product');

        // });
// });


Route::get('/create-token', [App\Http\Controllers\Api\ProductController::class, 'createToken']);
