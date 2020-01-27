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
     * @var DrawerInterface
     */
    protected $drawer;
    /**
     * @var DrawFactoryInterface
     */
    protected $factory;

    /**
     * PairController constructor.
     *
     * @param DrawerInterface $drawer
     * @param DrawFactoryInterface $factory
     */
    public function __construct(DrawerInterface $drawer, DrawFactoryInterface $factory)
    {
        $this->drawer = $drawer;
        $this->factory = $factory;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('content.pair');
    }

    /**
     * @param PairRequest $request
     *
     * @return View
     */
    public function draw(PairRequest $request): View
    {
        dd($data = $request->all());
        $pairDTO = $this->factory->create($data);

        $this->drawer->completeDrawData($pairDTO);

        return view('content.pair')->with(['result', $this->drawer->getResult()]);
    }

    public function result()
    {

    }
}
