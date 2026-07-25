<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/report', 'HomeController@report')->name('report');

    Route::get('ams', 'AmsController@index')->name('ams.index');
    Route::get('addinfo', 'AmsController@index')->name('addinfo.index');
    Route::get('/tables/data', 'AmsController@tables')->name('ams.tables');

    Route::resource('/employee', 'EmployeeController');
    Route::post('editinfokb/{id}', 'EmployeeController@update')->name('editinfokb');
    Route::get('delete1/{id}', 'EmployeeController@destroy')->middleware('role:admin,super_admin');

    Route::resource('/stock', 'StockController');
    Route::post('editinfo2/{id}', 'StockController@update')->name('editinfo2');
    Route::get('delete3/{id}', 'StockController@destroy')->middleware('role:admin,super_admin');

    Route::get('/jointb/search', 'JointbController@search')->name('jointb.search');
    Route::resource('/jointb', 'JointbController')->only(['index', 'store', 'show']);
    Route::get('/insert/{id}', 'JointbController@add')->name('insert');

    Route::resource('/unasset', 'UnassetController');

    Route::resource('/addinfo', 'AddinfoController');
    Route::get('delete/{id}', 'AddinfoController@destroy')->middleware('role:admin,super_admin');
    Route::post('editinfo/{id}', 'AddinfoController@update')->name('editinfo');
    Route::post('edit/{id}', 'AddinfoController@edit');
    Route::get('show/{id}', 'AddinfoController@show');

    Route::get('statusone/{oneid}', 'AddinfoController@statusone')->name('statuszero');
    Route::get('statuszero/{zeroid}', 'AddinfoController@statuszero')->name('statusone');

    Route::middleware('role:super_admin')->group(function () {
        Route::get('auth.userprofile', 'userprofile@index')->name('auth.userprofile.index');
        Route::post('auth.userprofile', 'userprofile@store')->name('auth.userprofile');
        Route::post('edituser/{id}', 'userprofile@update')->name('edituser');
        Route::get('delete5/{id}', 'userprofile@destroy');
    });
});
