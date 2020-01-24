<?php

namespace Libraries\Draw\Service;

use Libraries\Draw\Dto\DrawDtoInterface;

class Drawer
{
    public function __construct(DrawDtoInterface $data)
    {

    }

    private function notNamedYet()
    {
        $this->algorithm = new PairDrawAlgorithm($this->getData());

        $result = $this->algorithm()->draw();
    }
}
