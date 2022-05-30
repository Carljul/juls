<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TimeTrackerSettingController;
use App\Http\Controllers\TimeTrackerController;
use App\Http\Controllers\HomeController;
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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('time_tracker_settings', TimeTrackerSettingController::class);
    Route::resource('time_tracker', TimeTrackerController::class);
});
