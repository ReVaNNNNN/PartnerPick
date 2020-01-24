<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairRequest;
use Libraries\Draw\Service\Drawer;

class PairController extends Controller
{
    public function index()
    {
        return view('content.pair');
    }

    public function draw(PairRequest $request)
    {
        $data = $request->all();

        $pairFactory = new PairDrawDTO($data);
        $pairDrawDTO = $pairFactory->create();

        // to wszysztko zahermetyzowac do jakieś klasy która przyjmie typ algorytmu i dane i na tej podstawie zwróci wynik
        $drawer = new Drawer($pairDrawDTO); // Fabryka to tworzenia drawera ? z requesta pobieraniu typu losowania
        // i na tej podstawie zapisywanie własciwego algorytmu w obiekcie



        return $drawer->getResult();
    }
}
