<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UnitController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
        }); 
        
    Route::post('/leads', [LeadController::class, 'store']); 
    Route::get('/leads', [LeadController::class, 'index']); 
    Route::get('/leads/{lead}', [LeadController::class, 'show']);
    Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus']); 
    Route::post('/leads/{lead}/activities', [ActivityController::class, 'store']); 

    Route::get('/units', [UnitController::class, 'index']);

    Route::get('/dashboard/stats', [DashboardController::class, 'stats']);

    Route::middleware('role:admin')->prefix('admin')->group(function () {

        Route::get('users', [AdminController::class, 'index']); 

        Route::patch('/leads/{lead}/assign', [AdminController::class, 'assignLead']); 

        
    });
});