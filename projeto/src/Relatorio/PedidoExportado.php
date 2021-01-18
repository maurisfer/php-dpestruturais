<?php //Padrão de projeto Bridge


namespace Alura\DesignPattern\Relatorio;


use Alura\DesignPattern\Pedido;

class PedidoExportado implements ConteudoExportado
{

    private Pedido $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function conteudo(): array
    {
        return [
            'data_finalizacao' => $this ->pedido ->dataFinalizaco,
            'nome_cliente' => $this ->pedido -> nomeCliente
        ];
    }
    // Retorna em array associativo os dados que serão exportado neste conteudo, refinamento da abstração para ser exportado
    // Ainda não é a implementação da exportação efetiva
}


