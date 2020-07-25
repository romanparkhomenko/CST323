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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'jobs' => 'JobsRestController',
    'users' => 'UserRestController',
    'groups' => 'GroupsRestController'
]);

Route::post('jobs/store', 'JobsRestController@store');
Route::post('groups/store', 'GroupsRestController@store');
