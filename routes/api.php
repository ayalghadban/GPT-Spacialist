<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SpecialistController;

Route::get('/specialists', [SpecialistController::class, 'index']);
Route::post('/specialists', [SpecialistController::class, 'store']);
