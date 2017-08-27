<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::group(['middleware' => 'auth:web'], function(){
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
