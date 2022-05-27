<?php


namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class UnidadeMedida extends Base implements Xml
{
    public function xml()
    {
        return $this->xml->createElement('unidadeMedida', $this->std->valor);
    }
}