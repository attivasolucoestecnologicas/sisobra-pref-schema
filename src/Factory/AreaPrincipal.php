<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class AreaPrincipal extends Base implements Xml
{
    public function xml()
    {
        $xml = $this->xml->createElement('areaPrincipal');
        $categoria = $this->xml->createElement('categoria');
        $destinacao = $this->xml->createElement('destinacao');
        $tipoObra = $this->xml->createElement('tipoObra');
        $qtdBloco = $this->xml->createElement('qtd_total_unidades_bloco');
        $area = $this->xml->createElement('area');

        $xml->appendChild($categoria);
        $xml->appendChild($destinacao);
        $xml->appendChild($tipoObra);
        $xml->appendChild($qtdBloco);
        $xml->appendChild($area);

        return $xml;
    }
}