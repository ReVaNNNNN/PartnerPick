<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrawListController extends Controller
{
    public function index()
    {
        return view('content.draw_from_list');
    }
}
