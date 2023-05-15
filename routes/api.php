<?php

use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/sign_in', [APIController::class, 'sign_in']);
Route::post('/register', [APIController::class, 'register']);
Route::get('/languages', [APIController::class, 'languages']);
Route::get('/currency', [APIController::class, 'currency']);
Route::get('/luggage', [APIController::class, 'luggage']);
Route::get('/vehicle', [APIController::class, 'vehicle']);
Route::get('/premium_plan', [APIController::class, 'premium_plan']);
Route::get('/user_terms', [APIController::class, 'user_terms']);
