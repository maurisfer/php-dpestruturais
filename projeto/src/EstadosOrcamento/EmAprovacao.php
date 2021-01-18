<?php


namespace Alura\DesignPattern\EstadosOrcamento;


use Alura\DesignPattern\Orcamento;

class EmAprovacao extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento -> valor * 0.05;
    } // Calcula o desconto de 5% se estado = a EmAprovacao();

    public function aprova(Orcamento $orcamento)
    {
        $orcamento -> estadoAtual = new Aprovado();
    } // Permite aprovar orçamento

    public function reprova(Orcamento $orcamento)
    {
        $orcamento -> estadoAtual = new Reprovado();
    } // Permite reprovar o orçamento
}