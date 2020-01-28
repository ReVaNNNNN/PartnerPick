<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairRequest;
use Illuminate\View\View;
use Libraries\Draw\Algorithm\DrawAlgorithmInterface;
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
     * @var DrawAlgorithmInterface
     */
    protected $algorithm;

    /**
     * PairController constructor.
     *
     * @param DrawerInterface $drawer
     * @param DrawFactoryInterface $factory
     * @param DrawAlgorithmInterface $algorithm
     */
    public function __construct(DrawerInterface $drawer, DrawFactoryInterface $factory, DrawAlgorithmInterface $algorithm)
    {
        $this->drawer = $drawer;
        $this->factory = $factory;
        $this->algorithm = $algorithm;
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
        dd($names = $request->all());
        $pairDTO = $this->factory->create($names);

        $this->drawer->completeDrawData($pairDTO);
        $this->drawer->setUpAlgorithm($this->algorithm);

        return view('content.pair')->with(['result', $this->drawer->getResult()]);
    }

    public function result()
    {

    }
}
