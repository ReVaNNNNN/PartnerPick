<?php

namespace App\Http\Controllers;

use App\Draw;
use App\DrawPerson;
use App\DrawPersonDraw;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
//        $draw = new Draw();
//        $draw->type = 'pair';
//        $draw->save();
//
//        $personOne = new DrawPerson();
//        $personOne->name = 'Kamil';
//        $personOne->draw_id = $draw->getId();
//        $personOne->save();
//
//        $personTwo = new DrawPerson();
//        $personTwo->name = 'Jakub';
//        $personTwo->draw_id = $draw->getId();
//        $personTwo->save();

        $draw = Draw::find(1);

        dd($draw->persons()->get());
    }
}
