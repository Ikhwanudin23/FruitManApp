<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('fruitCollectors', 'Api\FruitCollectorsController@index');

Route::get('seller','Api\SellerController@index');

//produk dari seller
Route::get('postings','Api\Seller\PostingsController@index');
Route::post('postings','Api\Seller\PostingsController@store');

//seller
Route::post('seller/register', 'Api\Seller\AuthSellerController@register');
Route::post('seller/login', 'Api\Seller\AuthSellerController@login');

//fruitcollector
Route::post('fruitCollector/register', 'Api\FruitCollector\AuthFruitCollectorController@register');
Route::post('fruitCollector/login', 'Api\FruitCollector\AuthFruitCollectorController@login');
