<?php
/**
 * Created by PhpStorm.
 * User: shawnsandy
 * Date: 10/27/16
 * Time: 12:58 PM
 */

Route::get("/", '\ShawnSandy\Bluelines\App\Controllers\BluelinesController@index');
Route::resource('/posts', '\ShawnSandy\Bluelines\App\Controllers\BluelinesController', ["except" => ["show"]]);
Route::resource('/cats', '\ShawnSandy\Bluelines\App\Controllers\CategoryController', ['except' => ['index', 'show']]);
Route::resource('/tags', '\ShawnSandy\Bluelines\App\Controllers\TagController', ['only' => ['store', 'destroy']]);

Route::get('/tags/delete/{post_id}', "\ShawnSandy\Bluelines\App\Controllers\TagController@destroy");
