<?php

namespace Attiva\SisObraXML\Factory;

class InformacoesAdicionais
{
    private $std;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
    }

    public function render()
    {
        $informacoes = new \stdClass;
        $informacoes->situacao = $this->std->situacao;
        $informacoes->classe = $this->std->classe;
        $informacoes->numeroProcesso = $this->std->numeroProcesso;
        $informacoes->responsavelTecnico = new ResponsavelAlvara($this->std->responsavelTecnico);
        $informacoes->responsavelProjeto = new ResponsavelAlvara($this->std->responsavelProjeto);
        $informacoes->especificacao = $this->std->especificacao;
        $informacoes->observacao = $this->std->observacao;
        return $informacoes;
    }
}