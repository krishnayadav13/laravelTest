<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blogs;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[Blogs::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::post('/createblog',[Blogs::class,'store']);
    Route::get('/formblog', function () {
        return view('createblog');
    });
    Route::get('/updateblog/{id}',[Blogs::class,'updateform']);
    Route::post('/updateblog',[Blogs::class,'update']);
    Route::get('/deleteblog/{id}',[Blogs::class,'destroy']);
    
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
