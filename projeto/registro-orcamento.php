<?php

use Alura\DesignPattern\Http\CurlHttpAdapter;
use Alura\DesignPattern\Http\ReactPhpHttpAdapter;
use Alura\DesignPattern\Orcamento;
use Alura\DesignPattern\RegsitroOrcamento;

require 'vendor/autoload.php';

$registroOrcamento = new RegsitroOrcamento(new ReactPhpHttpAdapter()); //Instância do adaptador dentro do objeto registro Orcamento
$registroOrcamento -> registrar(new Orcamento()); //Dados do orlamento sendo passados via método na classe RegistroOrcamento

// Aqui está usando o padrão Adapter