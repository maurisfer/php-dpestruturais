<?php


namespace Alura\DesignPattern\EstadosOrcamento;


use Alura\DesignPattern\Orcamento;

class Aprovado extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento -> valor * 0.02;
    } // Calcula o desconto extra quando estado = aprovado

    public function finaliza(Orcamento $orcamento)
    {
        $orcamento -> estadoAtual = new Finalizado();
    } // Permite finalizar orçamento
}