<?php

namespace Libraries\Draw\Service;

use App\Models\DrawResult;
use Libraries\Draw\Algorithm\DrawAlgorithmInterface;
use Libraries\Draw\Dto\DrawDtoInterface;

class Drawer implements DrawerInterface
{
    /**
     * @var DrawDtoInterface
     *
     * @return void
     */
    private $data;
    /**
     * @var DrawAlgorithmInterface
     */
    private $algorithm;

    /**
     * @param DrawDtoInterface $drawDto
     */
    public function completeDrawData(DrawDtoInterface $drawDto): void
    {
        $this->data = $drawDto;
    }

    /**
     * @param DrawAlgorithmInterface $algorithm
     */
    public function setUpAlgorithm(DrawAlgorithmInterface $algorithm): void
    {
        $this->algorithm = $algorithm;
    }

    /**
     * @return DrawResult
     */
    public function getResult(): DrawResult
    {
        return $this->algorithm->setUpData($this->data)->draw();
    }
}
