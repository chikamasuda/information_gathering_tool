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
    return view('home');
});
//Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/popular', [App\Http\Controllers\EventController::class, 'popularEvent'])->name('popular');
Route::get('/search', [App\Http\Controllers\EventController::class, 'popularEventSearch'])->name('popular.search');
Route::get('/php', [App\Http\Controllers\EventController::class, 'phpEvent'])->name('php');
Route::get('/php_search', [App\Http\Controllers\EventController::class, 'phpEventSearch'])->name('php.search');
Route::get('/csv', [App\Http\Controllers\CsvDownloadController::class, 'index'])->name('csv');
Route::get('/csv_popular', [App\Http\Controllers\CsvDownloadController::class, 'downloadPopularEvent'])->name('csv.popular');
Route::get('/csv_php', [App\Http\Controllers\CsvDownloadController::class, 'downloadPhpEvent'])->name('csv.php');