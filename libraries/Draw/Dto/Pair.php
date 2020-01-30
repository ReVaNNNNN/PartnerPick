<?php


namespace Libraries\Draw\Dto;

class Pair implements DrawDtoInterface
{
    /**
     * @var array
     */
    private $names;
    /**
     * @var int
     */
    private $drawId;

    public function __construct(array $names, int $drawId)
    {
        $this->names = $names;
        $this->drawId = $drawId;
    }

    /**
     * @return array
     */
    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * @return int
     */
    public function getDrawId(): int
    {
        return $this->drawId;
    }
}