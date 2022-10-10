<?php

use Soulfy\Setting;
use App\Models\Listing;
use Faker\Provider\Lorem;
use Soulfy\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


use Soulfy\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use Intervention\Image\ImageManagerStatic as Image;
use Soulfy\Http\Requests\CreateContactEmailRequest;

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

    
//listing
Route::get('/', [ListingController::class , 'index']);
Route::get('/listings/create', [ListingController::class , 'create'])->middleware('auth');
Route::get('/listings/manage', [ListingController::class , 'manage'])->middleware('auth');
Route::post('/listings', [ListingController::class , 'store'])->middleware('auth');
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');
Route::get('/listings/{listing}', [ListingController::class , 'show']);

//authentication
Route::get('/users/register',[UserController::class,'create'])->middleware('guest');
Route::post('/users/register',[UserController::class,'store']);
Route::get('/users/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate',[UserController::class,'authenticate']);
Route::post('/users/logout',[UserController::class,'logout'])->middleware('auth');




