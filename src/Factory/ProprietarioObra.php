<?php

namespace Attiva\SisObraXML\Factory;

class ProprietarioObra
{
    private $std;
    private $xml;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        $this->xml = new \DOMDocument();
    }

    public function xml()
    {
        $xml = new \DOMElement('cpf');
        if (isset($this->std->cpf)) {
            $xml = $this->xml->createElement('cpf', $this->std->cpf);
        } elseif (isset($this->std->cnpj)) {
            $xml = $this->xml->createElement('cnpj', $this->std->cnpj);
        }
        return $xml;
    }
}