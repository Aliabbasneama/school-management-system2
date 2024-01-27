<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Quizzes\QuizzController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\questions\QuestionController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\OnlineClasseController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\ReceiptStudentsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
//Auth::routes();
Route::get('/', [HomeController::class,'index'])->name('selection');

Route::get('/login/{type}',[LoginController::class,'loginForm'])->middleware('guest')->name('login.show');


Route::post('/login',[LoginController::class,'login'])->name('login');


Route::get('/logout/{type}', [LoginController::class,'logout'])->name('logout');


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){
       
    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');
    

    Route::resource('Grades',GradeController::class);

    // Route::group(['namespace' => 'Grades'],function(){
    //    Route::get('Grades', [GradeController::class,'index'])->name('Grades.index');
    //    Route::post('Grades', [GradeController::class,'store'])->name('Grades.store');
    //    Route::PATCH ('Grades', [GradeController::class,'update'])->name('Grades.update');
    //    Route::delete('Grades', [GradeController::class,'destroy'])->name('Grades.destroy');

      // Route::resource('Grades', 'GradeController');

    //});
    
           //___________Classroos_________//
           Route::resource('Classrooms',ClassroomController::class);
            Route::post('delete_all',[ClassroomController::class,'delete_all'])->name('delete_all');
            Route::post('Filter_Classes',[ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');  
         //___________EndClassroos_________//

         //___________Sections_________//
         Route::resource('Sections', SectionController::class);
         Route::get('/classes/{id}', [SectionController::class,'getclasses']);
      //___________EndSections_________//

       //============parents============================

       Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });
      //============parent=======================
       Route::view('add_parent','livewire.show_Form')->name('add_parent');

       //============Endparents============================

       //============Teachers============================
       Route::resource('Teachers', TeacherController::class);
     //==============================Students============================
    Route::resource('Students', StudentController::class);
    Route::resource('online_classes', OnlineClasseController::class);
    Route::resource('library', LibraryController::class);

    Route::get('download_file/{filename}', [LibraryController::class,'downloadAttachment'])->name('downloadAttachment');

    Route::resource('Promotion',PromotionController::class);
    Route::resource('Graduated',GraduatedController::class);
    Route::resource('Fees_Invoices',FeesInvoicesController::class);
    Route::resource('Fees',FeesController::class);
    Route::resource('receipt_students',ReceiptStudentsController::class);
    Route::resource('ProcessingFee',ProcessingFeeController::class);
    Route::resource('Payment_students',PaymentController::class);
    Route::resource('Attendance',AttendanceController::class);

    
    Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}',[StudentController::class,'Download_attachment'])->name('Download_attachment');
    Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');
   //============EndTeachers============================

  //==============================Subjects============================
   Route::resource('subjects',SubjectController::class);
 //==============================Quizzes============================

   Route::resource('Quizzes',QuizzController::class);
 
    //==============================questions============================
    Route::resource('questions',QuestionController::class);
  
   //==============================Setting============================
   Route::resource('settings',SettingController::class);


  
});






	
	










