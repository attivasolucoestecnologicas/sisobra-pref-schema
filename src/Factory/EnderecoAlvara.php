<?php


namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class EnderecoAlvara extends Base implements Xml
{
    public function xml()
    {
        $cep = $this->xml->createElement('cep', $this->std->cep);
        $tipo_logradouro = $this->xml->createElement('tipoLogradouro', $this->std->tipo_logradouro);
        $logradouro = $this->xml->createElement('logradouro', $this->std->logradouro);
        $numero = $this->xml->createElement('numero', $this->std->numero);
        $complemento = $this->xml->createElement('complemento', $this->std->complemento);
        $bairro = $this->xml->createElement('bairro', $this->std->bairro);

        $xml = $this->xml->createElement('enderecoObra');
        $xml->appendChild($cep);
        $xml->appendChild($tipo_logradouro);
        $xml->appendChild($logradouro);
        $xml->appendChild($numero);
        $xml->appendChild($complemento);
        $xml->appendChild($bairro);

        return $xml;
    }
}