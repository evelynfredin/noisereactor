<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AlbumService;
use Inertia\Inertia;

class AdminAlbumController extends Controller
{
    public function __construct(
        private AlbumService $albums
    ) {
    }

    /**
     * Handle the incoming request
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Admin/AlbumList', [
            'albums' => $this->albums->getAlbumList()
        ]);
    }
}
