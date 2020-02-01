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
        $namesCollection = $this->makeDrawing();
        $result = $this->storeResult($namesCollection);

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
        $namesCollection = new Collection();
        shuffle($names);

        while ($names) {
            $drawedName = array_pop($names);
            $namesCollection->add($drawedName);
        }

        return $namesCollection;
    }

    /**
     * @param Collection $namesCollection
     * @return DrawResult
     */
    private function storeResult(Collection $namesCollection): DrawResult
    {
        $result = new DrawResult();
        $result->result = $this->formatResult($namesCollection);
        $result->draw_id = $this->draw_id;
        $result->save();

        return $result;
    }

    /**
     * @param Collection $namesCollection
     * @return Collection
     */
    private function formatResult(Collection $namesCollection): Collection
    {
        $resultCollection = new Collection();

        foreach ($namesCollection as $key => $name) {
            if ($namesCollection->last() !== $name) {
                $this->assignPerson($resultCollection, $namesCollection, $key);
            } else {
                $this->assignLastPerson($resultCollection, $namesCollection);
            }
        }


        return $resultCollection;
    }

    /**
     * @param Collection $resultCollection
     * @param Collection $namesCollection
     * @param int $key
     * @return void
     */
    private function assignPerson(Collection &$resultCollection, Collection $namesCollection, int $key): void
    {
        $resultCollection->add(
            [
                $namesCollection[$key] => $namesCollection[$key + 1]
            ]
        );
    }

    /**
     * @param Collection $resultCollection
     * @param Collection $namesCollection
     * @return void
     */
    private function assignLastPerson(Collection &$resultCollection, Collection $namesCollection): void
    {
        $resultCollection->add(
            [
                $namesCollection->last() => $namesCollection->first()
            ]
        );
    }
}
