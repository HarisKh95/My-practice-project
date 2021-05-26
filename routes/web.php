<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
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

Route::get('login1',function()
{
    return view('login');
})->name('mylogin');


Route::get('register1',function()
{
    return view('register');
})->name('myregister');

Route::post('/logout',[RegisterController::class,'mylogout'])->name('userlogout');

Route::group(['prefix'=>'admin'],function(){
    Route::middleware(['guest:admin'],function(){
        Route::get('login1',function()
        {
            return view('login');
        })->name('mylogin');
    });

    Route::middleware(['IsAdmin'])->group(function () {
        Route::get('index',[AdminController::class,'index'])->name('AdminIndex');
    });
});

Route::group(['prefix'=>'doctor'],function(){
    Route::middleware(['guest:doctor'],function(){
        Route::get('login1',function()
        {
            return view('login');
        })->name('mylogin');
    });

    Route::middleware(['IsDoc'])->group(function () {
        Route::get('index',[DoctorController::class,'index'])->name('DoctorIndex');
    });
});

Route::group(['prefix'=>'patient'],function(){
    Route::middleware(['guest:patient'],function(){
        Route::get('login1',function()
        {
            return view('login');
        })->name('mylogin');
    });

    Route::middleware(['IsPat'])->group(function () {
        Route::get('index',[PatientController::class,'index'])->name('PatientIndex');
    });
});


Route::post('newregister',[RegisterController::class,'newregister'])->name('newuser');
Route::post('newlogin',[RegisterController::class,'newlogin'])->name('userlogin');




// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
