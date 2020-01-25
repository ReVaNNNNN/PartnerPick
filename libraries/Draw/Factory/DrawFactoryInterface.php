<?php

namespace Libraries\Draw\Factory;

use Libraries\Draw\Dto\DrawDtoInterface;

interface DrawFactoryInterface
{
    /**
     * @param array $data
     * @return DrawDtoInterface
     */
    public function create(array $data): DrawDtoInterface;
}