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

Route::group(['middleware' => 'auth'],function () {
    /* レビュー一覧画面 */
    Route::get('/index', 'App\Http\Controllers\ReviewController@index')->name('reviews.index');

    /* レビュー書き込み画面 */
    Route::get('/review/create', 'App\Http\Controllers\ReviewController@showCreate')->name('reviews.create');
    Route::post('/review/create', 'App\Http\Controllers\ReviewController@create');

    /* レビュー確認画面 */

    /* 送信確認画面 */

    /* レビュー検索画面 */
    Route::get('/search', 'App\Http\Controllers\ReviewController@search')->name('searchReviews');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__.'/auth.php';
