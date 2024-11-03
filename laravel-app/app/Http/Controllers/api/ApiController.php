<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return Serie::all();
    }
}
