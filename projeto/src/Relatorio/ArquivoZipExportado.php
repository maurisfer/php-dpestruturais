<?php // Padrão de projeto - Bridge


namespace Alura\DesignPattern\Relatorio;


class ArquivoZipExportado implements ArquivoExportado
{
    private string $nomeArquivoInterno;

    public function __construct(string $nomeArquivoInterno)
    {
        $this->nomeArquivoInterno = $nomeArquivoInterno;
    } // Recebe o nome do arquivo que estará contido dentro do zip

    public function salvar(ConteudoExportado $conteudoExportado): string
    {
        $caminhoArquivo = tempnam(sys_get_temp_dir(), "zip"); // Gera o nome e ocaminho do arquivo zip
        $arquivoZip = new \ZipArchive(); // Instancia novo objeto zip
        $arquivoZip -> open($caminhoArquivo); // Abre um arquivo caso não exista com nome próprio
        $arquivoZip ->addFromString($this->nomeArquivoInterno, serialize($conteudoExportado ->conteudo()));
        // Adiciona ao arquivo interno do zip o conteudo exportado
        $arquivoZip ->close(); // Fecha o arquivo

        return $caminhoArquivo; // Retorna o caminho do arquivo zip temporário com conteudo serializado;
    }
}

