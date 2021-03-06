<?php

namespace Src\Command\Commands;

use Src\Command\Receivers\ReceiverInterface;

class LightOffCommand implements CommandInterface
{
    private $light;

    public function __construct(ReceiverInterface $light)
    {
        $this->light = $light;
    }

    public function execute()
    {
        return $this->light->off();
    }

    public function undo()
    {
        return $this->light->on();
    }
}