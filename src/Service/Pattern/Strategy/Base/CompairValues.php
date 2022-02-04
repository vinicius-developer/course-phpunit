<?php

namespace Alura\Leilao\Service\Pattern\Strategy\Base;

use Exception;

abstract class CompairValues
{
    protected ?float $firstValue = null;
    protected ?float $secondValue = null;

    public function __construct(float $firstValue, float $secondValue)
    {
        $this->firstValue = $firstValue;
        $this->secondValue = $secondValue;
    }

    protected function validateExistNumbers(): void
    {
        if(is_null($this->firstValue) || is_null($this->secondValue)) {
            new Exception("Valores para comparações não foram definidos");
        }
    }

    public abstract function compairTwoValues(): float;
}