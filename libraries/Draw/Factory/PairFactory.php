<?php

namespace Libraries\Draw\Factory;

use Libraries\Draw\Dto\DrawDtoInterface;
use Libraries\Draw\Dto\Pair;

class PairFactory implements DrawFactoryInterface
{
    /**
     * @param array $data
     * @return DrawDtoInterface
     */
    public function create(array $names): DrawDtoInterface
    {
        return new Pair(
            $names
        );
    }
}