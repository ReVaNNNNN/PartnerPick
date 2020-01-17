<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerAssignController extends Controller
{
    public function index()
    {
        return view('content.assign_partner');
    }
}
