<?php

namespace Libraries\Draw\Service;

use Libraries\Draw\Dto\DrawDtoInterface;

class Drawer implements DrawerInterface
{
    /**
     * @var DrawDtoInterface
     *
     * @return void
     */
    private $data;

    public function completeDrawData(DrawDtoInterface $drawDto): void
    {
        $this->data = $drawDto;
    }

    private function notNamedYet()
    {
        $this->algorithm = new PairDrawAlgorithm($this->data);

        $result = $this->algorithm()->draw();
    }
}
