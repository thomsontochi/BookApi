<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookApi\BooksController;

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

Route::group(['namespace' => 'BooksApi'], function() {
    Route::resource('books', BooksController::class);
    Route::get('external-books', [BooksController::class,'externalBook'])->name('books.external');
    
});