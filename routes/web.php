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

Route::group([ 'middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::any('history-filter', 'BalanceController@filterHistory')->name('history.filter');
	Route::get('history', 'BalanceController@history')->name('admin.history');

	Route::post('balance/confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
	Route::post('balance/transfer', 'BalanceController@transferStore')->name('transfer.store');
	Route::get('balance/transfer', 'BalanceController@transfer')->name('balance.transfer');

	Route::post('balance/withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
	Route::get('balance/withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

	Route::post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');
	Route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');

	Route::get('balance', 'BalanceController@index')->name('admin.balance');
	Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::post('update-profile', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
Route::get('my-profile', 'Admin\UserController@profile')->name('profile')->middleware('auth');

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

