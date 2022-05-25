<?php


namespace Attiva\SisObraXML\Factory;


class ResponsavelAlvara
{
    private $std;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
    }

    public function render()
    {
        $responsavel = new \stdClass;
        $responsavel->engenheiro = $this->engenheiro();
        $responsavel->arquiteto = $this->arquiteto();
        return $responsavel;
    }

    private function engenheiro()
    {
        $engenheiro = new \stdClass;
        $engenheiro->nome = $this->std->engenheiro->nome;
        $engenheiro->crea = $this->std->engenheiro->crea;
        $engenheiro->art = $this->std->engenheiro->art;
        return $engenheiro;
    }

    private function arquiteto()
    {
        $arquiteto = new \stdClass;
        $arquiteto->nome = $this->std->arquiteto->nome;
        $arquiteto->cau = $this->std->arquiteto->cau;
        $arquiteto->rrt = $this->std->arquiteto->rrt;
        return $arquiteto;
    }
}