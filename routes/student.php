<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\dashboard\ExamsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Students\dashboard\ProfileController;

/*
|--------------------------------------------------------------------------
|student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {


        Route::get('/student/dashboard', function () {
            return view('pages.Students.dashboard');
        });
    
            Route::resource('student_exams',ExamsController::class);

            Route::resource('profile-student',ProfileController::class);
    
});

