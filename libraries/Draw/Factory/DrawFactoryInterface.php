<?php

namespace Libraries\Draw\Factory;

use Libraries\Draw\Dto\DrawDtoInterface;

interface DrawFactoryInterface
{
    /**
     * @param array $data
     * @param int $drawId
     *
     * @return DrawDtoInterface
     */
    public function create(array $data, int $drawId): DrawDtoInterface;
}