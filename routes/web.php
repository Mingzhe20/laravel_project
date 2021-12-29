<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyJobController;
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

Route::view('/home','home');

Route::get('/job',[AdminController::class,'ShowJob']);

Route::get('/job/{id}',[AdminController::class,'ShowSelectJob']);

Route::post('/job',[AdminController::class,'CreateJob']);


Route::get('/job/delete/{id}',[AdminController::class,'DeleteJob']);

Route::get('/apply/{id}',[ApplyJobController::class,'ApplyForm']);
Route::post('/apply/{id}',[ApplyJobController::class,'NewApplication']);