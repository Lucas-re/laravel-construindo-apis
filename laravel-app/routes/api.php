<?php

use App\Http\Controllers\api\ApiController;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/series', function(){
//     // return ['suits'];
//     return Serie::all();
// });

Route::apiResource('/series', ApiController::class);

// Route::get('/series', [ApiController::class, 'index'])->name('api.index');
// Route::post('/series', [ApiController::class, 'index'])->name('api.index');