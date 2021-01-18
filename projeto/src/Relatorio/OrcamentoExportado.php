<?php //Padrão de projeto Bridge


namespace Alura\DesignPattern\Relatorio;


use Alura\DesignPattern\Orcamento;

class OrcamentoExportado implements ConteudoExportado
{

    private Orcamento $orcamento;

    public function __construct(Orcamento $orcamento)
    {
        $this->orcamento = $orcamento;
    } // Recebe o orçamento por constrtutor para poder passar os dados ao array que será serializado ou exportado de alguma forma

    public function conteudo(): array
    {
        return [
            'valor' => $this -> orcamento -> valor,
            ' quantidadeItens' => $this -> orcamento -> quantidadeItens
        ];

    }
    // Retorna em array associativo os dados que serão exportado neste conteudo, refinamento da abstração para ser exportado
    // Ainda não é a implementação da exportação efetiva
}
