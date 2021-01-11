<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/jobs', 'App\Http\Controllers\JobsController@store');
Route::get('/jobs', 'App\Http\Controllers\JobsController@index');
Route::get('job/{id}', 'App\Http\Controllers\JobsController@show'); // okay

Route::post('/categories', 'App\Http\Controllers\CategoriesController@store');
Route::get('/categories', 'App\Http\Controllers\CategoriesController@index');
Route::get('/categories/{category}', 'App\Http\Controllers\JobsController@jobsInCategoriesIndex');

Route::post('/organizations', 'App\Http\Controllers\OrganizationsController@store');
Route::get('/organizations', 'App\Http\Controllers\OrganizationsController@index');
Route::get('/organizations/{organization}', 'App\Http\Controllers\JobsController@jobsInOrganizationIndex');

Route::post('/feedback', 'App\Http\Controllers\FeedbackController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
