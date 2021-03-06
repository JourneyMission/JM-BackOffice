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
Route::post('details', 'API\UserController@details');


Route::resource('Checkpoints', CheckpointsController::class);
Route::resource('Badges', BadgesController::class);
Route::resource('CategoryCheckpoints', CategoryCheckpointsController::class);
Route::resource('CategoryMissions', CategoryMissionsController::class);
Route::resource('Checkins', CheckinsController::class);
Route::resource('CheckpointPhotos', CheckpointPhotosController::class);
Route::resource('JoinMissions', JoinMissionsController::class);
Route::resource('Missions', MissionsController::class);
Route::resource('MissionCheckpoints', MissionCheckpointsController::class);
Route::resource('Profiles', ProfilesController::class);
Route::resource('Proviences', ProviencesController::class);
Route::resource('Regions', RegionsController::class);
Route::resource('Reviews', ReviewsController::class);
Route::resource('ProfileBadges', ProfileBadgesController::class);
Route::get('/CheckMission/{id}/{pid}', 'CheckinsController@CheckMission');
Route::get('/Checkin/{cid}/{mid}/{pid}', 'CheckinsController@Checkin');
Route::get('/CheckpointinMission/{id}', 'MissionCheckpointsController@CheckMission');
Route::get('/ProvienceSearch', 'MissionsController@Proviences');
Route::get('/Complete/{pid}/{mid}', 'JoinMissionsController@complete');
Route::get('/RecommendMission/{id}', 'MissionsController@RecommendMission');
Route::get('/TeamScore', 'ProfilesController@TeamScore');
Route::get('/BadgeCheck/{id}', 'BadgesController@BadgeCheck');
Route::group(['middleware' => 'auth:api'], function(){

});