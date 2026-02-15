<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class InfosController extends Controller
{
    public function index()
    {
        $pages = Page::where('category', 'infos-pratiques')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('home.infos.index', compact('pages'));
    }
}
