<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\ApplicationController;
use App\Http\Controllers\Employees\ClientController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\Employers\EmployerController;
// use App\Http\Controllers\calculator\CalculatorController;
use App\Http\Controllers\Dealers\DealerController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:client', 'prefix' => 'client', 'as' => 'client.'], function() {
        Route::resource('/client/applications', ApplicationController::class);
    });
   Route::group(['middleware' => 'role:employee', 'prefix' => 'employee', 'as' => 'employee.'], function() {
       Route::resource('/employee/clients', ClientController::class);

   });
   Route::group(['middleware' => 'role:employer', 'prefix' => 'employer', 'as' => 'employer.'], function() {
    Route::resource('employers/profiles', EmployerController::class);

});
Route::group(['middleware' => 'role:business', 'prefix' => 'business', 'as' => 'business.'], function() {
    Route::resource('businesses/business', BusinessController::class);

});
Route::group(['middleware' => 'role:dealer', 'prefix' => 'dealer', 'as' => 'dealer.'], function() {
    Route::resource('dealers/dealer', DealerController::class);

});
Route::group(['middleware' => 'role:agent', 'prefix' => 'agent', 'as' => 'agent.'], function() {
    Route::resource('agents/agent', AgentController::class);

});
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', UserController::class);
    });
});



// Route::controller(CalculatorController::class)->group(function() {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });
