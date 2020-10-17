<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\movieCollection as movieResource;
use App\Http\Resources\User as UserResource;
use App\Models\movie;

use App\Http\Controllers\movController;

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

Route::get('/v', function () {
    return ['message' => 'hello'];
});


Route::get('/adm', function () {
	$movie = movie::all();
	// return movieResource::collection($movie);
	return new movieResource($movie);

    // return new adminResource(Admin::find(1));
    // return new adminResource(Admin::where('id', 1));
});


Route::get('/mov', function () {
	$movie = movie::all();
	// $movie = movie::find(1);
    return UserResource::collection($movie);
    // return new UserResource($movie);
});

Route::resource('/md', movController::class);
