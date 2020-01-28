<?php

namespace Libraries\Draw\Service;

use App\Models\DrawResult;
use Libraries\Draw\Algorithm\DrawAlgorithmInterface;
use Libraries\Draw\Dto\DrawDtoInterface;

interface DrawerInterface
{
    /**
     * @param DrawDtoInterface $drawDto
     * @return void
     */
    public function completeDrawData(DrawDtoInterface $drawDto): void;

    /**
     * @param DrawAlgorithmInterface $algorithm
     * @return void
     */
    public function setUpAlgorithm(DrawAlgorithmInterface $algorithm): void;

    /**
     * @return DrawResult
     */
    public function getResult(): DrawResult;

}
