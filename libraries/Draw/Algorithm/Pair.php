<?php


namespace Libraries\Draw\Algorithm;

use App\Models\DrawResult;
use Illuminate\Database\Eloquent\Collection;
use Libraries\Draw\Dto\DrawDtoInterface;

class Pair implements DrawAlgorithmInterface
{
    /**
     * @var array
     */
    private $names;
    /**
     * @var int
     */
    private $draw_id;

    /**
     * @return DrawResult
     */
    public function draw(): DrawResult
    {
        // REFAKTOR
        $names = $this->names;
        $result = new DrawResult();
        $resultCollection = new Collection();
        shuffle($names);

        while ($names) {
            $drawedName = array_pop($names);
            $resultCollection->add($drawedName);
        }

        $result->result = $this->formatResult($resultCollection);
        $result->draw_id = $this->draw_id;
        $result->save();

        return $result;
    }

    /**
     * @param DrawDtoInterface $dto
     * @return DrawAlgorithmInterface
     */
    public function setUpData(DrawDtoInterface $dto): DrawAlgorithmInterface
    {
        $this->names = $dto->getNames();
        $this->draw_id = $dto->getDrawId();

        return $this;
    }

    private function formatResult(Collection $resultCollection): Collection
    {
        //@todo zformatowanie wyniku w taki sposób aby dane były uporządkowane w tablicy
        // według par osoba1: osoba3, osoba2:osoba1, osoba3:osoba2 itp

        return $resultCollection;
    }
}