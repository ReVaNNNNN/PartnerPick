<?php

namespace Libraries\Draw\Factory;

use Libraries\Draw\Dto\DrawDtoInterface;
use Libraries\Draw\Dto\Pair;

class PairFactory implements DrawFactoryInterface
{
    /**
     * @param array $names
     * @param int $drawId
     *
     * @return DrawDtoInterface
     */
    public function create(array $names, int $drawId): DrawDtoInterface
    {
        return new Pair(
            $names,
            $drawId
        );
    }
}