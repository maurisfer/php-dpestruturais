<?php


namespace Alura\DesignPattern;

use Alura\DesignPattern\AcoesAoGerarPedido\AcaoAposGerarPedido;
use DateTimeImmutable;

class GerarPedidoHandler //Padrão chamado de use cases, ou application services/ Para o ações é usado o padrão observer
{
    /***
     * @var AcaoAposGerarPedido[]
     */
    private array $acoesAposGerarPedido = []; //Traz todas as ações dos métodos implmentados pela interface

    /*public function __construct(PedidoRepository, MailService)
    {
        //Aqui seriam injetadas as dependencias para a execução, como o PedidoRepository para persisir no DB
        // Ou o MailService para criar os envios;
    }
    */

    public function adicionarAcaoAoGerarPedido(AcaoAposGerarPedido $acao)
    {
        $this -> acoesAposGerarPedido[] = $acao;
    }


    public function execute(GerarPedido $gerarPedido)
    {
        $orcamento = new Orcamento();
        $orcamento->quantidadeItens = $gerarPedido -> getNumeroItens(); // Instancia o getter de gerarPedido
        $orcamento ->valor = $gerarPedido -> getValorOrcamento(); // Instancia o getter de gerarPedido

        $pedido = new Pedido();
        $pedido -> dataFinalizaco = new DateTimeImmutable();
        $pedido -> nomeCliente = $gerarPedido -> getNomeCliente();// Instancia o getter de gerarPedido
        $pedido -> orcamento = $orcamento;

        /* Se isso não fosse fazer a implementação crescer infinitamente
        //Ações após a criação do pedido - por injeção de dependência ->
        //Pedidosrepository -> excutaria criação no banco: (Aqui só exemplificado pois não existe)
        $pedidosRepository = new CriarPedidoNoBanco();
        //MailService -> criaria o envio de e-mail: (Aqui só exemplificado pois não existe)
        $logGerarPedido = new LogGerarPedido();
        //Gerador de log
        $enviarPedidoPorEmail = new EnviarPedidoEmail();

        $pedidosRepository -> executaAcao($pedido);
        $logGerarPedido -> executaAcao($pedido);
        $enviarPedidoPorEmail -> executaAcao($pedido);
        var_dump($pedido);*/

        foreach ($this ->acoesAposGerarPedido as $acao) {
            $acao -> executaAcao($pedido);
        } // Mapea o array executando as ações das instâncias dos métodos que implementam as interfaces
    }
}

//Links uteis: https://refactoring.guru/design-patterns/command.
// https://groups.google.com/forum/?
// hl=en#!topic/dddcqrs/Yfrt4OqPUD0.

//Para pesquisar:
// DDD, Clean Architecture, Arquitetura Hexagonal,