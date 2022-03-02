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

Route::get('/', function () {
    return view('welcome');

});

Route::get('/about', function () {
    return '<h4>about page</h4>';
});

Route::get('/contact', function () {
    return '<h4>contact page</h4>';
});

Route::get('/store/{category?}/{item?}', function ($category = null, $item = null) {
    $category = request('category');
    if (isset($category)) {
        if (isset($item)){
            return "you´re visiting the store for $category for $item";
        }
        return 'you`re view the store ' . strip_tags($category);
    }
    return 'you´re viewing all instruments.';
});
