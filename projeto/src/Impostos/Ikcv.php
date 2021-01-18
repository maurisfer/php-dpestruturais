<?php


namespace Alura\DesignPattern\Impostos;


use Alura\DesignPattern\Orcamento;

class Ikcv extends ImpostoComDuasAliquotas
{

    protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool
    {
        return $orcamento->valor > 300 && $orcamento->quantidadeItens > 3;
        // Aqui aplica-se a regra específica que satisfaz o método abstrato se true
    }

    protected function calculaTaxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.04;
        // Aqui aplica-se a regra específica que satisfaz o método abstrato se a primeira for true
    }

    protected function calculaTaxaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.025;
        // Aqui aplica-se a regra específica que satisfaz o método abstrato se aprimeira for false
    }
}