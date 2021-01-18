<?php //Padrão decorator

namespace Alura\DesignPattern;


use Alura\DesignPattern\Impostos\Imposto;

class CalculadoraDeImpostos
{
    public function calcula(Orcamento $orcamento, Imposto $imposto): float
    {
        return $imposto -> calculaImposto($orcamento);
    }
} // Recebe o orçamento e seu imposto "principal" que se tiver impostos aninhados passa os dados para a classe abstrata

//Padrão permite que classes possam ter compostamentos adicionados em tempo de execução
// Evita heranças inviáveis pela combinação de diversas classes
// Aninha comportamentos similares permitindo uma flexibilidade de implementação