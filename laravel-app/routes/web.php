<?php

use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Models\Serie;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/series');
});



/**
 *  Teste de rota
 */
Route::get('/ola', function () {
    echo 'ola mundo';
});



/**
 * Definindo rotas individuais
 */
// Route::get('/series', [SeriesController::class, 'index']);
// Route::get('/series/criar', [SeriesController::class, 'create']);
// Route::post('/series/salvar', [SeriesController::class, 'store']);
// Route::get('/series/excluir', [SeriesController::class, 'excluir']);



/**
 * definindo grupo de rotas
 */
// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series', 'index');
//     Route::get('/series/criar', 'create');
//     Route::post('/series/salvar', 'store');
//     Route::get('/series/excluir', 'excluir');
// });



/**
 * Definindo grupo de rotas de outra forma
 */
Route::resource('/series', SeriesController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);


/**
 * Definido rota para exclusão de serie com metodo POST
 */
//Route::post('/series/destroy/{id_serie}', [SeriesController::class, 'destroy'])->name('series.destroy');

/**
 * Definido rota para exclusão de serie com metodo DELETE
 */
// Route::delete('/series/destroy/{id_serie}', [SeriesController::class, 'destroy'])->name('series.destroy');



/**
 * Nomeando rotas 
 */
// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/criar', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
//     Route::get('/series/excluir', 'excluir');
// });

Route::get('/series/{serie}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');


