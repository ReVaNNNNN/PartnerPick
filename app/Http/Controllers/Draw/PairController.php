<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairRequest;
use Illuminate\View\View;
use Libraries\Draw\Factory\DrawFactoryInterface;
use Libraries\Draw\Service\DrawerInterface;

class PairController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('content.pair');
    }

    /**
     * @param PairRequest $request
     * @param DrawerInterface $drawer
     * @param DrawFactoryInterface $factory
     *
     * @return View
     */
    public function draw(PairRequest $request, DrawerInterface $drawer, DrawFactoryInterface $factory): View // uzupełnić DI
    {
        $data = $request->all();
        $pairDTO = $factory->create($data);

        $drawer->completeDrawData($pairDTO);

        return view('content.pair')->with(['result', $drawer->getResult()]);
    }
}
