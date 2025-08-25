<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'activities']);
Route::get('/participants', [FrontendController::class, 'participants']);
Route::get('/activity-types', [FrontendController::class, 'activityTypes']);
