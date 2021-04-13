<?php

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

// use App\Http\Controllers\FrontendController;
Route::get('/', 'FrontendController@index');
Route::get('shop-page', 'FrontendController@shopPage')->name('shop.page');
Route::get('category-page/{id}', 'FrontendController@categoryPage')->name('category.page');
Route::get('service-details/{id}', 'FrontendController@detailsPage')->name('service.details');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('role');

Route::get('/verify/{token}', 'EmailController@email_verify')->name('verify');


// =====================================  ADMIN START  ==============================================

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'namespace' => 'admin'], function () {
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('edit-profile', "AdminController@editProfile")->name('edit.profile');
    Route::post('update-profile', "AdminController@updateProfile")->name('update.profile');

    // CATEGORY
    Route::get('category', 'CategoryController@index')->name('admin.category');

    // CATEGORY WITH AJAX CALL
    Route::get('category/all', 'CategoryController@allCategory');
    Route::post('category/store', 'CategoryController@storeCategory');
    Route::post('category/update', 'CategoryController@updateCategory');
    Route::post('category/status/{id}/{status}', 'CategoryController@statusCategory');
    Route::get('category/delete', 'CategoryController@deleteCategory');
    Route::get('category/edit', 'CategoryController@editCategory');
    Route::get('test', function(){
        return view('admin.test');
    });

    //SERVICES
    Route::get('service/add', 'ServiceController@addService')->name('service.add');
    Route::post('service/store', 'ServiceController@storeService')->name('service-store');
    Route::get('service/manage', 'ServiceController@manageService')->name('service.manage');
    Route::get('service/edit/{id}', 'ServiceController@editService')->name('service.edit');
    Route::post('service/update/{id}', 'ServiceController@updateService')->name('service.update');
    Route::get('image/delete/{img}/{id}', 'ServiceController@deleteImage')->name('image.delete');
    Route::get('service/delete/{id}', 'ServiceController@deleteService');
    Route::get('service/status/{id}/{status}', 'ServiceController@statusService')->name('service.status');

    //ORDERS
    Route::get('order/all', 'OrderController@allOrder')->name('order.all');
    Route::get('order/view/{id}', 'OrderController@viewOrder')->name('order.view');
    Route::get('order/delete/{id}', 'OrderController@deleteOrder');
});

// =====================================  ADMIN END  =====================================


// =====================================  USER START  =====================================

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'user'], function () {
    Route::get('', 'UserController@index')->name('user.dashboard');
    Route::get('category', 'UserController@category')->name('user.category');
    Route::get('profile', 'UserController@userProfile')->name('user.profile');
    Route::get('order', 'UserController@userOrder')->name('user.order');
    Route::get('order/view/{id}', 'UserController@userOrderView')->name('user.order.view');
    Route::post('/change/{id}', 'UserController@changeUser')->name('user.change');
    Route::post('order/confirm/{id}', 'UserController@orderConfirm');
    Route::get('order/show-order', 'UserController@showOrder');
    Route::get('order/delete/{id}', 'UserController@deleteOrder');
});

// =====================================  USER END  =====================================


// =====================================  SELLER START  =====================================

Route::group(['prefix' => 'seller', 'middleware' => ['seller', 'auth'], 'namespace' => 'seller'], function () {
    Route::get('dashboard', 'SellerController@index')->name('seller.dashboard');
});

// =====================================  SELLER END  =====================================


// =====================================  CART & CHECKOUT START  =====================================

Route::post('add-to-cart/{id}/{price}', 'CartController@addToCart');
Route::post('category-page/add-to-cart/{id}/{price}', 'CartController@addToCart');
Route::get('cart-page', 'CartController@cartPage')->name('cart-page');
Route::get('cart-page/cart-delete/{id}', 'CartController@cartDelete');
Route::post('cart-page/cart-update', 'CartController@cartUpdate');
Route::get('checkout', 'CheckoutController@checkout')->name('checkout')->middleware('checkout');
Route::post('service-details/add-cart', 'CartController@addToCartDetails');
// Route::post('cart-page/add-cart', 'CartController@addToCartDetails');
Route::post('cart-page/update-cart', 'CartController@updateCart');
Route::get('cart-page/total-cart', 'CartController@totalCart');
Route::post('single-cart/{id}/{name}/{price}/{code}/{category_name}/{img}', 'CartController@singleCart');
Route::post('category-page/single-cart/{id}/{name}/{price}/{code}/{category_name}/{img}', 'CartController@singleCart');
Route::post('add-cart', 'CartController@addToCartDetails');
Route::post('add-cart', 'CartController@addToCartDetails');
Route::post('category-page/add-cart', 'CartController@addToCartDetails');


Route::get('a', 'TestController@a');
Route::get('aa', 'TestController@aa');
Route::get('aaa', 'TestController@s');
Route::get('or', function(){
    return view('email.order');
});

// =====================================  CART & CHECKOUT END  =====================================



Route::post('/sms', 'SmsController@send_sms');

Route::get('test', function () {
    return view('test');
});

// =====================================  SSLCOMMERZ START  =====================================

Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout')->name('ssl');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');

// =====================================  SSLCOMMERZ START  =====================================

Route::get('/logout', 'FrontendController@logout')->name('logout');

// Route::get('aaa', 'TestController@postContact');
