<?php

namespace Libraries\Draw\Algorithm;

use App\Models\DrawResult;
use Libraries\Draw\Dto\DrawDtoInterface;

interface DrawAlgorithmInterface
{
    /**
     * @return DrawResult
     */
    public function draw(): DrawResult;

    /**
     * @param DrawDtoInterface $dto
     * @return DrawAlgorithmInterface
     */
    public function setUpData(DrawDtoInterface $dto): self;
}
