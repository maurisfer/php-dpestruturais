<?php //Padrão - Composite


namespace Alura\DesignPattern;


class ItemOrcamento implements Orcavel
{
    public float $valor;

    public function valor(): float
    {
        sleep(1);
        return $this -> valor;
    }
}

// Implementa uma interface comum com orçamentos que vai trazer o método valor(), que define o valor do item
