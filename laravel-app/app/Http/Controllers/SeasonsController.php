<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Serie $serie)
    {
        $aSeasons = $serie->seasons()->with('episodes')->get();
        // dd($aSeasons);

        return view('seasons.index')->with('aSeasons', $aSeasons)->with('serie', $serie);
    }
}
