<?php //Padrão - Proxy de cache


namespace Alura\DesignPattern;


class CacheOrcamentoProxy extends Orcamento //Extende Orcamento pois o proxy deve imitar o comportamento do alvo
{
    private float $valorCache = 0; // Inicializa-se o valor como 0 pois ainda não há instância de valor();

    private Orcamento $orcamento; // Recebe um orçamento por construtor

    public function __construct(Orcamento $orcamento)
    {
        $this->orcamento = $orcamento;
    }

    public function addItens(Orcavel $item)
    {
        throw new \DomainException('Não é possível adicionar item a orçamento cacheado');
    } // Lança excessão porque não deve ser possível atualizar valor cacheado

    public function valor(): float
    {
        if ($this -> valorCache == 0){
            $this -> valorCache = $this -> orcamento -> valor();
        } // Verifica se aconsulta já foi feita, se não cria o cache se sim retorna o valor do orçamento

        return $this -> valorCache; // Retorna valor do orçamento
    }
}

// Esse padrão serve para guardar informações interceptadas de  métodos que podem demorar a atualizar, como por exemplo
// valores que sejam calculados e retornado por API, para que essa demora não ocorra caso a consulta tenha sido efetuada
// anteriormente, como acontece com os proxys web;