<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnNumberController;

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

Auth::routes();

Route::get('/home', [UnNumberController::class, 'index'])->name('home');

/**
 * 採番マスタ
 */
Route::prefix('UnNumber')->name('UnNumber.')->group(function() {
    // 検索バーのみ表示
    Route::get('UnNumber_index', [UnNumberController::class, 'index'])->name('index');
    // 検索結果を表示
    Route::get('UnNumber_show', [UnNumberController::class, 'show'])->name('show');

    
    // 登録画面表示
    Route::get('UnNumber_create', [UnNumberController::class, 'create'])->name('create');
    // 登録確認画面表示
    Route::post('UnNumber_confirm', [UnNumberController::class, 'confirm'])->name('confirm');
    // 登録
    Route::post('UnNumber_store', [UnNumberController::class, 'store'])->name('store');
    // 詳細表示
    Route::get('UnNumber_detail/{id}', [UnNumberController::class, 'detail'])->name('detail');
    // 編集表示
    Route::get('UnNumber_edit/{id}', [UnNumberController::class, 'edit'])->name('edit');
    Route::post('UnNumber_update', [UnNumberController::class, 'update'])->name('update');
    // 削除
    Route::post('UnNumber_delete', [UnNumberController::class, 'delete'])->name('delete');
});
