<?php


namespace Alura\DesignPattern\Impostos;


use Alura\DesignPattern\Orcamento;

class Icpp extends ImpostoComDuasAliquotas
{
    //As verificações são efetuadas através da regra na classe base ImpostoComDuasAliquotas
    protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento-> valor > 500;
        // Aqui aplica-se a regra específica que satisfaz o método abstrato
    }

    protected function calculaTaxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento -> valor * 0.03;
        // Aqui aplica-se a regra específica que satisfaz o método abstrato se a primeira for true
    }

    protected function calculaTaxaMinima(Orcamento $orcamento): float
    {
        return $orcamento -> valor * 0.02;
        //Aqui aplica-se a regra específica que satisfaz o método abstrato se aprimeira for false
    }
}