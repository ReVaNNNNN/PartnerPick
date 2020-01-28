<?php


namespace Libraries\Draw\Algorithm;


use App\Models\DrawResult;
use Libraries\Draw\Dto\DrawDtoInterface;

class Pair implements DrawAlgorithmInterface
{
    /**
     * @var array
     */
    private $names;

    /**
     * @return DrawResult
     */
    public function draw(): DrawResult
    {
        $names = $this->names;
        // TODO: Implement setUpData() method.
        while ($names) {
            $namesNumber = count($names);
            $drawedName = $names[rand(0, $namesNumber)];

            // przypisz do jakiegos pola
            // usun imie z tablicy
        }
    }

    /**
     * @param DrawDtoInterface $dto
     * @return DrawAlgorithmInterface
     */
    public function setUpData(DrawDtoInterface $dto): DrawAlgorithmInterface
    {
        $this->names = $dto->getNames();

        return $this;
    }
}