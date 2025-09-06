<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DocumentTypeController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

Route::prefix('v1')->group(function () {
    Route::post('login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [UserController::class, 'logout']);
        Route::apiResource('customers', CustomerController::class);
        Route::apiResource('employees', EmployeeController::class);
        Route::apiResource('brands', BrandController::class);
        Route::get('countries', [CountryController::class, 'getAll']);
        Route::get('genders', [GenderController::class, 'getAll']);
        Route::get('document-types', [DocumentTypeController::class, 'getAll']);
    });
});
