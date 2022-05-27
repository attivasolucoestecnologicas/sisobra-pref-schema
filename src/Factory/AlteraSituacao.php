<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class AlteraSituacao extends Base implements Xml
{
    public function xml()
    {
        $tipoDocumento = $this->xml->createElement('tipoDocumento', $this->std->tipoDocumento);
        $numero = $this->xml->createElement('numero', $this->std->numero);
        $situacao = $this->xml->createElement('situacao', $this->std->situacao);
        $numeroProtocolo = $this->xml->createElement('numeroProtocolo', $this->std->numeroProtocolo);
        $ano = $this->xml->createElement('ano', $this->std->ano);
        $mes = $this->xml->createElement('mes', $this->std->mes);

        $xml = $this->xml->createElement('infDocumento');
        $xml->appendChild($tipoDocumento);
        $xml->appendChild($numero);
        $xml->appendChild($situacao);
        $xml->appendChild($numeroProtocolo);
        $xml->appendChild($ano);
        $xml->appendChild($mes);

        return $xml;
    }
}