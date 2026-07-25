<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/leads', [LeadController::class, 'index']);
    Route::put('/leads/{lead}/status', [LeadController::class, 'updateStatus']);
    
    Route::post('/leads/{lead}/activities', [ActivityController::class, 'store']);


    Route::middleware('role:admin')->prefix('admin')->group(function () {
        
        Route::post('/leads/{lead}/assign', [AdminController::class, 'assignLead']);
        
        Route::get('/statistics', [AdminController::class, 'statistics']);
        
    });
});