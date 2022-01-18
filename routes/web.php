<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('access_token/new_token', [Controllers\AccessTokenController::class, 'newToken']);
Route::get('access_token/token', [Controllers\AccessTokenController::class, 'token']);

Route::get('connect/url', [Controllers\ConnectController::class, 'getUrl']);
Route::get('connect/code', [Controllers\ConnectController::class, 'code']);


