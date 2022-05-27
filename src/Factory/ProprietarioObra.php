<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class ProprietarioObra extends Base implements Xml
{
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