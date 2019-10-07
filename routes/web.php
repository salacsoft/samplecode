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


// Route::post('login', 'ApiController@login');
// Route::post('register', 'ApiController@register');

// Route::group(['middleware' => 'auth.jwt'], function () {
//     Route::get('logout', 'ApiController@logout');

//     Route::get('user', 'ApiController@getAuthUser');
// });


Route::group([
    'prefix' => 'web'
], function() {

    // Chart of account types

    Route::get('coa-types/{id}', 'CoaTypeController@edit');
    Route::get('coa-types', 'CoaTypeController@all');
    Route::post('coa-types', 'CoaTypeController@store');
    Route::patch('coa-types/{id}', 'CoaTypeController@update');
    Route::patch('coa-types/{id}/restore', 'CoaTypeController@restoreDeleted');
    Route::delete('coa-types/{id}', 'CoaTypeController@softDelete');
    Route::get('coa-types/all/soft-deleted', 'CoaTypeController@allSoftDeleted');

});
