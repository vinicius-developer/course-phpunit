<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Service\DataStructures\HigestValuesOfLeilao;
use Alura\Leilao\Service\Pattern\Strategy\Implementation\HigestValue;
use Alura\Leilao\Service\Pattern\Strategy\Implementation\LowerValue;
use Exception;

class Avaliador
{

    private float $maiorValor = -INF;

    private float $menorValor = INF;

    private HigestValuesOfLeilao $maioresValores;

    public function __construct()
    {
        $this->maioresValores = new HigestValuesOfLeilao();
    }

    public function avalia(Leilao $leilao): void
    {
        $lances = $leilao->getLances();

        if(empty($lances)) {
            new Exception("Não houve lances nesse leilao");
        }

        $this->searchValues($lances);

        $this->searchHigestValue($lances);
    }

    public function maiorValor(): float
    {
        if($this->maiorValor === -INF) {
            new Exception("Ainda não foi possível avaliar o valor do leilão");
        }

        return $this->maiorValor;
    }

    public function menorValor(): float
    {
        if($this->menorValor === INF) {
            new Exception("Ainda não foi possível avaliar o menor valor do leilão");
        }

        return $this->menorValor;
    }

    public function meioresValores(): array
    {
        return $this->maioresValores->getTreeHigestValues();
    }

    /**
     * @param Lance[] $lances
     */
    private function searchValues(array $lances): void
    {
        foreach($lances as $lance) {

            $valor = $lance->getValor();

            $this->searchValuesHigestValue($valor);

            $this->searchValuesLowerValue($valor);
        }
    }

    /**
     * @param Lance[] $lances
     */
    private function searchHigestValue(array $lances): void
    {
        $this->maioresValores->add($lances);
    }   

    private function searchValuesHigestValue(float $value)
    {
        $this->maiorValor = (new HigestValue($value, $this->maiorValor))
                ->compairTwoValues();
    }

    private function searchValuesLowerValue(float $value)
    {
        $this->menorValor = (new LowerValue($value, $this->menorValor))
                ->compairTwoValues();
    }

}