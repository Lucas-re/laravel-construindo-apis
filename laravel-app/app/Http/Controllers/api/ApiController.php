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
        dd($request->all());
        Serie::create($request->all());

        return response()
            ->json(Serie::create($request->all()), 201);
    }

    public function show(int $serie)
    {
        $serie = Serie::whereId($serie)->with('seasons.episodes')->first();
        return $serie;
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
