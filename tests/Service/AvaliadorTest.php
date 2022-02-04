<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{

    private Avaliador $leiloeiro;

    protected function setUp(): void
    {
        $this->leiloeiro = new Avaliador();
    }   

    /**
     * @dataProvider createLeilaoAleatorio
     * @dataProvider createLeilaoDecrescente
     * @dataProvider createLeilaoCrescente
     */
    public function testAvaliadorMaiorValor(Leilao $leilao)
    {
        // Act
        $this->leiloeiro->avalia($leilao);

        $maiorValor = $this->leiloeiro->maiorValor();

        // Assert
        $this->assertEquals($maiorValor, 2800);
    }

    /**
     * @dataProvider createLeilaoAleatorio
     * @dataProvider createLeilaoDecrescente
     * @dataProvider createLeilaoCrescente
     */
    public function testAvaliadorMenorValor(Leilao $leilao)
    {
        // Act
        $this->leiloeiro->avalia($leilao);

        $maiorValor = $this->leiloeiro->menorValor();

        // Assert
        $this->assertEquals($maiorValor, 20);
    }

    /**
     * @dataProvider createLeilaoAleatorio
     * @dataProvider createLeilaoDecrescente
     * @dataProvider createLeilaoCrescente
     */
    public function testMaioresValoresDoLeilao(Leilao $leilao)
    {
        // Act
        $this->leiloeiro->avalia($leilao);

        $maiorValor = $this->leiloeiro->meioresValores();

        // Assert
        $this->assertEquals($maiorValor, [2800, 2500, 2000]);
    }

    public function createLeilaoDecrescente()
    {
        // Arrange
        $leilao = new Leilao('Fiat');

        $maria = new Usuario('Maria');
 
        $joao = new Usuario('João');
 
        $sergio = new Usuario('Sergio');

        $augusto = new Usuario('Augusto');

        $henrique = new Usuario('Henrique');
 
         $leilao->recebeLance(new Lance($joao, 2800));
         $leilao->recebeLance(new Lance($maria, 2500));
         $leilao->recebeLance(new Lance($joao, 2000));
         $leilao->recebeLance(new Lance($henrique, 1500));
         $leilao->recebeLance(new Lance($augusto, 1000));
         $leilao->recebeLance(new Lance($sergio, 20));
 
         return [
             [$leilao]
         ];
    }

    public function createLeilaoCrescente()
    {
        // Arrange
        $leilao = new Leilao('Fiat');

        $maria = new Usuario('Maria');

        $joao = new Usuario('João');

        $sergio = new Usuario('Sergio');

        $augusto = new Usuario('Augusto');

        $henrique = new Usuario('Henrique');

        $leilao->recebeLance(new Lance($sergio, 20));
        $leilao->recebeLance(new Lance($augusto, 1000));
        $leilao->recebeLance(new Lance($henrique, 1500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2800));

        return [
            [$leilao]
        ];
    }

    public function createLeilaoAleatorio()
    {
        // Arrange
        $leilao = new Leilao('Fiat');

        $maria = new Usuario('Maria');

        $joao = new Usuario('João');

        $sergio = new Usuario('Sergio');

        $augusto = new Usuario('Augusto');

        $henrique = new Usuario('Henrique');

        $leilao->recebeLance(new Lance($joao, 2800));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($henrique, 1500));
        $leilao->recebeLance(new Lance($augusto, 1000));
        $leilao->recebeLance(new Lance($sergio, 20));

        return [
            [$leilao]
        ];
    }
}
