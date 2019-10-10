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

    // chart of accounts
    Route::get('chart-of-accounts/{id}', 'ChartOfAccountsController@edit');
    Route::get('chart-of-accounts', 'ChartOfAccountsController@all');
    Route::post('chart-of-accounts', 'ChartOfAccountsController@store');
    Route::patch('chart-of-accounts/{id}', 'ChartOfAccountsController@update');
    Route::patch('chart-of-accounts/{id}/restore', 'ChartOfAccountsController@restoreDeleted');
    Route::delete('chart-of-accounts/{id}', 'ChartOfAccountsController@softDelete');
    Route::get('chart-of-accounts/all/soft-deleted', 'ChartOfAccountsController@allSoftDeleted');

     // chart of accounts transactions
    Route::get('coa-transactions/{id}', 'CoaTransactionController@edit');
    Route::get('coa-transactions', 'CoaTransactionController@all');
    Route::post('coa-transactions', 'CoaTransactionController@store');
    Route::patch('coa-transactions/{id}', 'CoaTransactionController@update');
    Route::patch('coa-transactions/{id}/restore', 'CoaTransactionController@restoreDeleted');
    Route::delete('coa-transactions/{id}', 'CoaTransactionController@softDelete');
    Route::get('coa-transactions/all/soft-deleted', 'CoaTransactionController@allSoftDeleted');

    // chart of accounts transactions
    Route::get('item-categories/{id}', 'ItemCategoryController@edit');
    Route::get('item-categories', 'ItemCategoryController@all');
    Route::post('item-categories', 'ItemCategoryController@store');
    Route::patch('item-categories/{id}', 'ItemCategoryController@update');
    Route::patch('item-categories/{id}/restore', 'ItemCategoryController@restoreDeleted');
    Route::delete('item-categories/{id}', 'ItemCategoryController@softDelete');
    Route::get('item-categories/all/soft-deleted', 'ItemCategoryController@allSoftDeleted');

});
