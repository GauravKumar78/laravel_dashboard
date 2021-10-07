<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Disablebackbtn;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/login',[Usercontroller::class,'loginuser'])->name('login_user');
Route::post('/auth/register',[Usercontroller::class,'userregister'])->name('register');
Route::get('/auth/logout',[Usercontroller::class,'logout'])->name('logout');


Route::group(['middleware' => ['disable_backbtn']],function(){
    Route::get('/auth/login',[Usercontroller::class,'login'])->name('auth_login');
    Route::get('/auth/register',[Usercontroller::class,'register'])->name('auth_register');
    Route::get('/auth/dashboard',[Usercontroller::class,'index'])->name('auth_index');
    Route::get('/auth/dashboard/trash',[Usercontroller::class,'usertrash'])->name('auth_usertrash');
    Route::get('/auth/dashboard/{id}',[Usercontroller::class,'delete'])->name('delete');
    Route::get('/auth/userdelete/{id}',[Usercontroller::class,'parmanenetdelete'])->name('auth_delete');
    Route::get('/auth/userrestore/{id}',[Usercontroller::class,'restoreuser'])->name('restore');
    Route::get('/auth/edit/{id}',[UserController::class,'edituser'])->name('auth_edit');
    Route::get('/auth/edit/{id}',[UserController::class,'edituser'])->name('auth_edit');
    Route::put('/auth/edit/{id}',[UserController::class,'updateuser'])->name('update');
});
