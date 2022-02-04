<?php

namespace Alura\Leilao\Service\DataStructures;

use Alura\Leilao\Model\Lance;
use Exception;

class HigestValuesOfLeilao
{

    private array $treeHigestValues = [];

    /**
     * @param Lance[] $lances
     */
    public function add(array $lances): void
    {
        usort($lances, function(Lance $lance1, Lance $lance2) {
            return $lance2->getValor() - $lance1->getValor();
        }); 

        $this->setTreeHigestValues($lances);
    }

    /**
     * @param Lance[] $lances
     */
    public function setTreeHigestValues(array $lances): void
    {
        for($i = 0; $i <= 2; $i++ ) {
            if(isset($lances[$i])) {
                $this->treeHigestValues[] = $lances[$i]->getValor();
            }
        }
    }

    public function getTreeHigestValues()
    {
        if(count($this->treeHigestValues) < 3) {
            New Exception("leilão não tem mais três valores");
        }

        return $this->treeHigestValues;
    }

}