<?php

use App\Http\Controllers\api\ApiController;
use App\Models\Episode;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
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
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/series', function(){
//     // return ['suits'];
//     return Serie::all();
// });


Route::post('/login', function (Request $request) {

    $credentials = $request->only(['email', 'password']);

    /**
     * Outra forma de autenticar usuario
     */
    if (Auth::attempt($credentials) === false) {
        return response()->json('Unauthorized', 401);
    };

    $user = Auth::user();
    $user->tokens()->delete(); 
    $token = $user->createToken('token', ['series:delete']);
    

    /**
     * Uma forma de fazer autenticação
     */
    // $user = User::whereEmail($credentials['email'])->first();

    // if ($user === null || Hash::check($credentials['password'], $user->password) === false) {
    //     return response()->json('Unauthorized', 401);
    // }

    // dd($user);

    return response()->json($token->plainTextToken);
    
});

// Route::get('/series', [ApiController::class, 'index'])->name('api.index');
// Route::post('/series', [ApiController::class, 'index'])->name('api.index');