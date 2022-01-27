<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

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

//passpotr
Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

Route::get('/statuses', [\App\Http\Controllers\Api\StatusController::class, 'index']);

Route::get('/tops', [\App\Http\Controllers\Api\TopController::class, 'index']);

Route::get('/mps', [\App\Http\Controllers\Api\MpsTypeController::class, 'index']);

Route::get('/doctors', [\App\Http\Controllers\Api\DoctorController::class, 'index']);

Route::get('/preview-posts', [\App\Http\Controllers\Api\PostController::class, 'top']);
Route::get('/published-posts', [\App\Http\Controllers\Api\PostController::class, 'published']);
Route::post('/posts', [\App\Http\Controllers\Api\PostController::class, 'store']);//->middleware('role:admin');
Route::patch('/posts/{post}', [\App\Http\Controllers\Api\PostController::class, 'update']);//->middleware('role:admin');
Route::delete('/posts/{post}', [\App\Http\Controllers\Api\PostController::class, 'destroy']);//->middleware('role:admin');

Route::get('/preview-articles', [\App\Http\Controllers\Api\ArticleController::class, 'top']);
Route::get('/articles', [\App\Http\Controllers\Api\ArticleController::class, 'index']);
Route::post('/articles', [\App\Http\Controllers\Api\ArticleController::class, 'store']);//->middleware('role:admin');
Route::delete('/articles/{article}', [\App\Http\Controllers\Api\ArticleController::class, 'destroy']);//->middleware('role:admin');
Route::patch('/articles/{article}', [\App\Http\Controllers\Api\ArticleController::class, 'update']);//->middleware('role:admin');

Route::get('/preview-videos', [\App\Http\Controllers\Api\VideoController::class, 'top']);
Route::get('/videos', [\App\Http\Controllers\Api\VideoController::class, 'index']);
Route::post('/videos', [\App\Http\Controllers\Api\VideoController::class, 'store']);//->middleware('role:admin');
Route::delete('/videos/{video}', [\App\Http\Controllers\Api\VideoController::class, 'destroy']);//->middleware('role:admin');
Route::patch('/videos/{video}', [\App\Http\Controllers\Api\VideoController::class, 'update']);//->middleware('role:admin');
