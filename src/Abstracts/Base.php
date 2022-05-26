<?php

namespace Attiva\SisObraXML\Abstracts;

abstract class Base
{
    protected $std;
    protected $xml;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        $this->xml = new \DOMDocument();
    }
}