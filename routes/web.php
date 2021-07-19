<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;

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

Route::get('/', [CategoryController::class, 'show']);

Route::get('/login', [AdminController::class, 'show']);
Route::post('/login', [AdminController::class, 'login']);

Route::get('/b/{board_id}', [BoardController::class, 'show']);

Route::get('/t/{thread_id}', [ThreadController::class, 'show']);
Route::post('/thread', [ThreadController::class, 'create']);

Route::post('/reply', [ReplyController::class, 'create']);
