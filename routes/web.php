<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Course_Cate_Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeMasterController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\TrashControoler;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

//============= This is the Auth controller
Route::get('/login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'auth_login']);
Route::get('/logout', [AuthController::class, 'logout']);
//============= This is the home controller


//============= This is the admin controller

Route::group(['prefix' => '/panel/dashboard', 'middleware' => "user_type"], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('user.index');
    //user
    Route::get('/users', [UsersController::class, 'index_user'])->name('user.index');
    Route::get('/users/create', [UsersController::class, 'create_user'])->name('user.create');
    Route::post('/users/store', [UsersController::class, 'store_user'])->name('user.store');
    Route::delete('/delete/users', [UsersController::class, 'destroy_users']);
    Route::get('/users/edit/{id}', [UsersController::class, 'edit_user'])->name('user.edit');
    Route::post('/users/update/{id}', [UsersController::class, 'update_users'])->name('user.update');
    Route::get('/users/view/{id}', [UsersController::class, 'view_users'])->name('user.view');
    //================= permission ==================
    Route::get('/permission', [PermissionController::class, 'index_permission'])->name('permission.index');
    Route::post('/permission/store', [PermissionController::class, 'store_permission'])->name('permission.store');
    //================== Role ==================
    Route::get('/role', [PermissionController::class, 'index_role'])->name('role.index');
    Route::get('/role/create', [PermissionController::class, 'create_role'])->name('role.create');
    Route::post('/role/store', [PermissionController::class, 'store_role'])->name('role.store');
    Route::get('/role/edit/{id}', [PermissionController::class, 'edit_role'])->name('role.edit');
    Route::post('/role/update/{id}', [PermissionController::class, 'update_role'])->name('role.update');
    Route::get('/role/view/{id}', [PermissionController::class, 'view_role'])->name('role.view');
    Route::delete('/delete/roles', [PermissionController::class, 'destroy_roles']);
    //================== disable==================
    Route::get('/users/{id}', [UsersController::class, 'disable']);


    //================= course Category ==================
    Route::get('/course_category', [CategoryController::class, 'index_course_cate'])->name('course_cate.index');
    Route::get('/course_category/create', [CategoryController::class, 'create_course_category'])->name('course_category.create');
    Route::post('/course_category/store', [CategoryController::class, 'store_course_category'])->name('course_category.store');
    Route::get('/course_category/edit/{id}', [CategoryController::class, 'edit_course_category'])->name('course_category.edit');
    Route::post('/course_category/update/{id}', [CategoryController::class, 'update_course_category'])->name('course_category.update');
    Route::delete('/course_category/delete', [CategoryController::class, 'delete_course_category'])->name('course_category.delete');
    Route::get('/course_category/view/{id}', [CategoryController::class, 'view_course_category'])->name('course_category.view');

    //================= Course  ==================
    Route::get('/courses', [CoursesController::class, 'index_courses'])->name('courses.index');
    Route::get('/courses/create', [CoursesController::class, 'create_courses'])->name('courses.create');
    Route::post('/courses/store', [CoursesController::class, 'store_courses'])->name('courses.store');
    Route::get('/courses/edit/{id}', [CoursesController::class, 'edit_courses'])->name('courses.edit');
    Route::post('/courses/update/{id}', [CoursesController::class, 'update_courses'])->name('courses.update');
    Route::delete('/courses/delete', [CoursesController::class, 'delete_courses'])->name('courses.delete');
    Route::get('/courses/{id}', [CoursesController::class, 'disable']);

    //================= Videos  ==================
    Route::get('/videos', [VideosController::class, 'index_videos'])->name('videos.index');
    Route::get('videos/create', [VideosController::class, 'create_videos'])->name('videos.create');
    Route::post('videos/store', [VideosController::class, 'store_videos'])->name('videos.store');
    Route::delete('videos/delete', [VideosController::class, 'delete_videos'])->name('videos.delete');
    Route::get('/videos/edit/{id}', [VideosController::class, 'edit_videos'])->name('videos.edit');



    //================= trash  ==================
    Route::get('/trash', [TrashController::class, 'index_Trash'])->name('trash.index');
    Route::delete('/trash/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
   //================= destroy course  ==================
    Route::delete('/trashCourse/{id}', [TrashController::class, 'destroy_course'])->name('trash.destroy_course');




});

//================Home_Master=====================
Route::get('/', [HomeController::class, 'home_master']);
