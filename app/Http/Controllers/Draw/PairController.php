<?php

namespace App\Http\Controllers\Draw;

use App\Http\Controllers\Controller;
use App\Http\Requests\PairRequest;
use App\Models\Draw;
use App\Models\DrawPerson;
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
     * @throws \Exception
     */
    public function draw(PairRequest $request): View
    {
        try {
            $names = $request->get('names'); // Walidacja - muszą być co najmniej 3 imiona
            $drawId = $this->storeDraw()->getId();

            $this->storePersons($names, $drawId);
            $pairDTO = $this->factory->create($names, $drawId);

            $this->drawer->completeDrawData($pairDTO);
            $this->drawer->setUpAlgorithm($this->algorithm);
        } catch (\Exception $e) {
            Log::log(LogLevel::ERROR, $e->getMessage());
        }

        return view('content.pair')->with(['result', $this->drawer->getResult()]);
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
    private function storePersons(array  $names, int $drawId): void
    {
        foreach ($names as $name) {
            $person = new DrawPerson();
            $person->setName($name);
            $person->setDrawId($drawId);
            $person->save();
        }
    }
}
