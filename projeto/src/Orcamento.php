<?php // Padrão composite - $itens[], valor()


namespace Alura\DesignPattern;

use Alura\DesignPattern\EstadosOrcamento\EmAprovacao;
use Alura\DesignPattern\EstadosOrcamento\EstadoOrcamento;

class Orcamento implements Orcavel
{
    private array $itens;
    public EstadoOrcamento $estadoAtual;

    public function __construct()
    {
        $this -> estadoAtual = new EmAprovacao();
        $this -> itens = [];
    } // Inicia a classe com estado padrão em aporvação


    public function aplicaDescontoExtra()
    {
        $this -> valor -= $this -> estadoAtual -> calculaDescontoExtra($this);
    } // Quando instanciado calcula o desconto de acordo com o estado

    public function aprova()
    {
        $this -> estadoAtual -> aprova($this);
    } // Altera o estado para aprovado

    public function reprova()
    {
        $this -> estadoAtual -> reprova($this);
    } // Altera o estado para reprovado

    public function finaliza()
    {
        $this -> estadoAtual -> finaliza($this);
    } // Altera o estado para finalizado

    public function addItens(Orcavel $item)
    {
        $this -> itens[] = $item;
    }

    public function valor(): float
    {
        return array_reduce(
            $this -> itens,
            fn (float $valorAcumulado, Orcavel $item) => $item -> valor() + $valorAcumulado,
            0);
    } // Reduz o valor do array para uma soma que depende do método valor de cada item Orçável implementado

}

// Quando se trata de composite, este orçamento também é tratado como se fosse um item, que pode ser aninhado
// em outros orçamentos para compor o valor total levando em consideração a possibilidade de se querer usar
// um orçamento antigo em uma nova cotação

