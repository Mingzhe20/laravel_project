<?php


use Illuminate\Support\Facades\Route;
use App\Models\Newsletter;
use App\Http\Controllers\NewsletterController;

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

Route::get('/contactus', function () {
    return view('contactus');
});

Route::post('/contactus', function () {
    $message=new Newsletter();
    $message->name=request('name');
    $message->email=request('email');
    $message->message=request('message');
    $message->save();
});



// Route::get('/home', function () {
//     return view('home');
// });
Route::view('/home', 'home');
Route::view('/message', 'message');
Route::get('/message','App\Http\Controllers\NewsletterController@index');