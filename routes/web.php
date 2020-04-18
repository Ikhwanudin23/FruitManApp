<?php

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
    return view('auth.loginTemplate');
});

Route::get('/contentValue', function () {
    return view('pages.contentValue');
});

Route::get('/logintemplate', function () {
    return view('auth.loginTemplate');
});



Route::group(['prefix' => 'admin'], function (){
    Route::resource('dashboard','DasboardController')->only('index');
    Route::resource('seller','SellerController');
    Route::resource('fruitCollectors','FruitCollectorsController');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/logout-admin', 'AuthAdmin\LoginController@logoutAdmin')->name('logout.admin');


Route::get('/admin/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','AuthAdmin\LoginController@login')->name('admin.login.submit');


