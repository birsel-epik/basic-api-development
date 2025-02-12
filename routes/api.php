<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('blogs.comments', CommentController::class)->shallow();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('/blogs', [BlogController::class, 'getAllBlogs']);
Route::post('/blogs', [BlogController::class, 'insertBlog']) 
    ->middleware('auth:sanctum');
Route::put('/blogs/{id}', [BlogController::class, 'updateBlog']) 
    ->middleware('auth:sanctum');
Route::delete('/blogs/{id}', [BlogController::class, 'destroyBlog']) 
    ->middleware('auth:sanctum', 'throttle:blogs');


Route::get('/comments', [CommentController::class, 'getAllComments']);
Route::post('/comments', [CommentController::class, 'insertComment']) 
    ->middleware('auth:sanctum');
Route::put('/comments/{id}', [CommentController::class, 'updateComment']) 
    ->middleware('auth:sanctum');
Route::delete('/comments/{id}', [CommentController::class, 'destroyComment']) 
    ->middleware('auth:sanctum', 'throttle:comments');
    
