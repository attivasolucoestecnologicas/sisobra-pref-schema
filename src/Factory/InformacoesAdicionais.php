<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class InformacoesAdicionais extends Base implements Xml
{
    public function xml()
    {
        $xml = $this->xml->createElement('infoAdicionais');
        $situacao = $this->xml->createElement('situacao', $this->std->situacao);
        $classe = $this->xml->createElement('classe', $this->std->classe);
        $numeroProcesso = $this->xml->createElement('numeroProcesso', $this->std->numeroProcesso);
        $responsavelTecnico = new ResponsavelAlvara($this->std->responsavelTecnico);
        $responsavelProjeto = new ResponsavelAlvara($this->std->responsavelProjeto);
        $especificacao = $this->xml->createElement('especificacao', $this->std->especificacao);
        $observacao = $this->xml->createElement('observacao', $this->std->observacao);

        $xml->appendChild($situacao);
        $xml->appendChild($classe);
        $xml->appendChild($numeroProcesso);
        $xml->appendChild($this->xml->importNode($responsavelTecnico->xml(), true));
        $xml->appendChild($this->xml->importNode($responsavelProjeto->xml(), true));
        $xml->appendChild($especificacao);
        $xml->appendChild($observacao);

        return $xml;
    }
}