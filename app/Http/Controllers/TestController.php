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
        // $personOne = new DrawPerson();
        // $personOne->name = 'Kamil';
        // $personOne->save();
        //
        // $personTwo = new DrawPerson();
        // $personTwo->name = 'Jakub';
        // $personTwo->save();
        //
        // $draw = new Draw();
        // $draw->name = 'pair';
        // $draw->save();
        //
        // $drawCon = new DrawPersonDraw();
        // $drawCon->draw_person_id = $personOne->getId();
        // $drawCon->draw_id = $draw->getId();
        // $drawCon->save();
        //
        // $drawCon = new DrawPersonDraw();
        // $drawCon->draw_person_id = $personTwo->getId();
        // $drawCon->draw_id = $draw->getId();
        // $drawCon->save();


        // $drawCon = DrawPersonDraw::find(4);
        // dd($drawCon->person()->first()->getId());
        $person = DrawPerson::find(1);

        var_dump($person->draw);
    }
}
