<?php


namespace Alura\DesignPattern;


interface Command
{
    public function execute();
}

// Essa interface é util quando usamos o Command executando os dados no mesmo local que são recebidos.
// Quando há handlers, essa Interface é desnecessária;