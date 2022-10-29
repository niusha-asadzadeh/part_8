<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//    Route::get('/test2',function (){
//        return \App\Models\Admin::create([
//            'name'=>'admin',
//            'password'=>\Illuminate\Support\Facades\Hash::make('123')
//        ]);
//    });

Route::get('/product',[\App\Http\Controllers\ProductController::class,'get'])
    ->middleware('auth:admin');

Route::get('/product/{id}',[\App\Http\Controllers\ProductController::class,'getById'])
    ->middleware('auth:admin');

Route::post('/product',[\App\Http\Controllers\ProductController::class,'store'])
    ->middleware('auth:admin');


Route::delete('/product/{id}',[\App\Http\Controllers\ProductController::class,'deleteById'])
    ->middleware('auth:admin');

Route::put('/product/{id}',[\App\Http\Controllers\ProductController::class,'updateById'])
    ->middleware('auth:admin');

Route::post('/login',[\App\Http\Controllers\AdminController::class,'login']);

//Route::get('/test',function (){
//   for($i=1;$i<10;$i++){
//        Product::create([
//            'title'=>"niusha $i",
//            'description'=>"hello $i"
//        ]);
//   }
//});
