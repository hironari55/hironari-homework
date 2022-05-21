<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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
    Route::get('/index', [ReviewController::class, 'index'])->name('reviews.index');

    /* レビュー書き込み画面 */
    Route::get('/review/{id}/create', [ReviewController::class, 'showReviewCreate'])->name('reviews.create');
    Route::post('/review/{id}/create', [ReviewController::class, 'create']);

    /* レビュー確認画面 */

    /* 送信確認画面 */

    /* レビュー検索画面 */
    Route::get('/search', 'App\Http\Controllers\ReviewController@search')->name('searchReviews');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

require __DIR__.'/auth.php';
