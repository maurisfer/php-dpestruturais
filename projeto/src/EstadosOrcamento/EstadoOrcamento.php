<?php


namespace Alura\DesignPattern\EstadosOrcamento;

use Alura\DesignPattern\Orcamento;
use DomainException;

abstract class EstadoOrcamento
{
    /**
     * @throws DomainException
     */ // Contorna problema com o princípio de Liskov, pois define no contrato a possibilidade de lnaçamento
    // de excessões

    abstract  public function calculaDescontoExtra (Orcamento $orcamento):float;

    public function aprova(Orcamento $orcamento)
    {
        throw new DomainException("Este orçamento não pode ser aprovado");
    } //Implementa a excessão para os métodos que não atendem a regra - Se aporvado não aprovad de novo

    public function reprova(Orcamento $orcamento)
    {
        throw new DomainException("Este orçamento não pode ser reprovado");
    }//Implementa a excessão para os métodos que não atendem a regra - Se reprovado não reprova de novo

    public function finaliza(Orcamento $orcamento)
    {
        throw new DomainException("Este orçamento não pode ser finalizado");
    }//Implementa a excessão para os métodos que não atendem a regra - Se finalizado não finaliza de novo
}

//Esta classe abstrata está definindo o contrato que rege as implementações
// Toda classe que extender esta deve implementar um cálculo de descoto baseado no estado
// Pode não ferir o principio de Liskov pois informa que a classe lança excessões, contornando problemas
// com o principio que diz que as implementações devem obedecer o comportamento da classe base

// Para entender melhor a motivação de uso e aplicações: https://refactoring.guru/design-patterns/state.