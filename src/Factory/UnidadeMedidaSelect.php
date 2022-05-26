<?php


namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class UnidadeMedidaSelect extends Base implements Xml
{
    public function xml()
    {
        return $this->select($this->std->select);
    }

    private function select($select)
    {
        if ($select == 'area') {
            return $this->area();
        } elseif ($select == 'valorUnidadeMedida') {
            return $this->unidadeMedida();
        }
        return new \DOMElement('');
    }

    private function area()
    {
        $xml = $this->xml->createElement('area');
        $areaPrincipal = $this->xml->createElement('areaPrincipal', $this->std->area_principal);
        $areaComplementar = $this->xml->createElement('areaComplementar', $this->std->area_complementar);
        $xml->appendChild($areaPrincipal);
        $xml->appendChild($areaComplementar);
        return $xml;
    }

    private function unidadeMedida()
    {
        return $this->xml->createElement('valorUnidadeMedida', $this->std->valor_unidade_medida);
    }
}