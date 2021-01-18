<?php // Padrão - Facade


namespace Alura\DesignPattern;

use Alura\DesignPattern\Descontos\SemDesconto;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\Descontos\DescontoMaisDe500Reais;
use Alura\DesignPattern\Descontos\DescontoMaisDeCincoItens;

class CalculadoraDeDescontos
{
    public function calculaDescontos(Orcamento $orcamento):float
    {
        $cadeiaDeDescontos  = new DescontoMaisDeCincoItens(
            new DescontoMaisDe500Reais(
                new SemDesconto()
            )
        ); // Encadeia os descontos

        $descontoCalculado = $cadeiaDeDescontos -> calculaDesconto($orcamento); // Calcula os descontos

        $logDesconto = new LogDesconto();
        $logDesconto -> informar($descontoCalculado); //Envia o descontos calculados para um log

        return $descontoCalculado; // Retorna o valor do desconto

    }
}

// Esta classe fornece uma interface simples através de um unico método para uma gama de funcionalidade maiores
// Como o encademaneto de descontos ou o registro desses descontos em log, disponbilização dos dados para uma API externa
