<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// 项目列表
Route::get('/projects/tree', 'ProjectController@tree');

// 获取任务列表
Route::get('/missions', 'MissionController@listMissions');
Route::get('/mission/{id}/divisions', 'MissionController@getMissionDivisions');
Route::delete('/missions/{id}', 'MissionController@deleteMission');