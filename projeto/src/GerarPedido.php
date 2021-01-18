<?php


namespace Alura\DesignPattern;

class GerarPedido //caso fosse command seria com "implments Command (Interface)"
{
    private float $valorOrcamento;
    private int $numeroItens;
    private string $nomeCliente;

    public function __construct(float $valorOrcamento, int $numeroItens, string $nomeCliente)
    {
        $this->valorOrcamento = $valorOrcamento;
        $this->numeroItens = $numeroItens;
        $this->nomeCliente = $nomeCliente;
        //Se eu precisasse de um repositório, classe externa ou service teria que ser passado no constrtutor,
        // que poluiria o código.
    }

    public function getValorOrcamento(): float
    {
        return $this->valorOrcamento;
    } // Disponibiliza os dados para o handler

    public function getNumeroItens(): int
    {
        return $this->numeroItens;
    }// Disponibiliza os dados para o handler

    public function getNomeCliente(): string
    {
        return $this->nomeCliente;
    }// Disponibiliza os dados para o handler



//Padrão de projeto - Command
// Define a forma como os dados serão trazidos para depois serem executado, independente da origem das dependencias
// de execução, pois os dados podem vir de API, CLI, Formulário que sabe como exceutar um tarefa através de uma interfacce
//comum;

// Como seria com a implementação do código abaixo:
/*
    public function execute()
    {
        $orcamento = new Orcamento();
        $orcamento->quantidadeItens = $this -> numeroItens;
        $orcamento ->valor = $this -> valorOrcamento;

        $pedido = new Pedido();
        $pedido -> dataFinalizaco = new DateTimeImmutable();
        $pedido -> nomeCliente = $this -> nomeCliente;
        $pedido -> orcamento = $orcamento;

        echo "Criada pedido no banco de dados".PHP_EOL;
        echo "Envia e-mail para o cliente".PHP_EOL;
        var_dump($pedido);
    }
*/ //Porém, foi implemenrado depois o DDD, que separa a execução do comando dos dados através de um handler
}