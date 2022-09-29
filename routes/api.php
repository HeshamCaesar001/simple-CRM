<?php

use App\Lead;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([
    'namespace' => 'API',
    'prefix' => '/leads',
    'as' => 'api.leads.'
], function () {
    Route::get('/', 'LeadController@index')->name('index');

    Route::get('/{lead}', 'LeadController@show')->name('show');
    Route::post('/', 'LeadController@store')->name('store');
    Route::put('/{lead}', 'LeadController@update')->name('update');
});
