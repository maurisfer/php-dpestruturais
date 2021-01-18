<?php


namespace Alura\DesignPattern\Http;


class ReactPhpHttpAdapter implements HttpAdapter
{

    public function post(string $url, array $data = []): void
    {
        //Instancia React PHP
        //Prepara os dados
        //Faço a requisição
        echo "React PHP";
    }
}

//Esta classe impementa a abstração que será responsável por de efetuar a requisição para o serviços da API através do reactPHP
// Aqui está usando o padrão Adapter