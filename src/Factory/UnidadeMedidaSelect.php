<?php


namespace Attiva\SisObraXML\Factory;

class UnidadeMedidaSelect
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
        return $this->select($this->std->select);
    }

    private function select($select)
    {
        if ($select == 'area') {
            return $this->area();
        } elseif ($select == 'valorUnidadeMedida') {
            return $this->unidadeMedida();
        }
        return null;
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