<?php

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\StudentTeacherController;
use App\Http\Controllers\QuizzTeacherController;
use App\Http\Controllers\QuestionTeacherController;
use App\Http\Controllers\ProfileTeacherController;
use App\Http\Controllers\OnlineZoomClassesController;
/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = Teacher::findorFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();

//        $ids = DB::table('teacher_section')->where('teacher_id',auth()->user()->id)->pluck('section_id');
//        $count_sections =  $ids->count();
//        $count_students = DB::table('students')->whereIn('section_id',$ids)->count();
        return view('Teachers.dashboard',$data);
    });

   
        //==============================students============================
     Route::get('student',[StudentTeacherController::class,'index'])->name('student.index');
     Route::get('sections',[StudentTeacherController::class,'sections'])->name('sections');
     Route::post('attendance',[StudentTeacherController::class, 'attendance'])->name('attendance');
     Route::post('edit_attendance',[StudentTeacherController::class,'editAttendance'])->name('attendance.edit');
     Route::get('attendance_report',[StudentTeacherController::class,'attendanceReport'])->name('attendance.report');
     Route::post('attendance_report',[StudentTeacherController::class,'attendanceSearch'])->name('attendance.search');
     Route::resource('quizzes', QuizzTeacherController::class);
     Route::resource('questions', QuestionTeacherController::class);
     Route::resource('online_zoom_classes', OnlineZoomClassesController::class);
     Route::get('/indirect', [OnlineZoomClassesController::class,'indirectCreate'])->name('indirect.teacher.create');
     Route::post('/indirect', [OnlineZoomClassesController::class,'storeIndirect'])->name('indirect.teacher.store');
     Route::get('profile', [ProfileTeacherController::class,'index'])->name('profile.show');
     Route::post('profile/{id}', [ProfileTeacherController::class,'update'])->name('profile.update');
     Route::get('student_quizze/{id}',[QuizzTeacherController::class,'student_quizze'])->name('student.quizze');
     Route::post('repeat_quizze', [QuizzTeacherController::class,'repeat_quizze'])->name('repeat.quizze');


    });


