<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return Serie::all();
    }

    public function store(SeriesFormRequest $request)
    {
        Serie::create($request->all());

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

    public function destroy(int $serie)
    {
        Serie::destroy($serie);
        return response()->noContent();
    }
}
