<?php


namespace Alura\DesignPattern;


use Alura\DesignPattern\EstadosOrcamento\Finalizado;
use Alura\DesignPattern\Http\HttpAdapter;
use DomainException;

class RegsitroOrcamento
{

    private HttpAdapter $http;

    public function __construct(HttpAdapter $http)
    {
        $this->http = $http;
    } // Injeção de dependência pelo constrtutor da abstração do serviço da API

    public function registrar(Orcamento $orcamento)
    {
        if(!$orcamento->estadoAtual instanceof Finalizado){
            throw new DomainException("Apenas orçamentos finalizados podem ser registrdos na API ");
        }

        $this -> http ->post("http://api.registrar.orcamento", [
            'valor' => $orcamento -> valor,
            'qauntidadeItens' => $orcamento -> quantidadeItens
        ]);
        // Através do constrtutor recebe qualquer meio de requisição e efetuar o registro dos dados, ficando responsável
        // somente pelo registro e não pelo serviço da API (SRP), que recebrá pela injeção de dependência
    }
}

// Aqui está sendo usado o padrão adapter
// Respeita o SRP - SOLID