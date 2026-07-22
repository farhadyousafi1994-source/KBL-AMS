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
// test routs start

// test routs end

Route::get('/', function () {
    return view('auth.login');
});

Route::get('usercontrol', function () {
    return view(' usercontrol ');
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
 
 Route::get('auth.userprofile','userprofile@index');
 Route::post('auth.userprofile','userprofile@store')->name('auth.userprofile');
Route::get('delete5/{id}','userprofile@destroy');
 
 

 Route::post('edituser/{id} ','userprofile@update')->name('edituser');

 


Route::get('/home', 'HomeController@index')->name('home');
 //stock
Route::get('/stock', 'StockController@index')->name('stock');
Route::resource('/stock', 'StockController');
Route::post('editinfo2/{id}','StockController@update')->name('editinfo2');
Route::get('delete3/{id}','StockController@destroy');
 



//ams routs
Route::get('ams', 'AmsController@index')->name('ams.index');

 
//employee
Route::get('employee', 'EmployeeController@index')->name('employee.index');


Route::get('/report', 'HomeController@report')->name('report');



Route::resource('/employee', 'EmployeeController');
Route::post('editinfokb/{id}','EmployeeController@update')->name('editinfokb');
Route::get('delete1/{id}','EmployeeController@destroy');
 
Route::get('/jointb/search', [JointbController::class, 'search'])->name('jointb.search');

Auth::routes();


//jointb
Route::get('/jointb', 'JointbController@index');
Route::resource('/unasset', 'UnassetController');

Route::get('/insert/{id}','JointbController@add')->name('insert');



//unasset
Route::get('/unasset', 'UnassetController@index')->name('unasset.index');
Route::resource('/unasset', 'UnassetController');




Route::get('addinfo', 'AmsController@index')->name('addinfo.index');
 
Route::get('/tables/data', 'AmsController@tables')->name('ams.tables');


 
 



Route::resource('/addinfo', 'AddinfoController');
Route::get('delete/{id}','AddinfoController@destroy');
Route::post('editinfo/{id}','AddinfoController@update')->name('editinfo');
Route::post('edit/{id}','AddinfoController@edit');
Route::get('show/{id}','AddinfoControllerr@show');


 
 
   

Route::get('statusone/{oneid}','AddinfoController@statusone')->name('statuszero');
Route::get('statuszero/{zeroid}','AddinfoController@statuszero')->name('statusone');
    
 Route::get('statusone/{oneid}','JointbController@statusone')->name('statuszero');
Route::get('statuszero/{zeroid}','JointbController@statuszero')->name('statusone');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
