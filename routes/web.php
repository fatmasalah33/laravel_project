<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactcontroller;
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
Route::resource('phones','App\Http\Controllers\PhoneController')->middleware('auth');
Route::get('/list',[contactcontroller::class,'list']
)->name(name:"listcontact");
Route::get('/create',[contactcontroller::class,'create']);
Route::delete('/delete/{id}',[contactcontroller::class,'delete'])->whereNumber('id');
Route::get('edit/{id}',[contactcontroller::class,'edit'])->whereNumber('id');
Route::put('update/{id}',[contactcontroller::class,'update'])->whereNumber('id');
Route::get('show/{id}',[contactController::class,'show'])->whereNumber('id');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
