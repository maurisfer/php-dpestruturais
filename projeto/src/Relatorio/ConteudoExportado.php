<?php//Padrão de projeto Bridge

namespace Alura\DesignPattern\Relatorio;

interface ConteudoExportado
{
    public function conteudo():array;
}

// Abstração que define um conteudo a ser expoprtado. Usada para refinamento em classes que a implemnetam

