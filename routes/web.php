<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'HomePage']);
Route::get('/watch/{server}/{id}', [PagesController::class, 'WatchEpisode']);
Route::get('/search/', [PagesController::class, 'Search'])->name("search");
Route::get('/anime/{server}/{title}', [PagesController::class, 'Anime']);
