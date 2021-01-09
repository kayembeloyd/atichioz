<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\JobsController;
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

// Creations
Route::get('/admin/job/create', [JobsController::class, 'create'])->name('jobs.create'); 

Route::get('/admin/organization/create',  [OrganizationsController::class, 'create'])->name('organizations.create');

Route::get('/admin/category/create', function() {
    return view('admin.categorycreate');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
