<?php


namespace Attiva\SisObraXML\Abstracts;


abstract class Lote
{
    protected $xml;
    public $alvara = [];
    public $habitese = [];
    public $alteracao = [];

    public function __construct()
    {
        $this->xml = new \DOMDocument('1.0', 'UTF-8');
    }


}