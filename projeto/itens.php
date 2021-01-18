<?php

use Alura\DesignPattern\CacheOrcamentoProxy;
use Alura\DesignPattern\ItemOrcamento;
use Alura\DesignPattern\Orcamento;

require "vendor/autoload.php";

$orcamento = new Orcamento();

$item1 = new ItemOrcamento();
$item1 -> valor = 300;

$item2 = new ItemOrcamento();
$item2 -> valor = 500;

$orcamento -> addItens($item1);
$orcamento -> addItens($item2);

$orcamentoAntigo = new Orcamento();
$item3 = new ItemOrcamento();
$item3 -> valor = 150;
$orcamentoAntigo -> addItens($item3);

$orcamentoMaisAntigo = new Orcamento();
$item4 = new ItemOrcamento();
$item4 -> valor = 50;
$item5 = new ItemOrcamento();
$item5 -> valor = 100;

$orcamentoMaisAntigo -> addItens($item4);
$orcamentoMaisAntigo -> addItens($item5);
$orcamentoAntigo -> addItens($orcamentoMaisAntigo);

$orcamento -> addItens($orcamentoAntigo);

$proxyCache = new CacheOrcamentoProxy($orcamento); // Instancia o cache

// $proxyCache -> addItens($item4); Lançaria uma excessão poir não é possível atualizar valor de consulta cacheada

echo $proxyCache -> valor().PHP_EOL;
echo $proxyCache -> valor(). PHP_EOL;
// Neste exemplo como são 5 itens e foi setado um delay de 1 segundo por item, a informação e sua chamadas posteriores
// Devem levar somente 5 segundos, pela existência do cache que guardou a consulta efetuada pela instãncia anterior;
// Se existirem 100 chamadas, todas elas levarão 5 segundos para retornar





