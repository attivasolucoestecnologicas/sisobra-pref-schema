<?php


namespace Attiva\SisObraXML;


abstract class Base
{
    public $xml;
    protected $versao; // Versão do lote

    public function __construct($versao)
    {
        $this->xml = new \DOMDocument('1.0', 'UTF-8');
    }

    public function getVersao()
    {
        return $this->versao;
    }

    public function setVersao($versao)
    {
        $this->versao = $versao;
    }
}