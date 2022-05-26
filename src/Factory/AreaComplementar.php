<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class AreaComplementar extends Base implements Xml
{
    public function xml()
    {
        $xml = $this->xml->createElement('areaComplementar');
        $categoria = $this->xml->createElement('categoria');
        $destinacao = $this->xml->createElement('destinacao');
        $tipoObra = $this->xml->createElement('tipoObra');
        $tipoAreaComplementar = $this->xml->createElement('tipoAreaComplementar');
        $areaCoberta = $this->xml->createElement('areaCoberta');
        $areaDescoberta = $this->xml->createElement('areaDescoberta');

        $xml->appendChild($categoria);
        $xml->appendChild($destinacao);
        $xml->appendChild($tipoObra);
        $xml->appendChild($tipoAreaComplementar);
        $xml->appendChild($areaCoberta);
        $xml->appendChild($areaDescoberta);

        return $xml;
    }
}