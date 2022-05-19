<?php

namespace Attiva\SisObraXML;

class Alvara extends Base
{
    private $fileName = 'LeiauteAlvara';

    public function processar()
    {
        $pai = $this->xml->createElement('sisobraPref');
        $this->xml->appendChild($pai);

        $versao = $this->xml->createElement('versao', '1.0.1');
        $pai->appendChild($versao);
    }
}