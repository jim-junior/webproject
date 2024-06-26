<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/home',[AdminController::class,'index'])->middleware(['auth', 'admin']);

Route::get('/index',[AdminController::class,'index'])->middleware(['auth', 'admin']);

Route::get('/fetch-borrow-data',[AdminController::class,'fetch_borrow_data'])->middleware(['auth', 'admin']);

Route::get('/get-book-counts',[AdminController::class,'get_book_counts'])->middleware(['auth', 'admin']);

Route::get('/generateBookInventoryReport',[AdminController::class,'generateBookInventoryReport'])->middleware(['auth', 'admin']);

Route::get('/showBookImages',[AdminController::class,'showBookImages'])->middleware(['auth', 'admin']);

Route::get('/show_members',[AdminController::class,'show_members'])->middleware(['auth', 'admin']);

Route::get('/category_page',[AdminController::class,'category_page'])->middleware(['auth', 'admin']);

Route::get('/category',[AdminController::class,'category'])->middleware(['auth', 'admin']);

Route::post('/add_category',[AdminController::class,'add_category'])->middleware(['auth', 'admin']);

Route::get('/cat_delete/{id}',[AdminController::class,'cat_delete'])->middleware(['auth', 'admin']);

Route::get('/add_book',[AdminController::class,'add_book'])->middleware(['auth', 'admin']);

Route::post('/store_book',[AdminController::class,'store_book'])->middleware(['auth', 'admin']);

Route::get('/show_book',[AdminController::class,'show_book'])->middleware(['auth', 'admin']);

Route::get('/book_delete/{id}',[AdminController::class,'book_delete'])->middleware(['auth', 'admin']);

Route::get('/book_details/{id}',[HomeController::class,'book_details']);

Route::get('/borrow_books/{id}',[HomeController::class,'borrow_books']);

Route::get('/show_book_requests',[AdminController::class,'show_book_requests'])->middleware(['auth', 'admin']);

Route::get('/show_approved_requests',[AdminController::class,'show_approved_requests'])->middleware(['auth', 'admin']);

Route::get('/show_rejected_requests',[AdminController::class,'show_rejected_requests'])->middleware(['auth', 'admin']);

Route::get('/borrowed_books',[AdminController::class,'borrowed_books'])->middleware(['auth', 'admin']);

Route::get('/approve_book/{id}',[AdminController::class,'approve_book'])->middleware(['auth', 'admin']);

Route::get('/return_book/{id}',[AdminController::class,'return_book'])->middleware(['auth', 'admin']);

Route::get('/reject_book_request/{id}',[AdminController::class,'reject_book_request'])->middleware(['auth', 'admin']);

Route::get('/book_history',[HomeController::class,'book_history']);

Route::get('/cancel_request/{id}',[HomeController::class,'cancel_request']);

Route::get('/explore',[HomeController::class,'explore']);

Route::get('/my_books',[HomeController::class,'my_books']);

Route::get('/search',[HomeController::class,'search']);

Route::get('/category_search/{id}',[HomeController::class,'category_search']);



