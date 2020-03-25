<?php

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

/**
|--------------------------------------------------------------------------
| Basic Routes
|--------------------------------------------------------------------------
 */

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('home');
Route::get('/locale/{locale}', 'LocaleController@index');

Route::get('/test', 'TestController@index');

/**
|--------------------------------------------------------------------------
| Drawing Routes
|--------------------------------------------------------------------------
 */
Route::prefix('pair')->group(function () {
    Route::get('/', 'Draw\PairController@index')->name('pair');
    Route::post('/draw', 'Draw\PairController@draw')->name('pair-draw');
    Route::get('/result', 'Draw\PairController@result')->name('pair-result');
});


Route::get('/draw-list', 'Draw\DrawListController@index')->name('draw-list');
Route::get('/partner-assign', 'Draw\PartnerAssignController@index')->name('partner-assign');
