<?php

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Students\dashboard\ExamsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Parents\dashboard\ChildrenController;
use App\Http\Controllers\Students\dashboard\ProfileController;

/*
|--------------------------------------------------------------------------
|parent Routes
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
    ], function () {


        Route::get('/parent/dashboard', function () {
            $sons = Student::where('parent_id',auth()->user()->id)->get();
            return view('pages.parents.dashboard',compact('sons'));
        });
    
            Route::resource('student_exams',ExamsController::class);
            Route::resource('profile-student',ProfileController::class);
    
            Route::get('children', [ChildrenController::class,'index'])->name('sons.index');
            Route::get('results/{id}', [ChildrenController::class,'results'])->name('sons.results');


            Route::get('attendances', [ChildrenController::class,'attendances'])->name('sons.attendances');
            Route::post('attendances',[ChildrenController::class,'attendanceSearch'])->name('sons.attendance.search');
            Route::get('fees', [ChildrenController::class,'fees'])->name('sons.fees');
            Route::get('receipt/{id}', [ChildrenController::class,'receiptStudent'])->name('sons.receipt');
            Route::get('profile/parent', [ChildrenController::class,'profile'])->name('profile.show.parent');
            Route::post('profile/parent/{id}', [ChildrenController::class,'update'])->name('profile.update.parent');
        });



