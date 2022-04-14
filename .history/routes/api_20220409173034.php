<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookApi\BooksController;

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





// Route::group(['namespace' => 'App\Http\Controllers\BooksApi\BooksController', 'prefix' => 'v1','as' => 'book.'], function(){
//     Route::resource('books', BooksController::class);
//     Route::get('external-books', [BooksController::class,'externalBook'])->name('books.external');
    
// });


// web.php

    Route::group(['namespace' => 'BookApi', 'prefix' => 'book'], function() {
         Route::resource('books', [BooksController::class, 'books.index']);
        });


        Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function()
{
    Route::get('news', [
        'uses' => 'NewsController@index'
    ]);

    Route::get('users', [
        'uses' => 'UserController@index'
    ]);

    
});


//Route::resource('books', BooksController::class);