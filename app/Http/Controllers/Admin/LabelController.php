<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LabelController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Labels', [
            'labels' => Label::withCount('albums')
                ->latest()
                ->get()
        ]);
    }
}
