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

Route::get('ci', 'CommandInjectionController@php');
Route::get('ci-framework', 'CommandInjectionController@framework');

Route::get('sqli', 'SQLInjectionController@php');
Route::get('sqli-framework', 'SQLInjectionController@framework');

Route::get('lfi', 'LFIController@php');
Route::get('lfi-framework', 'LFIController@framework');
