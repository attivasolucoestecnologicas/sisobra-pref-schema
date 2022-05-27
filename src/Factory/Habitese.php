<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class Habitese extends Base implements Xml
{
    public function xml()
    {
        $numeroHabitese = $this->xml->createElement('numeroHabitese', $this->std->numeroHabitese);
        $dataHabitese = $this->xml->createElement('dataHabitese', $this->std->dataHabitese);
        $dataFinalObra = $this->xml->createElement('dataFinalObra', $this->std->dataFinalObra);
        $tipoHabitese = $this->xml->createElement('tipoHabitese', $this->std->tipoHabitese);
        $observacao = $this->xml->createElement('observacao', $this->std->observacao);
        $qtdBloco = $this->xml->createElement('qtd_total_unidades_bloco', $this->std->qtd_total_unidades_bloco);
        $numeroAlvara = $this->xml->createElement('numeroAlvara', $this->std->numeroAlvara);
        $dataAlvara = $this->xml->createElement('dataAlvara', $this->std->dataAlvara);
        $undMedida = new UnidadeMedida($this->std->unidadeMedida);
        $undMedidaSelect = new UnidadeMedidaSelect($this->std->unidadeMedida);

        $xml = $this->xml->createElement('infHabitese');
        $xml->appendChild($numeroHabitese);
        $xml->appendChild($dataHabitese);
        $xml->appendChild($dataFinalObra);
        $xml->appendChild($tipoHabitese);
        $xml->appendChild($observacao);
        $xml->appendChild($this->xml->importNode($undMedida->xml(), true));
        $xml->appendChild($this->xml->importNode($undMedidaSelect->xml(), true));
        $xml->appendChild($qtdBloco);
        $xml->appendChild($numeroAlvara);
        $xml->appendChild($dataAlvara);

        return $xml;
    }
}