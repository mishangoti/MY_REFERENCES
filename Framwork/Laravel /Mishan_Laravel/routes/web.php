<?php

// use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sms\SmsController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return 'about';
// });

Auth::routes();

   
    // admin
    Route::group(['middleware' => ['web', 'auth']], function(){
        Route::get('/', function(){
            return view('welcome');
        });

        Route::get('/', function(){
            if(Auth::user()->admin == 0){
                return view('shop.index');
            } else {
                return view('home');
            } 
        });
    });
    // if(Auth::user()->admin == 0){
        // user shop =========================================================================
        Route::get('/shop', 'ShopController@index')->name('shop');

        Route::get('/shop/addtocart/{product_id}', 'CartController@addtocart')->name('add_to_cart');
        Route::get('/cart', 'CartController@cart')->name('cart');
        
        Route::get('/about', 'AboutController@about')->name('about');
        Route::get('/contactus', 'ContactusController@contactus');
        Route::post('/contactus', 'ContactusController@postcontact');

        // blogs
        Route::get('/blogs', 'BlogsController@index')->name('blog');
        
    // }
    // if(Auth::user()->admin == 0){
        // admin  ----------------------------------------------------------------------
        Route::get('/home', 'HomeController@index')->name('home');

        // product
        Route::get('/product', 'ProductController@product')->name('product');
        Route::get('/product/view/{view_id}', 'ProductController@show')->name('view_product');
        Route::get('/product/edit/{edit_id}', 'ProductController@edit')->name('edit_product');
        Route::post('/product/update/{id}', 'ProductController@update')->name('update_product');
        Route::get('/product/addimages/{id}', 'ProductController@addimages')->name('addimages_product');
        Route::post('/product/storeimages/', 'ProductController@storeimages')->name('store_images');        

        Route::get('/product/destoy/{delete_id}', 'ProductController@destroy')->name('delete_product');
        Route::get('/product/add_product', 'ProductController@add_product')->name('add_product');
        Route::post('/product/store', 'ProductController@store')->name('store_product');

        // category
        Route::resource('category', 'CategoryController');

        // users
        Route::resource('user', 'UserController');
    // }    
    
// if(Auth::check()){
//     Route::get('/sendbasicemail','MailController@basic_email');
//     Route::get('sendhtmlemail','MailController@html_email');
//     Route::get('sendattachmentemail','MailController@attachment_email');
// }


// send mail
// Route::get('/bulkmailer', 'Mail\MailController@index');
Route::get('/bulkmailer', 'Mail\MailController@index');
Route::post('/bulkmailer', 'Mail\MailController@bulkmail');

// demo of one to many relationship
Route::get('/onetomany', 'Relations\OnetomanyController@index');
Route::get('/manytoone', 'Relations\ManytooneController@index');
Route::get('/manytomany', 'Relations\ManytomanyController@index');

// demo of sms integration
Route::get('/sms', 'Sms\SmsController@sms')->name('sms');
Route::post('/sms', 'Sms\SmsController@sendsms')->name('sendsms');


Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);   