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
Route::post('/logout', [APIController::class, 'logout']);
Route::post('/register', [APIController::class, 'register']);
Route::post('/change_password', [APIController::class, 'change_password']);
Route::post('/forgotPassword', [APIController::class, 'forgotPassword']);
Route::get('/languages', [APIController::class, 'languages']);
Route::get('/getRequests', [APIController::class, 'getRequests']);
Route::post('/deleteRequest', [APIController::class, 'deleteRequest']);
Route::post('/deleteVehicle', [APIController::class, 'deleteVehicle']);
Route::post('/editVehicle', [APIController::class, 'editVehicle']);
Route::post('/UpdateVehicle', [APIController::class, 'UpdateVehicle']);
Route::post('/editPrice', [APIController::class, 'editPrice']);
Route::post('/UpdatePrice', [APIController::class, 'UpdatePrice']);
Route::post('/deleteMatches', [APIController::class, 'deleteMatches']);
Route::post('/matches', [APIController::class, 'matches']);

Route::get('/getTraveler', [APIController::class, 'getTraveler']);
Route::get('/getMatches', [APIController::class, 'getMatches']);
Route::get('/search', [APIController::class, 'search']);
Route::post('/deleteuser', [APIController::class, 'deleteuser']);
Route::post('/UpdateTravelverData', [APIController::class, 'UpdateTravelverData']);
Route::get('/currency', [APIController::class, 'currency']);
Route::get('/luggage', [APIController::class, 'luggage']);
Route::get('/vehicle', [APIController::class, 'vehicle']);
Route::post('/PostVehicle', [APIController::class, 'PostVehicle']);
Route::post('/SwipAccepted', [APIController::class, 'SwipAccepted']);
Route::post('/editProfile', [APIController::class, 'editProfile']);
Route::get('/premium_plan', [APIController::class, 'premium_plan']);
Route::get('/user_terms', [APIController::class, 'user_terms']);
Route::get('/multilanguage', [APIController::class, 'multilanguage']);
Route::get('/push_notification', [APIController::class, 'push_notification']);
Route::post('/send_notification', [APIController::class, 'send_notification']);
