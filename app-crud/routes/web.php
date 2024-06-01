<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\NoteController; 
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
    // setting our first page 
    return view('auth.login');
    // return view('welcome'); 
});




// Middleware Authentication 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');



// Product 
Route::get('/product', [ProductController::class, 'index'])->name('product.index')->middleware('is_user'); 
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('is_user');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store')->middleware('is_user');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit')->middleware('is_user');
Route::put('/product/{product}/update', [ProductController::class ,'update'])->name('product.update')->middleware('is_user');
Route::delete('/product/{product}/delete', [ProductController::class ,'delete'])->name('product.delete')->middleware('is_user');


// Notes 
Route::get('/note', [NoteController::class,'index'])->name('note.index')->middleware('is_user');
Route::get('/note/create', [NoteController::class,'create'])->name('note.create')->middleware('is_user');
Route::post('/note/store', [NoteController::class, 'store'])->name('note.store')->middleware('is_user');
Route::get('/note/edit/{note}', [NoteController::class, 'edit'])->name('note.edit')->middleware('is_user');
Route::put('/note/update/{note}', [NoteController::class, 'update'])->name('note.update')->middleware('is_user'); 
Route::get('/note/view/{note}', [NoteController::class, 'view'])->name('note.view')->middleware('is_user'); 