<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class Alvara extends Base implements Xml
{
    public function xml()
    {
        $numeroAlvara = $this->xml->createElement('numeroAlvara', $this->std->numeroAlvara);
        $numeroProtocoloAnterior = $this->xml->createElement('numeroProtocoloAnterior', $this->std->numeroProtocoloAnterior);
        $nomeObra = $this->xml->createElement('nomeObra', $this->std->nomeObra);
        $dataAlvara = $this->xml->createElement('dataAlvara', $this->std->dataAlvara);
        $dataInicioObra = $this->xml->createElement('dataInicioObra', $this->std->dataInicioObra);
        $dataFinalObra = $this->xml->createElement('dataFinalObra', $this->std->dataFinalObra);
        $tipoAlvara = $this->xml->createElement('tipoAlvara', $this->std->tipoAlvara);

        $responsavelExecObra = new ResponsavelExecObra($this->std->responsavelExecObra);
        $endereco = new EnderecoAlvara($this->std->endereco);
        $undMedida = new UnidadeMedida($this->std->unidadeMedida);
        $undMedidaSelect = new UnidadeMedidaSelect($this->std->unidadeMedida);
        $proprietario = new ProprietarioObra($this->std->proprietarioObra);
        $infoAdicionais = new InformacoesAdicionais($this->std->infoAdicionais);


        $xml = $this->xml->createElement('infAlvara');
        $xml->appendChild($numeroAlvara);
        $xml->appendChild($numeroProtocoloAnterior);
        $xml->appendChild($nomeObra);
        $xml->appendChild($dataAlvara);
        $xml->appendChild($dataInicioObra);
        $xml->appendChild($dataFinalObra);
        $xml->appendChild($tipoAlvara);
        $xml->appendChild($this->xml->importNode($responsavelExecObra->xml(), true));
        $xml->appendChild($this->xml->importNode($endereco->xml(), true));
        $xml->appendChild($this->xml->importNode($undMedida->xml(), true));
        $xml->appendChild($this->xml->importNode($undMedidaSelect->xml(), true));
        $xml->appendChild($this->xml->importNode($proprietario->xml(), true));
        $xml->appendChild($this->xml->importNode($infoAdicionais->xml(), true));

        return $xml;
    }
}