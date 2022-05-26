<?php

namespace Attiva\SisObraXML;

use Attiva\SisObraXML\Abstracts\Lote;
use Attiva\SisObraXML\Interfaces\Xml;

class LoteAlvaraHabitese extends Lote implements Xml
{
    public function xml()
    {
        $pai = $this->xml->createElement('sisobraPref');
        $this->xml->appendChild($pai);

        $versao = $this->xml->createElement('versao', '1.0.1');
        $pai->appendChild($versao);

//        $alvara = $this->xml->createElement('Alvara');
//        foreach ($this->alvara as $a) {
//            $alvaraNode = new \Attiva\SisObraXML\Factory\Alvara($a);
//            $xml = $this->xml->importNode($alvaraNode->xml(), true);
//            $alvara->appendChild($xml);
//        }
//
//        $habitese = $this->xml->createElement('Habitese');
//        foreach ($this->habitese as $h) {
//            $habiteseNode = new \Attiva\SisObraXML\Factory\Habitese($h);
//            $xml = $this->xml->importNode($habiteseNode->xml(), true);
//            $habitese->appendChild($xml);
//        }
//
//        $alteracao = $this->xml->createElement('AlteraSituacao');
//        foreach ($this->alteracao as $a) {
//            $alteracaoNode = new \Attiva\SisObraXML\Factory\AlteraSituacao($a);
//            $xml = $this->xml->importNode($alteracaoNode->xml(), true);
//            $alteracao->appendChild($xml);
//        }

        $this->xml->saveXML("LoteAlvaraHabitese.xml");
    }
}