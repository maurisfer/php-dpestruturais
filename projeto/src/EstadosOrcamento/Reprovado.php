<?php


namespace Alura\DesignPattern\EstadosOrcamento;


use Alura\DesignPattern\Orcamento;

class Reprovado extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new \DomainException("Um orçamento reprovado não pode receber desconto");
    } // Lança excessão quando tentar calcular descontoe extra para orçamento reprovado

    public function finaliza(Orcamento $orcamento)
    {
        $orcamento -> estadoAtual = new Finalizado();
    } // Permite finalizar orçamento reprovado
}