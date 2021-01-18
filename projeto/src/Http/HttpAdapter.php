<?php


namespace Alura\DesignPattern\Http;


interface HttpAdapter
{
    public function post(string $url, array $data = []): void;
}

//Padrão adapter - Interface que abstrai o método que irá ser responsável pelo serviço da API no registro de orçamento