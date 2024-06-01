<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// use controllers Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ClassController as AdminClassController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\TestController as AdminTestController;
use App\Http\Controllers\Admin\CollectionController as AdminCollectionController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\SchoolYearController as AdminSchoolYearController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// use controllers Client
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Client\TestController as ClientTestController;
use App\Http\Controllers\Client\SubjectController as ClientSubjectController;
use App\Http\Controllers\Client\CourseController as ClientCourseController;


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

// Authentication Routes
Auth::routes();

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('class')->group(function () {
        Route::get('/create', [AdminClassController::class, 'create'])->name('admin.class.create');
        Route::post('/store', [AdminClassController::class, 'store'])->name('admin.class.store');

        Route::get('/manage/{slug}' , [AdminClassController::class, 'manage'])->name('admin.class.manage');
        Route::put('/update', [AdminClassController::class, 'update'])->name('admin.class.update');

        Route::delete('/delete', [AdminClassController::class, 'destroy'])->name('admin.class.delete');

        Route::get('/search', [AdminClassController::class, 'search'])->name('admin.class.search');

        Route::get('/', [AdminClassController::class, 'index'])->name('admin.class.index');
    });

    Route::prefix('course')->group(function () {
        Route::get('/create/{slug}', [AdminCourseController::class, 'create'])->name('admin.course.create');
        Route::post('/store', [AdminCourseController::class, 'store'])->name('admin.course.store');

        Route::get('/show/{slug}', [AdminCourseController::class, 'show'])->name('admin.course.show');

        Route::get('/edit/{slug}' , [AdminCourseController::class, 'edit'])->name('admin.course.edit');
        Route::patch('/update', [AdminCourseController::class, 'update'])->name('admin.course.update');

        Route::delete('/delete', [AdminCourseController::class, 'destroy'])->name('admin.course.delete');

        Route::get('/', [AdminCourseController::class, 'index'])->name('admin.course.index');
    });

    Route::prefix('test')->group(function () {
        Route::get('/create', [AdminTestController::class, 'create'])->name('admin.test.create');
        Route::post('/store', [AdminTestController::class, 'store'])->name('admin.test.store');

        Route::get('/show/{slug}', [AdminTestController::class, 'show'])->name('admin.test.show');

        Route::get('/edit/{slug}' , [AdminTestController::class, 'edit'])->name('admin.test.edit');
        Route::patch('/update', [AdminTestController::class, 'update'])->name('admin.test.update');

        Route::get('/add-collection/{slug}' , [AdminTestController::class, 'addCollection'])->name('admin.test.add-collection');
        Route::post('/store-collection', [AdminTestController::class, 'storeCollection'])->name('admin.test.store-collection');

        Route::delete('/delete', [AdminTestController::class, 'destroy'])->name('admin.test.delete');

        Route::get('/', [AdminTestController::class, 'index'])->name('admin.test.index');
    });

    Route::prefix('collection')->group(function () {
        Route::get('/create', [AdminCollectionController::class, 'create'])->name('admin.collection.create');
        Route::post('/store', [AdminCollectionController::class, 'store'])->name('admin.collection.store');

        Route::get('/edit/{slug}' , [AdminCollectionController::class, 'edit'])->name('admin.collection.edit');
        Route::patch('/update', [AdminCollectionController::class, 'update'])->name('admin.collection.update');

        Route::get('/add-question/{slug}' , [AdminCollectionController::class, 'addQuestion'])->name('admin.collection.add-question');
        Route::post('/store-question', [AdminCollectionController::class, 'storeQuestion'])->name('admin.collection.store-question');

        Route::delete('/delete', [AdminCollectionController::class, 'destroy'])->name('admin.collection.delete');

        Route::get('/', [AdminCollectionController::class, 'index'])->name('admin.collection.index');
    });

    Route::prefix('question')->group(function () {
        Route::get('/create', [AdminQuestionController::class, 'create'])->name('admin.question.create');
        Route::post('/store', [AdminQuestionController::class, 'store'])->name('admin.question.store');

        Route::get('/edit/{slug}' , [AdminQuestionController::class, 'edit'])->name('admin.question.edit');
        Route::patch('/update', [AdminQuestionController::class, 'update'])->name('admin.question.update');

        Route::delete('/delete', [AdminQuestionController::class, 'destroy'])->name('admin.question.delete');

        Route::get('/', [AdminQuestionController::class, 'index'])->name('admin.question.index');
    });

    Route::prefix('semester')->group(function ()
    {
        Route::get('/create', [AdminSchoolYearController::class, 'create'])->name('admin.semester.create');
        Route::post('/store', [AdminSchoolYearController::class, 'store'])->name('admin.semester.store');

        Route::get('/edit/{id}' , [AdminSchoolYearController::class, 'edit'])->name('admin.semester.edit');
        Route::patch('/update', [AdminSchoolYearController::class, 'update'])->name('admin.semester.update');

       Route::get('/', [AdminSchoolYearController::class, 'index'])->name('admin.semester.index');
    });

    Route::prefix('user')->group(function ()
    {
        Route::get('/edit/{id}' , [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/update', [AdminUserController::class, 'update'])->name('admin.user.update');

        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
    });

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Client Routes
Route::prefix('/')->group(function () {
    Route::prefix('test')->middleware(['auth'])->group(function () {
        Route::get('/{slug}', [ClientTestController::class, 'show'])->name('test.show');

        Route::post('/submit', [ClientTestController::class, 'submit'])->name('test.submit');

        Route::get('/result/{slug}', [ClientTestController::class, 'result'])->name('test.result');

        Route::get('/', [ClientTestController::class, 'index'])->name('test.index');
    });

    Route::prefix('subject')->group(function () {
        Route::middleware(['auth'])->get('/{slug}', [ClientSubjectController::class, 'show'])->name('subject.show');

        Route::get('/', [ClientSubjectController::class, 'index'])->name('subject.index');
    });

    Route::prefix('course')->group(function () {
        Route::middleware(['auth'])->group(function () {
            Route::post('/store', [ClientCourseController::class, 'store'])->name('course.store');

            Route::get('/{slug}', [ClientCourseController::class, 'show'])->name('course.show');
        });

        Route::get('/', [ClientCourseController::class, 'index'])->name('course.index');
    });

    Route::get('/', [ClientHomeController::class, 'index'])->name('home');
});
