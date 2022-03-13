<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatsService;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct(
        private StatsService $stats
    ) {
    }

    public function index()
    {
        return Inertia::render('Admin/Home', [
            'stats' => $this->stats->getAppStats()
        ]);
    }
}
