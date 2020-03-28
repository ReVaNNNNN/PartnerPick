<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairRequest;
use App\Models\Draw;
use App\Models\DrawPerson;
use App\Models\DrawResult;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Libraries\Draw\Algorithm\DrawAlgorithmInterface;
use Libraries\Draw\Factory\DrawFactoryInterface;
use Libraries\Draw\Service\DrawerInterface;
use Psr\Log\LogLevel;

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
     * @var DrawResult
     */
    protected $result;

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
     * @throws \Exception
     */
    public function draw(PairRequest $request)
    {
        try {
            $names = $request->get('names');
            $drawId = $this->storeDraw()->getId();

            $this->storePersons($names, $drawId);
            $pairDTO = $this->factory->create($names, $drawId);

            $this->drawer->completeDrawData($pairDTO);
            $this->drawer->setUpAlgorithm($this->algorithm);
        } catch (\Exception $e) {
            Log::log(LogLevel::ERROR, $e->getMessage());

            return response()->exception;
        }

        return response()->json($this->drawer->getResult()->getId());
    }

    /**
     * @return View
     */
    public function result(Request $request): View
    {
        $drawResultId =  $request->get('id');
        $drawResult = DrawResult::find($drawResultId);
        // dd(json_decode($drawResult->getResult()));
        return view('content.pair_result')->with('results', json_decode($drawResult->getResult(), true));
    }

    /**
     * @return Draw
     * @throws \Exception
     */
    private function storeDraw(): Draw
    {
        $draw = new Draw();
        $draw->setType(Draw::TYPE_PAIR);
        $draw->save();

        return $draw;
    }

    /**
     * @param array $names
     * @param int $drawId
     */
    private function storePersons(array $names, int $drawId): void
    {
        foreach ($names as $name) {
            $person = new DrawPerson();
            $person->setName($name);
            $person->setDrawId($drawId);
            $person->save();
        }
    }

    /**
     * @param array $names
     * @return array
     */
    // private function filterNames(array $names): array
    // {
    //     foreach ($names as &$name) {
    //         substr_replace($name ,"",-1);
    //     }
    //     return $names;
    // }
}
