<?php //Padrão de projeto Bridge

require  "vendor/autoload.php";

use Alura\DesignPattern\{Orcamento, Pedido};
use Alura\DesignPattern\Relatorio\{OrcamentoExportado, PedidoExportado};
use Alura\DesignPattern\Relatorio\{ArquivoXmlExportado, ArquivoZipExportado};

// Cria o conteudo que será exportado
$orcamento = new Orcamento();
$orcamento -> valor = 500;
$orcamento -> quantidadeItens = 7;

// Trata os dados do conteudo através do refinamento da abstração
$orcamentoExportado = new OrcamentoExportado($orcamento);

// Instancia o tipo de objeto que será exportado
$orcamentoExportadoXml = new ArquivoXmlExportado('orcamento');

echo $orcamentoExportadoXml ->salvar($orcamentoExportado); // Passa o conteudo tratado para o método que gerará a exportação
