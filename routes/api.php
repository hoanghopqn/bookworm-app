<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get-book-sale', [BookController::class, 'getBookSale']);
Route::get('/get-recommnad', [BookController::class, 'getRecommnad']);
Route::get('/get-book-shop', [BookController::class, 'getBookShop']);
Route::get('/get-all-book', [BookController::class, 'getAllBook']);
Route::get('/get-Sort-Sale', [BookController::class, 'getSortSale']);
Route::get('/get-Popula', [BookController::class, 'getPopula']);
Route::get('/get-Price-High-Low', [BookController::class, 'getPriceHighLow']);
Route::get('/get-Price-Low-High', [BookController::class, 'getPriceLowHigh']);
Route::get('/get-Filter-Category', [BookController::class, 'getFilterCategory']);
Route::get('/get-Filter-Author', [BookController::class, 'getFilterAuthor']);
Route::get('/get-Filter-Rating-Review', [BookController::class, 'getFilterRatingReview']);
