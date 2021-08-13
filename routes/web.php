<?php

use app\controllers\YearController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\module\StreamController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\CourseInstructorController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

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

Auth::routes();


Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/year',[YearController::class,'index']);
Route::resource('classes',ClassesController::class);
Route::resource('streams',StreamController::class);
Route::get('/courses',[CourseController::class,'index']);
    Route::post('/submit-course',[CourseController::class,'store']);
    Route::put('/course-update/{id}',[CourseController::class,'update']);
    Route::delete('/course-delete/{id}',[CourseController::class,'destroy']);
    Route::get('/view-students/{id}',[CourseController::class,'viewStudents']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //routes for lesson
    Route::get('lesson',[LessonController::class, 'index']);
    Route::post('/submit-lesson',[LessonController::class,'store']);
    Route::get('/edit-lesson/{id}',[LessonController::class,'edit']);
    Route::put('/update-lesson/{id}',[LessonController::class,'update']);

    // routes for instructor
    Route::get('/instructors',[CourseInstructorController::class,'index']);
    Route::post('/submit-instructor',[CourseInstructorController::class,'store']);

    //resource controller route departments
    Route::resource('departments', DepartmentsController::class);
        //resource controller route departments
        Route::resource('students', StudentsController::class);
        //resource controller route user
        Route::resource('users', UserController::class);
    //teachers routes
    Route::resource('teachers', TeachersController::class);

    // unit routes
    Route::get('/unit', [UnitController::class, 'index']);
    Route::post('/create-unit',[UnitController::class,'store']);
    Route::get('/unit-edit/{id}', [UnitController::class, 'edit']);
    Route::put('/unit-update/{id}', [UnitController::class, 'update']);
    
    



    // lesson routes
    Route::get('/lesson', [LessonController::class, 'index']);
    Route::post('/create-lesson',[LessonController::class, 'store'] );
    Route::get('/edit-lesson/{id}', [LessonController::class, 'edit']);
    Route::put('/update-lesson/{id}', [LessonController::class, 'update']);
