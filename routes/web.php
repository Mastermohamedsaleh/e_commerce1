<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdectController;

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


// Route::get('Prodect',[ProdectController::class,'index']);

// Route::get('Prodect_create',[ProdectController::class,'create']);


