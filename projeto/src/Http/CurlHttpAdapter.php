<?php


namespace Alura\DesignPattern\Http;


class CurlHttpAdapter implements HttpAdapter

{

    public function post(string $url, array $data = []): void
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, $data,);
        curl_exec();
    }
}

//Esta classe impementa a abstração que será responsável por de efetuar a requisição para o serviços da API através do curl

// Aqui está usando o padrão Adapter