<?php

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

Route::post('register', 'RegisterController@register');
Route::post('login', 'RegisterController@login');
Route::get('unauthorized', function () {
    return response()->json([
        'success' => false,
        'message' => 'You are not logged in, e.g. using a valid access token',
    ]);
})->name('api.unauthorized');

/*Route::middleware(['auth:api', 'role:admin|staff|subscriber'])->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['middleware' => ['auth:api']], function () {

    Route::get('profile', 'RegisterController@profile');
    Route::post('profile', 'RegisterController@updateProfile');
    Route::post('profile/change-password', 'RegisterController@changePassword');

    Route::apiResource('users', 'UserController', ['only' => [
        'index', 'store', 'show', 'update', 'destroy']])->middleware(['role:admin']);

    Route::post('exports/generate-requisition-no', 'ExportController@generateRequisitionNo')
        ->name('exports.generateRequisitionNo')->middleware(['role:admin']);

    Route::apiResource('exports', 'ExportController', ['only' => [
        'index', 'store', 'show', 'update', 'destroy']])->middleware(['role:admin']);

    Route::post('imports/generate-requisition-no', 'ImportController@generateRequisitionNo')
        ->name('imports.generateRequisitionNo')->middleware(['role:admin']);

    Route::apiResource('imports', 'ImportController', ['only' => [
        'index', 'store', 'show', 'update', 'destroy']])->middleware(['role:admin']);

    Route::apiResource('vehicles', 'VehicleController', ['only' => [
        'index', 'store', 'show', 'update', 'destroy']])->middleware(['role:admin|staff|subscriber']);

});
