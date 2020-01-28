<?php


namespace Libraries\Draw\Dto;

class Pair implements DrawDtoInterface
{
    /**
     * @var array
     */
    private $names;

    public function __construct(array $names)
    {
        $this->names = $names;
    }

    /**
     * @return array
     */
    public function getNames(): array
    {
        return $this->names;
    }
}