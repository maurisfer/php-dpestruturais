<?php // Padrão decorator

namespace Alura\DesignPattern\Impostos;


use Alura\DesignPattern\Orcamento;

abstract class Imposto
{

    private ?Imposto $outroImposto; // ? Indica que pode ser nulo

    public function __construct(Imposto $outroImposto = null) // =null indica que não é obrigatório
    {
        $this->outroImposto = $outroImposto;
    } // Define que qualquer classe filha possa receber em seu construtor um novo imposto

    abstract protected function realizaCalculoEspecifico(Orcamento $orcamento): float;
    // Unica classe que será obrigatória em classes filhas, retorna o valor específico do imposto calculado

    public function calculaImposto(Orcamento $orcamento):float
    {
        return $this ->realizaCalculoEspecifico($orcamento) + $this -> realizaCalculoOutroImposto($orcamento);
    } // Realiza a somatória dos retornos dos calculos tanto do imposto principal quanto de seu encadeamentos

    private function realizaCalculoOutroImposto(Orcamento $orcamento)
    {
        return $this -> outroImposto === null ? 0 : $this -> outroImposto -> calculaImposto($orcamento);
    } // Gera recursividade para o calculo dos impostos aninhados, realizando o cálculo do segundo imposto e somando
    //com os outros impostos calculados de forma recursiva
}