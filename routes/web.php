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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', function () {
    return view('jobcategories');
});

Route::get('/categories/{category}', function ($category) {
    return view('jobs_in_category', ['category' => $category]);
});

Route::get('/categories/{category}/jobs/job/{id}', function ($category) {
    return view('maintainance');
});

Route::get('/organizations', function () {
    return view('organizations');
});

Route::get('/organizations/{organization}', function ($organization) {
    return view('jobs_in_organization', ['organization' => $organization]);
});

Route::get('/organizations/{organization}/jobs/job/{id}', function ($organization) {
    return view('maintainance');
});

Route::get('/jobs/job/{id}', function($id){
    return view('maintainance');
});

Route::get('/job/{id}', function($id){
    return view('maintainance');
});

Route::get('/jobs/job/{id}', function($id){
    return view('maintainance');
});

// Creations
Route::get('/admin/job/create', [JobsController::class, 'create'])->name('jobs.create'); 

Route::get('/admin/organization/create',  [OrganizationsController::class, 'create'])->name('organizations.create');

Route::get('/admin/category/create', function() {
    return view('admin.categorycreate');
}); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
