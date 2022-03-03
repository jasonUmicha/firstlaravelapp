<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuitarsController;
use App\Http\Controllers\CraftingTableController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::resource('guitars', GuitarsController::class);
Route::resource('craftingTable', CraftingTableController::class);

Route::get('/return', [HomeController::class, 'return']);
Route::get('/pipi', [HomeController::class, 'pipi']);

Route::get('/rechne/{number1?}&{number2?}', function ($number1 = null, $number2 = null) {
    $number1 = request('number1');
    $number2 = request('number2');
    if (isset($number1)) {
        if (isset($number2)) {
            $ergebnis=$number1+$number2;
            return view('rechne',['ergebnis'=>$ergebnis]);
        }
        return 'ich brauch zwei zahlen ! dies is nur eine -> ' . strip_tags($number1);
    }
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
