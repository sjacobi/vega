<?php

use Illuminate\Support\Facades\Route;
use SergeyJacobi\Vega\Middlewares\ForceJsonResponse;

/*
|--------------------------------------------------------------------------
| Vega Routes
|--------------------------------------------------------------------------
|
| Here is where you can register vega routes for your application. These
| routes are loaded by the VegaServiceProvider. Now create something great!
|
*/

if (config('vega.enable') === true) {

    Route::namespace('SergeyJacobi\\Vega\\Controllers')
        ->prefix('vega')
        ->middleware([ForceJsonResponse::class])
        ->group(function (
        ) {

            Route::post('/message', 'MainController@create');
            Route::get('/message/{id}', 'MainController@read');
            Route::put('/message/{id}', 'MainController@update');
            Route::delete('/message/{id}', 'MainController@delete');
        });

}

