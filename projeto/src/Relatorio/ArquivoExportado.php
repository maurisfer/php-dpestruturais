<?php


namespace Alura\DesignPattern\Relatorio;


interface ArquivoExportado
{
    public function salvar(ConteudoExportado $conteudoExportado): string;
}

// Abstração do tipo de arquivo que será exportado. Recebe como parâmetro a abstração que representa o conteudo exportado
// LSP - SOLID - Pois recebe objetos de classes filhas (OrcamentoExportado) que são subtipos da classe base (ConteudoExportado)