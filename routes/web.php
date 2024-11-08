<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Newcontroller;
Route::get('/home',[Newcontroller::class,'hello']);
Route::get('/reg',[Newcontroller::class,'form']);
Route::post('/submit',[Newcontroller::class,'submit']);
Route::get('/display',[Newcontroller::class,'show']);
Route::get('/edit{ed_id}',[Newcontroller::class,'update_form']);
Route::post('/update',[Newcontroller::class,'update']);
Route::get('/signin',[Newcontroller::class,'signin']);
Route::post('/login',[Newcontroller::class,'login']);
Route::get('/logout',[Newcontroller::class,'logout']);
