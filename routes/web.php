<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\UserPageController;
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

Route::get('/index', [LoginController::class, 'index']);
Route::post('/index', [LoginController::class, 'loginForm'])->name('user_login');
Route::post('/register', [RegisterController::class, 'formRegister']);
Route::get('/register', [RegisterController::class, 'index'])->name('user_register');
//
Route::get('/admin-page', [LoginController::class, 'toPage'])->name('to-admin-page');
Route::get('/user-page', [LoginController::class, 'toPage'])->name('to-user-page');

//ทำการส่ง id จาก page url ต้นทาง ไป page url ปลายทาง 
Route::get('/admin-edit-page/{id}', [AdminPageController::class, 'editUser'])->name('edit-userBy-id');
Route::get('/admin-delete-page/{id}', [AdminPageController::class, 'deleteUser'])->name('delete-userBy-id');

//ย้อนกลับไป url page ต้นทาง ไป page url ปลายทาง 
Route::get('/admin-update-page', [AdminPageController::class, 'backPage']); 

//ส่ง request จาก page url ต้นทาง ไป method ที่ต้องการ
Route::put('/admin-update-page/{id}', [AdminPageController::class, 'updateUser']); 
//
Route::get('/admin-page', [AdminPageController::class, 'adminLogout'])->name('admin.logout');
//User
Route::get('/user-page', [UserPageController::class, 'userLogout'])->name('user.logout');



