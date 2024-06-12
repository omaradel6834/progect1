<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\ReceiptStudentController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\PaymentStudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuizzeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OnlineController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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
// */
//  Auth::routes();

// Route::group(['middleware'=>['guest']], function(){
//     Route::get('/', function () {
//         return view('auth.login');
//     });
    
// });

  Route::get('/', [HomeController::class,'index'])->name('selection');

  Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login/{type}', [LoginController::class,'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class,'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class,'logout'])->name('logout');


});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
    ], function(){ //...

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::resource('Grades', GradeController::class);
        Route::resource('Classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');
        Route::post('Filter_Classes', [ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');

        Route::resource('Sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class,'getclasses']);
        Route::view('add_parent', 'livewire.show_Form')->name('add_parent');
        Route::resource('Teachers', TeacherController::class);
        Route::resource('Students', StudentController::class);
        Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);
        Route::get('/Get_Sections/{id}', [StudentController::class,'Get_Sections']);
        Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');
        Route::resource('Promotion', PromotionController::class);
        Route::resource('Graduated', GraduatedController::class);
        Route::resource('Fees', FeeController::class);
        Route::resource('Fees_Invoices', FeeInvoiceController::class);
        Route::resource('receipt_students', ReceiptStudentController::class);
        Route::resource('ProcessingFee', ProcessingFeeController::class);
        Route::resource('Payment_students', PaymentStudentController::class);
        Route::resource('Attendance', AttendanceController::class);
        Route::resource('subjects', SubjectController::class);

        Route::resource('questions', QuestionController::class);
        Route::resource('Quizzes', QuizzeController::class);
        
        Route::resource('online', OnlineController::class);
        // Route::get('indirect_admin', OnlineController::class ,'indirectCreate')->name('indirect.create.admin');
        // Route::post('indirect_admin', OnlineController::class , 'storeIndirect')->name('indirect.store.admin');
        Route::resource('library', LibraryController::class);
        Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');
        Route::resource('settings', SettingController::class);
    });




