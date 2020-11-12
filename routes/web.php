<?php
Route::prefix('api')->group(function () {

    Route::get('/cities/{provinceId}', 'front\UserController@getAllCities');
//    Route::get('/products/{id}/', 'Frontend\ProductController@apiGetProduct');
//    Route::get('/sort-products/{id}/{sort}/{paginate}', 'Frontend\ProductController@apiGetSortedProduct');
//    Route::get('/category-attribute/{id}', 'Frontend\ProductController@apiGetCategoryAttributes');
//    Route::get('/filter-products/{id}/{sort}/{paginate}/{attributes}', 'Frontend\ProductController@apiGetFilterProducts');
});

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

//Route::get('/', function () {
////    return view('welcome');
////    return view('adminPanel.layOut.categories.create-categories');
//    return view('adminPanel.layOut.dashBoard.Dashboard');
//});

//Auth::routes();
//Route::namespace('Auth')->middleware('guest')->group(function() {
Route::namespace('Auth')->group(function () {
    Route::get('login', 'LoginController@showLogin')->name('login');
    Route::post('login', 'LoginController@verifyCode')->name('auth.verifyCode');


    Route::get('check-code', 'LoginController@showCode')->name('validate.show');
    Route::post('check-code', 'LoginController@checkCode')->name('validate.check');


//    Route::get('register' , 'RegisterController@showRegister')->name('auth.login');
//    Route::post('register' , 'RegisterController@regsiter');
});
//Route::middleware('auth')->group(function() {
Route::get('user-profile', 'front\UserController@UserProfile')->name('user-profile');
Route::get('user-profile-edit', 'front\UserController@UserProfileEdit')->name('user-profile-edit');
Route::post('user-profile-edit', 'front\UserController@store');
Route::get('user-orders', 'front\UserController@orders');
Route::get('user-order-details/{id}', 'front\UserController@order_details');


//});
Route::get('add-to-card/{id}', 'front\CardController@addtoCard')->name('card.add');
Route::post('remove-from-card/{id}', 'front\CardController@removefromCard')->name('cart.remove');
Route::get('cart-checkout', 'front\CardController@checkout')->name('cart.checkout');
Route::post('cart-checkout', 'front\CardController@handlecheckout')->name('cart.handle-checkout');


Route::get('Category/{id}', 'front\HomeController@CategoryInfo')->name('category.each');

Route::get('/home', 'HomeController@index')->name('home');

Route::Resource('/', 'front\HomeController');

Route::prefix('administrator')->group(function () {

    Route::Resource('photo', 'admin\PhotoController');
    Route::post('photo/upload', 'admin\PhotoController@upload')->name("photo.upload");


    Route::Resource('category', 'admin\CategoryController');
    Route::Resource('product', 'admin\ProductController');
    Route::Resource('attribute', 'admin\AttributeController');
});

