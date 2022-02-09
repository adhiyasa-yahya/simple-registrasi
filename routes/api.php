<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Register\RegistrasiContoller;
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

Route::group(['prefix' => 'register', 'middleware' => 'api'], function() {
    Route::get('/placeholder', [RegistrasiContoller::class, 'placeholder']);
    Route::post('/save', [RegistrasiContoller::class, 'store']);
});