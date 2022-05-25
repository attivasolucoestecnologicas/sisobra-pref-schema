<?php


namespace Attiva\SisObraXML\Factory;

class UnidadeMedida
{
    private $std;
    private $valor;
    private $xml;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        $this->xml = new \DOMDocument();
    }

    public function xml()
    {
        return $this->xml->createElement('unidadeMedida', $this->std->valor);
    }
}