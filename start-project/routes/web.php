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
    return view('welcome');
});
Route::get('/main', function () {
    return view('home');
});

Route::get('/report/brand/{brand_id}', 
    'App\Http\Controllers\EixoController@report')->name('brand.report');
Route::get('/graph/brand', 
    'App\Http\Controllers\BrandController@graph')->name('brand.graph');

Route::resource('/brand', 'App\Http\Controllers\BrandController');
Route::resource('/vehicle', 'App\Http\Controllers\VehicleController');