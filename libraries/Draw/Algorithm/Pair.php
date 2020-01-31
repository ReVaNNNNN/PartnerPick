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
        //@todo Refaktor

        $newCollection = new Collection();
        $size = $resultCollection->count();

        for ($i = 0; $i < $size; $i++) {
            if (($size - 1) === $i) {
                $newCollection->add(
                    [$resultCollection[$i] => $resultCollection[0]]

                );
            } else {
                $newCollection->add(
                    [$resultCollection[$i] => $resultCollection[$i +1]]

                );
            }
        }


        return $newCollection;
    }
}
