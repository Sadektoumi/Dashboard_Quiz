<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Superadmin\AdminController;
use App\Http\Controllers\Superadmin\UserController;
use App\Http\Controllers\Superadmin\AnswerController;
use App\Http\Controllers\Superadmin\QuizController;

use App\Http\Controllers\Superadmin\QuestionController;
use App\Http\Controllers\Superadmin\DashboardController as SuperadminDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Superadmin\CategoryController;
use App\Models\Category;

// Admin login routes
Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');


// Group for authenticated admin and superadmin routes
Route::middleware(['auth:admin'])->group(function () {

    Route::get('superadmin/dashboard', [SuperadminDashboardController::class, 'index'])->name('superadmin.dashboard');
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/manage-users',[UserController::class,'index'])->name('admin.manage.users');

});

Route::middleware(['auth:admin'])->group(function () {

    // Admin Management Routes
    Route::get('/admin/manage-admins', [AdminController::class, 'manageAdmins'])->name('admin.manage.admins');
    Route::post('/admin/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/admin/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/admins/data', [AdminController::class, 'getAdminsData'])->name('admin.getAdminsData');
    Route::put('/admin/admin/{admin}', [AdminController::class, 'update'])->name('admin.update');



    // User Management Routes

    Route::get('admin/manage-users/create', [UserController::class,'index'])->name('user.create');
    Route::post('admin/manage-users', [UserController::class,'store'])->name('user.store');
    Route::get('admin/manage-users/{id}/edit', [UserController::class,'index'])->name('user.edit');
    Route::put('admin/manage-users/{id}', [UserController::class,'index'])->name('user.update');
    Route::delete('admin/manage-users/{id}', [UserController::class,'destroy'])->name('user.destroy');

       // ASNWERs Management Routes


    Route::get('admin/manage-answers',[AnswerController::class,'index'])->name('admin.manage.answers');


    // ASNWERs Management Routes


    Route::get('admin/manage-categories',[CategoryController::class,'index'])->name('admin.manage.categories');


// Category CRUD Routes

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');



// Display quizzes and handle CRUD operations
Route::get('quizzes', [QuizController::class, 'index'])->name('quiz.index');
Route::post('quizzes', [QuizController::class, 'store'])->name('quiz.store');
Route::put('quizzes/{quiz}', [QuizController::class, 'update'])->name('quiz.update');
Route::delete('quizzes/{quiz}', [QuizController::class, 'destroy'])->name('quiz.destroy');



Route::get('questions', [QuestionController::class, 'index'])->name('question.index');
Route::post('questions', [QuestionController::class, 'store'])->name('question.store');
Route::put('questions/{question}', [QuestionController::class, 'update'])->name('question.update');
Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('question.destroy');



Route::get('answers', [AnswerController::class, 'index'])->name('answer.index');
Route::post('answers', [AnswerController::class, 'store'])->name('answer.store');
Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answer.update');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answer.destroy');





});






