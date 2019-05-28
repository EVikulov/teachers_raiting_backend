<?php

use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\CriterionController;
use App\Http\Controllers\DisciplinesController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SettingController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::post('/users', ['uses' => UserController::class.'@create']);
    Route::put('/users/{id}', ['uses' => UserController::class.'@update']);
    Route::delete('/users/{id}', ['uses' => UserController::class.'@delete']);
    Route::get('/users/{id}', ['uses' => UserController::class.'@get']);
    Route::get('/users', ['uses' => UserController::class.'@search']);
    Route::get('/profile', ['uses' => UserController::class.'@profile']);
    Route::put('/profile', ['uses' => UserController::class.'@updateProfile']);

    Route::post('/media', ['uses' => MediaController::class.'@create']);
    Route::delete('/media/{id}', ['uses' => MediaController::class.'@delete']);
    Route::get('/media', ['uses' => MediaController::class.'@search']);

    Route::put('/settings/{name}', ['uses' => SettingController::class.'@update']);
    Route::get('/settings/{name}', ['uses' => SettingController::class.'@get']);
    Route::get('/settings', ['uses' => SettingController::class.'@search']);

    Route::post('/groups', ['uses' => GroupsController::class.'@create']);
    Route::put('/groups/{id}', ['uses' => GroupsController::class.'@update']);
    Route::delete('/groups/{id}', ['uses' => GroupsController::class.'@delete']);

    Route::post('/disciplines', ['uses' => DisciplinesController::class.'@create']);
    Route::put('/disciplines/{id}', ['uses' => DisciplinesController::class.'@update']);
    Route::delete('/disciplines/{id}', ['uses' => DisciplinesController::class.'@delete']);

    Route::post('/criteria', ['uses' => CriterionController::class.'@create']);
    Route::put('/criteria/{id}', ['uses' => CriterionController::class.'@update']);
    Route::delete('/criteria/{id}', ['uses' => CriterionController::class.'@delete']);

    Route::post('/questionnaires', ['uses' => QuestionnaireController::class.'@create']);
    Route::put('/questionnaires/{id}', ['uses' => QuestionnaireController::class.'@update']);
    Route::delete('/questionnaires/{id}', ['uses' => QuestionnaireController::class.'@delete']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::post('/login', ['uses' => AuthController::class . '@login']);
    Route::get('/auth/refresh', ['uses' => AuthController::class . '@refreshToken'])
        ->middleware(['jwt.refresh']);
    Route::post('/register', ['uses' => AuthController::class . '@register']);
    Route::post('/auth/forgot-password', ['uses' => AuthController::class . '@forgotPassword']);
    Route::post('/auth/restore-password', ['uses' => AuthController::class . '@restorePassword']);
    Route::post('/auth/token/check', ['uses' => AuthController::class . '@checkRestoreToken']);

    Route::get('/groups/{id}', ['uses' => GroupsController::class.'@get']);
    Route::get('/groups', ['uses' => GroupsController::class.'@search']);

    Route::get('/disciplines/{id}', ['uses' => DisciplinesController::class.'@get']);
    Route::get('/disciplines', ['uses' => DisciplinesController::class.'@search']);

    Route::get('/criteria/{id}', ['uses' => CriterionController::class.'@get']);
    Route::get('/criteria', ['uses' => CriterionController::class.'@search']);

    Route::get('/questionnaires/{id}', ['uses' => QuestionnaireController::class.'@get']);
    Route::get('/questionnaires', ['uses' => QuestionnaireController::class.'@search']);
});