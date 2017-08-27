<?php

//use Illuminate\Http\Request;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');
	Route::resource('Badges', BadgesController::class);
	Route::resource('CategoryCheckpoints', CategoryCheckpointsController::class);
	Route::resource('CategoryMissions', CategoryMissionsController::class);
	Route::resource('Checkins', CheckinsController::class);
	Route::resource('CheckpointPhotos', CheckpointPhotosController::class);
	Route::resource('Checkpoints', CheckpointsController::class);
	Route::resource('JoinMissions', JoinMissionsController::class);
	Route::resource('Missions', MissionsController::class);
	Route::resource('Profiles', ProfilesController::class);
	Route::resource('Proviences', ProviencesController::class);
	Route::resource('Regions', RegionsController::class);
	Route::resource('Reviews', ReviewsController::class);
});