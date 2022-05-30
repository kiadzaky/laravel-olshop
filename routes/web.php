<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/' , App\Http\Livewire\Home::class);
Route::get('/tambahproduk' , App\Http\Livewire\TambahProduk::class);
Route::get('/belanjauser' , App\Http\Livewire\BelanjaUser::class);
Route::get('/tambahongkir' , App\Http\Livewire\TambahOngkir::class);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');