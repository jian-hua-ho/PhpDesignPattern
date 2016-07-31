<?php

namespace Src\State\Machines;

use Src\State\States\State;
use Src\State\States\SoldOutState;
use Src\State\States\NoQuarterState;
use Src\State\States\HasQuarterState;
use Src\State\States\SoldState;

class GumballMachine
{
    private $soldOutState;
    private $noQuarterState;
    private $hasQuarterState;
    private $soldState;

    private $currentState;
    private $count = 0;

    public function __construct($gumballNumber)
    {
        $this->soldOutState = new SoldOutState($this);
        $this->noQuarterState = new NoQuarterState($this);
        $this->hasQuarterState = new HasQuarterState($this);
        $this->soldstate = new SoldState($this);
        $this->count = $gumballNumber;

        $this->currentState = $this->soldOutState;
        if ($this->count > 0) {
            $this->currentState = $this->noQuarterState;
        }
    }

    public function insertQuarter()
    {
        $this->currentState->insertQuarter();
    }

    public function ejectQuarter()
    {
        $this->currentState->ejectQuarter();
    }

    public function turnCrank()
    {
        $this->currentState->turnCrank();
    }

    public function dispense()
    {
        $this->currentState->dispense();
    }

    public function setState(State $state)
    {
        $this->currentState = $state;
    }

    public function releaseBall()
    {
        echo "A gunball comes rolling out the solt...\n";
        if ($this->count > 0) {
            $this->count = $this->count - 1;
        }
    }

    public function getSoldOutState()
    {
        return $this->soldOutState;
    }

    public function getNoQuarterState()
    {
        return $this->noQuarterState;
    }

    public function getHasQuarterState()
    {
        return $this->hasQuarterState;
    }

    public function getSoldState()
    {
        return $this->soldState;
    }
}