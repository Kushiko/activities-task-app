<?php

use App\Http\Controllers\Api\V1\ActivityController;
use App\Http\Controllers\Api\V1\ActivityTypeController;
use App\Http\Controllers\Api\V1\ParticipantController;
use Illuminate\Support\Facades\Route;

Route::apiResource('activities', ActivityController::class)->only(['index', 'show']);
Route::apiResource('participants', ParticipantController::class)->only(['index', 'show']);
Route::apiResource('activity-types', ActivityTypeController::class)->only(['index', 'show']);
