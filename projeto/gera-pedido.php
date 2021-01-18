<?php

use Alura\DesignPattern\{AcoesAoGerarPedido\CriarPedidoNoBanco,
    AcoesAoGerarPedido\EnviarPedidoEmail,
    AcoesAoGerarPedido\LogGerarPedido,
    GerarPedido,
    GerarPedidoHandler,
    Orcamento,
    Pedido};

require "vendor/autoload.php";

$valorOrcamento = $argv[1];
$numeroItens = $argv[2];
$nomeCliente = $argv[3];

$geraPedido = new GerarPedido($valorOrcamento, $numeroItens, $nomeCliente); //Cria o command com os dados
$geraPedidoHandler = new GerarPedidoHandler(/*Passaria as dependencias*/);
$geraPedidoHandler -> adicionarAcaoAoGerarPedido(new CriarPedidoNoBanco());
$geraPedidoHandler -> adicionarAcaoAoGerarPedido(new LogGerarPedido());
$geraPedidoHandler ->adicionarAcaoAoGerarPedido(new EnviarPedidoEmail());
$geraPedidoHandler->execute($geraPedido); // Injeta os dados do command no constrtutor do Handler Para executar
// a ação necessária
