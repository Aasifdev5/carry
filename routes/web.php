<?php

use App\Http\Controllers\Currency;
use App\Http\Controllers\Distributor;
use App\Http\Controllers\InvitedUsers;
use App\Http\Controllers\Languages;
use App\Http\Controllers\LanguageTranslationController;
use App\Http\Controllers\Limitation;
use App\Http\Controllers\PremiumPlan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Luggage;
use App\Http\Controllers\MatchesList;
use App\Http\Controllers\MultiLingual;
use App\Http\Controllers\PaymentInterface;
use App\Http\Controllers\Push;
use App\Http\Controllers\UserTerms;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'prevent-back-history'], function () {
   Route::get('/index', [User::class, 'index'])->name('index')->middleware('alreadyLoggedIn');
   Route::get('/', [User::class, 'index'])->name('index')->middleware('alreadyLoggedIn');
   Route::get('/dashboard', [User::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
   Route::get('/users_list', [User::class, 'users_list'])->name('users_list')->middleware('isLoggedIn');
   Route::get('/add_user', [User::class, 'add_user'])->name('add_user')->middleware('isLoggedIn');
   Route::get('/profile', [User::class, 'profile'])->name('profile')->middleware('isLoggedIn');
   Route::get('/push_notice', [Push::class, 'push_notice'])->name('push_notice')->middleware('isLoggedIn');
   Route::get('/add_push_notification', [Push::class, 'add_push_notification'])->name('add_push_notification')->middleware('isLoggedIn');
   Route::post('/save_push_notification', [Push::class, 'save_push_notification'])->name('save_push_notification');
   Route::get('/edit_push_notification', [Push::class, 'edit_push_notification'])->name('edit_push_notification')->middleware('isLoggedIn');
   Route::post('/update_push_notification', [Push::class, 'update_push_notification'])->name('update_push_notification');
   Route::get('/delete_push_notification', [Push::class, 'delete_push_notification'])->name('delete_push_notification');
   Route::get('/change_password', [User::class, 'change_password'])->name('change_password')->middleware('isLoggedIn');
   Route::get('/vehicle_list', [VehicleController::class, 'vehicle_list'])->name('vehicle_list')->middleware('isLoggedIn');
   Route::get('/add_vehicle', [VehicleController::class, 'add_vehicle'])->name('add_vehicle')->middleware('isLoggedIn');
   Route::get('/edit_vehicle', [VehicleController::class, 'edit_vehicle'])->name('edit_vehicle')->middleware('isLoggedIn');
   Route::post('/save_vehicle', [VehicleController::class, 'save_vehicle'])->name('save_vehicle');
   Route::post('/update_vehicle', [VehicleController::class, 'update_vehicle'])->name('update_vehicle');
   Route::get('/premium_plan', [PremiumPlan::class, 'premium_plan'])->name('premium_plan')->middleware('isLoggedIn');
   Route::get('/add_plan', [PremiumPlan::class, 'add_plan'])->name('add_plan')->middleware('isLoggedIn');
   Route::post('/save_plan', [PremiumPlan::class, 'save_plan'])->name('save_plan');
   Route::get('/edit_plan', [PremiumPlan::class, 'edit_plan'])->name('edit_plan')->middleware('isLoggedIn');
   Route::post('/update_plan', [PremiumPlan::class, 'update_plan'])->name('update_plan');
   Route::get('/delete_plan', [PremiumPlan::class, 'delete_plan'])->name('delete_plan');
   Route::get('/delete_vehicle', [VehicleController::class, 'delete_vehicle'])->name('delete_vehicle');
   Route::get('/currency', [Currency::class, 'currency'])->name('currency')->middleware('isLoggedIn');
   Route::get('/add_currency', [Currency::class, 'add_currency'])->name('add_currency')->middleware('isLoggedIn');
   Route::post('/save_currency', [Currency::class, 'save_currency'])->name('save_currency');
   Route::get('/edit_currency', [Currency::class, 'edit_currency'])->name('edit_currency')->middleware('isLoggedIn');
   Route::get('/delete_currency', [Currency::class, 'delete_currency'])->name('delete_currency');
   Route::post('/update_currency', [Currency::class, 'update_currency'])->name('update_currency');
   Route::get('/luggages', [Luggage::class, 'luggages'])->name('luggages')->middleware('isLoggedIn');
   Route::get('/add_luggage', [Luggage::class, 'add_luggage'])->name('add_luggage')->middleware('isLoggedIn');
   Route::post('/save_luggage_type', [Luggage::class, 'save_luggage_type'])->name('save_luggage_type');
   Route::get('/edit_luggage_type', [Luggage::class, 'edit_luggage_type'])->name('edit_luggage_type')->middleware('isLoggedIn');
   Route::post('/update_luggage_type', [Luggage::class, 'update_luggage_type'])->name('update_luggage_type');
   Route::get('/delete_luggage_type', [Luggage::class, 'delete_luggage_type'])->name('delete_luggage_type');
   Route::get('/language', [Languages::class, 'language'])->name('language')->middleware('isLoggedIn');
   Route::get('/add_language', [Languages::class, 'add_language'])->name('add_language')->middleware('isLoggedIn');
   Route::post('/save_language', [Languages::class, 'save_language'])->name('save_language');
   Route::get('/edit_language', [Languages::class, 'edit_language'])->name('edit_language')->middleware('isLoggedIn');
   Route::get('/delete_language', [Languages::class, 'delete_language'])->name('delete_language');
   Route::post('/update_language', [Languages::class, 'update_language'])->name('update_language');
   Route::get('/api_keys', [PaymentInterface::class, 'api_keys'])->name('api_keys')->middleware('isLoggedIn');
   Route::post('/save_api_key', [PaymentInterface::class, 'save_api_key'])->name('save_api_key');
   Route::get('/add_api', [PaymentInterface::class, 'add_api'])->name('add_api')->middleware('isLoggedIn');
   Route::get('/edit_api', [PaymentInterface::class, 'edit_api'])->name('edit_api')->middleware('isLoggedIn');
   Route::post('/update_api_key', [PaymentInterface::class, 'update_api_key'])->name('update_api_key');
   Route::get('/delete_api', [PaymentInterface::class, 'delete_api'])->name('delete_api');
   Route::get('/matches', [MatchesList::class, 'matches'])->name('matches')->middleware('isLoggedIn');
   Route::get('/user_term', [UserTerms::class, 'user_term'])->name('user_term')->middleware('isLoggedIn');
   Route::get('/add_term', [UserTerms::class, 'add_term'])->name('add_term')->middleware('isLoggedIn');
   Route::post('/save_term', [UserTerms::class, 'save_term'])->name('save_term');
   Route::get('/edit_term', [UserTerms::class, 'edit_term'])->name('edit_term')->middleware('isLoggedIn');
   Route::post('/update_term', [UserTerms::class, 'update_term'])->name('update_term');
   Route::get('/delete_term', [UserTerms::class, 'delete_term'])->name('delete_term');
   Route::get('lang', [MultiLingual::class, 'lang'])->name('lang')->middleware('isLoggedIn');
   Route::get('lang/change', [MultiLingual::class, 'lang_change'])->name('lang_change');
   Route::get('lang/change', [User::class, 'lang_change'])->name('lang_change');
   Route::get('limitation', [Limitation::class, 'limitation'])->name('limitation')->middleware('isLoggedIn');
   Route::get('/add_limit', [Limitation::class, 'add_limit'])->name('add_limit')->middleware('isLoggedIn');
   Route::post('/save_limit', [Limitation::class, 'save_limit'])->name('save_limit');
   Route::post('/update_limit', [Limitation::class, 'update_limit'])->name('update_limit');
   Route::get('/edit_limit', [Limitation::class, 'edit_limit'])->name('edit_limit')->middleware('isLoggedIn');
   Route::get('/delete_limit', [Limitation::class, 'delete_limit'])->name('delete_limit');
   Route::get('invited_users', [InvitedUsers::class, 'invited_users'])->name('invited_users')->middleware('isLoggedIn');
   Route::get('/distributor_management', [Distributor::class, 'distributor_management'])->name('distributor_management')->middleware('isLoggedIn');
   Route::get('/add_distributor', [Distributor::class, 'add_distributor'])->name('add_distributor')->middleware('isLoggedIn');
   Route::post('/save_distributor', [Distributor::class, 'save_distributor'])->name('save_distributor');
   Route::get('languages', [LanguageTranslationController::class, 'index'])->name('languages')->middleware('isLoggedIn');
   Route::post('translations/update', [LanguageTranslationController::class, 'transUpdate'])->name('translation.update.json');
   Route::post('translations/updateKey', [LanguageTranslationController::class, 'transUpdateKey'])->name('translation.update.json.key');
   Route::delete('translations/destroy/{key}', [LanguageTranslationController::class, 'destroy'])->name('translations.destroy');
   Route::post('translations/create', [LanguageTranslationController::class, 'store'])->name('translations.create');
   Route::get('check-translation', function () {
      App::setLocale('en');

      dd(__('website'));
   });
});

Route::post('update_password', [User::class, 'update_password'])->name('update_password');
Route::post('customer_login', [User::class, 'customer_login'])->name('customer_login');
Route::get('/register', [User::class, 'register'])->name('register')->middleware('alreadyLoggedIn');
Route::post('registeration', [User::class, 'registeration'])->name('registeration');
Route::get('/logout', [User::class, 'logout'])->name('logout');
