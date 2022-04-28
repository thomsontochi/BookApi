<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PassportAuthController;





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






// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function () {
    Route::apiResource('/books', BooksController::class);
    Route::get('external-books', [BooksController::class,'externalBook'])->name('books.external');
});
Route::post('register', [PassportAuthController::class, 'register'])->name('register');
Route::post('login', [PassportAuthController::class, 'login'])->name('login');

 //Route::resource('/books', BooksController::class);

 Route::namespace('Api\v1')->prefix('v1')->group(function () {
    Route::group(['namespace' => 'Books'], function () {
        Route::resource('books', 'BooksController');
        Route::get('external-books', 'BooksController@externalBook')->name('books.external');
    });
});

