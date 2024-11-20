<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->has('name'));

        $query = Serie::query();
        if ($request->has('nome')) {
            $query->where('nome', $request->nome);
        }   
        return $query->paginate(2);


        /**
         * uma forma de validar se o nome foi passado pela url
         */
        // if(!$request->has('nome')){
        //     return Serie::all();
        // }
        // return Serie::whereNome($request->nome)->get();
    }

    public function store(SeriesFormRequest $request)
    {
        // Serie::create($request->all());

        return response()
            ->json(Serie::create($request->all()), 201);
    }

    public function show(int $serie)
    {
        $serieModel = Serie::with('seasons.episodes')->find($serie);

        if($serieModel == null){
            return response()->json(['message' => 'Series not found'], 404);
        }
        
        return $serieModel;
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;
    }

    public function destroy(int $serie, Authenticatable $user)
    {
        // dd($user);
        dd($user->tokenCan('series:delete'));
        Serie::destroy($serie);
        return response()->noContent();
    }
}
