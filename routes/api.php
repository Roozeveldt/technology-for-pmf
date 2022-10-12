<?php

use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\FormatsController;
use App\Http\Controllers\Admin\LinesController;
use App\Http\Controllers\Admin\PackageKindsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('lines', LinesController::class);
    Route::apiResource('brands', BrandsController::class);
    Route::apiResource('formats', FormatsController::class);
    Route::apiResource('packages', PackageKindsController::class);
    Route::apiResource('employees', EmployeesController::class);
});
