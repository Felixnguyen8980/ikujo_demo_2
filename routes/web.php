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

Route::get('/', function () {
    return view('welcome');
});

//Adminviews

//Adminviews

//Centerviews
Route::get('centerpage','CentersController@handle_request')->name('centerpage');
Route::get('centerpage/{option}','CentersController@handle_request')->name('centerpage');
Route::post('centerlogin','CentersController@centerlogin')->name('centerlogin');
Route::post('handle_post/{option}','CentersController@handle_post')->name('handle_post');
Route::get('centerpage/courses/{courses_id}','CentersController@showlessons')->name('showlessons');

//Centerviews