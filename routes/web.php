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

Route::get('/', 'SPKController@index');
Route::post('/hitung', 'SPKController@storeDataPasien');
Route::get('/record', 'SPKController@recordPage');

Route::get('/register', 'ViewController@RegisterPage');
Route::post('/register/process', 'AccountController@Register');

Route::get('/login', 'ViewController@LoginPage');
Route::post('/login/process', 'AccountController@Login');

Route::get('/logout', 'AccountController@Logout');

// CRUD Rule
Route::get('/dokter', 'ViewController@dashboardDok');
Route::get('/dokter/aturan/hapus/{id}', 'RulesController@deleteRule');
Route::post('/dokter/aturan/tambah', 'RulesController@addRule');
