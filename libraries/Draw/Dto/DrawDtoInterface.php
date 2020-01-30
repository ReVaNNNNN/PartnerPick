<?php

namespace Libraries\Draw\Dto;

interface DrawDtoInterface
{
    /**
     * @return array
     */
    public function getNames(): array;

    /**
     * @return int
     */
    public function getDrawId(): int;
}
