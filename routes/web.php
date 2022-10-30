<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdectController; 
use App\Http\Controllers\OrderController; 
use App\Http\Controllers\User_and_AdminController; 
 
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




Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redircet',[HomeController::class,'redircet']);

Route::resource('Category',CategoryController::class);




Route::controller(ProdectController::class)->group(function(){


    Route::get('Prodect_index','index');

    Route::get('Prodect_create','create');

    Route::post('Prodect','store');

    Route::get('Prodect_edit/{id}','edit');

    Route::post('Prodect_destroy','destroy');

    Route::get('download_atta/{id}/{name}/{image}','download_atta');

    Route::get('detiles/{id}','detiles');

    Route::post('Add_Cart/{id}','Add_Cart')->name('Add_Cart');


  Route::get('download_pdf/{id}','download_pdf');

  Route::get('search_prodect','search_prodect')->name('search_prodect');

  Route::get('Prodect_main_page','Prodect_main_page');

  Route::get('Prodect_sport','Prodect_sport');
});







Route::controller(OrderController::class)->group(function(){
//   pay_delivery
Route::post('pay_delivery/{id}','pay_delivery');

// Show All Order
Route::get('show_all_order','show_all_order');

// Done Payment
Route::get('Done_Payment/{id}','Done_Payment');

// Done Delivary
Route::get('Done_delivary/{id}','Done_delivary');

// Destory Order
Route::get('destory_order/{id}','destory_order');

// search Order
Route::post('search_order','search_order');
// Last Orders
Route::get('last_orders','last_orders');




});


Route::controller(HomeController::class)->group(function(){

      
Route::get('show_cart','show_cart');

Route::get('Delete_Prodect_Cart/{id}','Delete_Prodect_Cart');

Route::get('cash_delivery','Cash_Delivery');

Route::get('show_order','show_order');

Route::get('cancle_order/{id}','cancle_order');

Route::get('search_prodect_mainpage','search_prodect_mainpage');

Route::get('stripe/{total_price}','stripe');

Route::post('stripe_pay/{total_price}','stripe_pay')->name('stripe_pay');
     
});









Route::controller(User_and_AdminController::class)->group(function(){

//   All Users

Route::get('Users','index');
    
//  delete_user

Route::get('delete_user/{id}','delete_user');
   


// search 




// Show admin

Route::get('show_admin','show_admin');
     


// edit_admin


Route::post('edit_admin','edit_admin');
     
// delete_admin
Route::get('delete_admin/{id}','delete_admin');


// search admin 
Route::get('search_admin','search_admin');

// Add admin

Route::get('add_admin','add_admin');

// store_admin

Route::post('store_admin','store_admin');

});








// Route::get('Prodect',[ProdectController::class,'index']);

// Route::get('Prodect_create',[ProdectController::class,'create']);


