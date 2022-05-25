<?php

namespace Attiva\SisObraXML\Factory;

class ProprietarioObra
{
    private $std;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
    }

    public function render()
    {
        $proprietario = new \stdClass;
        if (isset($this->std->cpf)) {
            $proprietario->cpf = $this->std->cpf;
        } elseif (isset($this->std->cnpj)) {
            $proprietario->cnpj = $this->std->cnpj;
        }
        return $proprietario;
    }
}