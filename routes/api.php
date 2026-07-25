<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('spa')->namespace('Api')->group(function () {
    Route::get('/dashboard', 'SpaDataController@dashboard');
    Route::post('/employees', 'SpaDataController@storeEmployee');
    Route::post('/assets', 'SpaDataController@storeAsset');
    Route::post('/assets/{asset}/assign', 'SpaDataController@assignAsset');
});
