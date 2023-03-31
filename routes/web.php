<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogscontroller;
use App\Http\Controllers\teamscontroller;
use App\Http\Controllers\workscontroller;
use App\Http\Controllers\offerscontroller;
use App\Http\Controllers\featurescontroller;
use App\Http\Controllers\Admin\AdminController;

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

Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group( function() {
route::get('index',[AdminController::class,'index'])->name('index');

Route::get('works/trash', [workscontroller::class, 'trash'])->name('works.trash');
Route::get('works/{id}/restore', [workscontroller::class, 'restore'])->name('works.restore');
Route::delete('works/{id}/forcedelete', [workscontroller::class, 'forcedelete'])->name('works.forcedelete');
Route::resource('works', workscontroller::class);

Route::get('offers/trash', [offerscontroller::class, 'trash'])->name('offers.trash');
Route::get('offers/{id}/restore', [offerscontroller::class, 'restore'])->name('offers.restore');
Route::delete('offers/{id}/forcedelete', [offerscontroller::class, 'forcedelete'])->name('offers.forcedelete');
Route::resource('offers', offerscontroller::class);

Route::get('teams/trash', [teamscontroller::class, 'trash'])->name('teams.trash');
Route::get('teams/{id}/restore', [teamscontroller::class, 'restore'])->name('teams.restore');
Route::delete('teams/{id}/forcedelete', [teamscontroller::class, 'forcedelete'])->name('teams.forcedelete');
Route::resource('teams', teamscontroller::class);


Route::get('blogs/trash', [blogscontroller::class, 'trash'])->name('blogs.trash');
Route::get('blogs/{id}/restore', [blogscontroller::class, 'restore'])->name('blogs.restore');
Route::delete('blogs/{id}/forcedelete', [blogscontroller::class, 'forcedelete'])->name('blogs.forcedelete');
Route::resource('blogs', blogscontroller::class);

Route::get('features/trash', [featurescontroller::class, 'trash'])->name('features.trash');
Route::get('features/{id}/restore', [featurescontroller::class, 'restore'])->name('features.restore');
Route::delete('features/{id}/forcedelete', [featurescontroller::class, 'forcedelete'])->name('features.forcedelete');
Route::resource('features', featurescontroller::class);

});
Route::view('not-allowed', 'not_allowed');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
