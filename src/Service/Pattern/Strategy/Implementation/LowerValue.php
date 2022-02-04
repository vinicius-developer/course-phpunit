<?php

namespace Alura\Leilao\Service\Pattern\Strategy\Implementation;

use Alura\Leilao\Service\Pattern\Strategy\Base\CompairValues;

class LowerValue extends CompairValues
{

    public function compairTwoValues(): float
    {
        $this->validateExistNumbers();

        if($this->firstValue < $this->secondValue) {
            return $this->firstValue;
        }

        return $this->secondValue;
    }

}