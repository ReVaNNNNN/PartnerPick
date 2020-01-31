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
        $resultCollection = $this->makeDrawing();
        $result = $this->storeResult($resultCollection);

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

    /**
     * @return Collection
     */
    private function makeDrawing(): Collection
    {
        $names = $this->names;
        $resultCollection = new Collection();
        shuffle($names);

        while ($names) {
            $drawedName = array_pop($names);
            $resultCollection->add($drawedName);
        }

        return $resultCollection;
    }

    /**
     * @param Collection $resultCollection
     * @return DrawResult
     */
    private function storeResult(Collection $resultCollection): DrawResult
    {
        $result = new DrawResult();
        $result->result = $this->formatResult($resultCollection);
        $result->draw_id = $this->draw_id;
        $result->save();

        return $result;
    }

    private function formatResult(Collection $resultCollection): Collection
    {
        //@todo zformatowanie wyniku w taki sposób aby dane były uporządkowane w tablicy
        // według par osoba1: osoba3, osoba2:osoba1, osoba3:osoba2 itp

        return $resultCollection;
    }
}
