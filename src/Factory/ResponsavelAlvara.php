<?php


namespace Attiva\SisObraXML\Factory;


class ResponsavelAlvara
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
        $xml = $this->xml->createElement('responsavelTecnico');
        $xml->appendChild($this->xml->importNode($this->engenheiro(), true));
        $xml->appendChild($this->xml->importNode($this->arquiteto(), true));
        return $xml;
    }

    private function engenheiro()
    {
        $xml = $this->xml->createElement('engenheiro');
        $nome = $this->xml->createElement('nome', $this->std->engenheiro->nome);
        $crea = $this->xml->createElement('crea', $this->std->engenheiro->crea);
        $art = $this->xml->createElement('art', $this->std->engenheiro->art);
        $xml->appendChild($nome);
        $xml->appendChild($crea);
        $xml->appendChild($art);
        return $xml;
    }

    private function arquiteto()
    {
        $xml = $this->xml->createElement('arquiteto');
        $nome = $this->xml->createElement('nome', $this->std->arquiteto->nome);
        $cau = $this->xml->createElement('cau', $this->std->arquiteto->cau);
        $rrt = $this->xml->createElement('rrt', $this->std->arquiteto->rrt);
        $xml->appendChild($nome);
        $xml->appendChild($cau);
        $xml->appendChild($rrt);
        return $xml;
    }
}