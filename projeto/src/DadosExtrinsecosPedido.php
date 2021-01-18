<?php // Padrão Flyweight


namespace Alura\DesignPattern;


class DadosExtrinsecosPedido
{
    private string $nomeCliente;
    private \DateTimeInterface $dataFinalizacao;

    public function __construct(string $nomeCliente, \DateTimeInterface $dataFinalizaco)
    {
        $this->nomeCliente = $nomeCliente;
        $this->dataFinalizacao = $dataFinalizaco;
    }

    public function nomeCliente(): string
    {
        return $this -> nomeCliente;
    }

    public function dataFinal(): \DateTimeInterface
    {
        return $this -> dataFinalizacao;
    }
}

// Padrão extrai caracteristicas extrinseca a objeto princiapl para economizar memória