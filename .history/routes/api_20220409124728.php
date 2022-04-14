<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksApi\BooksController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('BooksApi')->prefix('v1')->group(function () {
    Route::group(['namespace' => 'austin'], function () {
        Route::resource('books', BooksController::class);
        Route::get('external-books', 'BooksController@externalBook')->name('books.external');
    });
});

//Route::resource('books', BooksController::class);