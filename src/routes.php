<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 10/27/16
 * Time: 12:58 PM
 */


Route::resource('/', '\ShawnSandy\Bluelines\App\Controllers\BluelinesController');
Route::resource('/cats', '\ShawnSandy\Bluelines\App\Controllers\CategoryController');
