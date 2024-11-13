<?php

use App\Http\Controllers\api\ApiController;
use App\Models\Episode;
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

Route::get('/series/{series}/seasons', function(Serie $series){
    return $series->seasons;
}); 


Route::get('/series/{series}/episodes', function(Serie $series){
    return $series->episodes;
}); 

Route::patch('/episodes/{episode}', function(Episode $episode, Request $request){
    $episode->watched = $request->watched;
    $episode->save();
    return $episode;
}); 

// Route::get('/series', [ApiController::class, 'index'])->name('api.index');
// Route::post('/series', [ApiController::class, 'index'])->name('api.index');