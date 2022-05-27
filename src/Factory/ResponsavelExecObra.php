<?php

namespace Attiva\SisObraXML\Factory;

use Attiva\SisObraXML\Abstracts\Base;
use Attiva\SisObraXML\Interfaces\Xml;

class ResponsavelExecObra extends Base implements Xml
{
    public function xml()
    {
        $select = $this->std->select;
        $xml = $this->xml->createElement('responsavelExecObra');
        switch ($select) {
            case 'proprietario_do_imovel':
                $propietario = $this->xml->createElement($select, $this->std->proprietario_do_imovel);
                $xml->appendChild($propietario);
                break;
            case 'dono_da_obra':
            case 'incorporador_construcao_civil':
            case 'construcao_nome_coletivo':
                if (isset($this->std->cpf)) {
                    $doc = $this->xml->createElement('cpf', $this->std->cpf);
                    $xml->appendChild($doc);
                } elseif (isset($this->xml->cnpj)) {
                    $doc = $this->xml->createElement('cnpj', $this->std->cnpj);
                    $xml->appendChild($doc);
                }
                break;
            case 'empresa_construtora':
                $doc = $this->xml->createElement('cnpj', $this->std->cnpj);
                $xml->appendChild($doc);
                break;
            case 'empresa_lider_consorcio':
            case 'consorcio':
                $docCons = $this->xml->createElement('cnpjConsorcio', $this->std->cnpjConsorcio);
                $docEmp = $this->xml->createElement('cnpjEmpresaLiderConsorcio', $this->std->cnpjEmpresaLiderConsorcio);
                $xml->appendChild($docCons);
                $xml->appendChild($docEmp);
                break;
        }
        return $xml;
    }
}