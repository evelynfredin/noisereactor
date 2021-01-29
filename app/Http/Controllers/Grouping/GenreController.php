<?php

namespace App\Http\Controllers\Grouping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return view('grouping.genres');
    }
}
