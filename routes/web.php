<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Admins routes
Route::group(['middleware' => ['auth', 'Admin']], function () {
    Route::resource('/leads', 'LeadController');
    Route::post('/leads/assigned', 'LeadController@assigned')
        ->name('leads.assigned');
    Route::get('/leads/ajax/table', 'LeadController@table')->name('leads.table');

    Route::get('/calls/create/{lead}', 'CallController@create')
        ->name('calls.create');
    Route::post('/call/{lead}', 'CallController@store')
        ->name('calls.store');
    Route::get('/get-sales/{lead}', 'LeadController@updateSalesByLeadId');

    });
    
// Team leader routes
Route::group(['middleware' => ['auth', 'TeamLeader']], function () {
    Route::get('/leads', 'LeadController@index')->name('leads.index');
    Route::get('/leads/{lead}', 'LeadController@show')->name('leads.show');
    Route::post('/leads/assigned', 'LeadController@assigned')->name('leads.assigned');
//    Route::resource('/calls', 'CallController');

    Route::get('/calls/create/{lead}', 'CallController@create')
        ->name('calls.create');
    Route::post('/call/{lead}', 'CallController@store')
        ->name('calls.store');
});

// Sales routes
Route::group(['middleware' => ['auth', 'Sales']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
//    Route::resource('/calls', 'CallController'); // @TODO updated ACL
Route::get('/leads', 'LeadController@index')->name('leads.index');

    Route::get('/calls/create/{lead}', 'CallController@create')
        ->name('calls.create');
    Route::post('/call/{lead}', 'CallController@store')
        ->name('calls.store');
});



// Errors
Route::get('/403', function () {
    return view('errors.403');
})->name('403');

