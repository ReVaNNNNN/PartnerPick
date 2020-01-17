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
 * Basic Routes
 */
Route::get('/', 'IndexController@index');
Route::get('/locale/{locale}', 'LocaleController@index');

/**
 * Drawning Routes
 */
Route::get('/pair', 'Draw\PairController@index')->name('pair');
Route::get('/draw-list', 'Draw\DrawListController@index')->name('draw-list');
Route::get('/partner-assign', 'Draw\PartnerAssignController@index')->name('partner-assign');
