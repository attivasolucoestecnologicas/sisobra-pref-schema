<?php

namespace Attiva\SisObraXML\Factory;

class Alvara
{
    private $std;
    private $xml;
    private $endereco;
    private $undMedida;
    private $proprietario;
    private $infoAdicionais;

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        $this->xml = new \DOMDocument();
    }

    public function xml()
    {
        $numeroAlvara = $this->xml->createElement('numeroAlvara', $this->std->numeroAlvara);
        $numeroProtocoloAnterior = $this->xml->createElement('numeroProtocoloAnterior', $this->std->numeroProtocoloAnterior);
        $nomeObra = $this->xml->createElement('nomeObra', $this->std->nomeObra);
        $dataAlvara = $this->xml->createElement('dataAlvara', $this->std->dataAlvara);
        $dataInicioObra = $this->xml->createElement('dataInicioObra', $this->std->dataInicioObra);
        $dataFinalObra = $this->xml->createElement('dataFinalObra', $this->std->dataFinalObra);
        $tipoAlvara = $this->xml->createElement('tipoAlvara', $this->std->tipoAlvara);

        $endereco = new EnderecoAlvara($this->std->endereco);
        $undMedida = new UnidadeMedida($this->std->unidadeMedida);
        $undMedidaSelect = new UnidadeMedidaSelect($this->std->unidadeMedida);
//        $this->proprietario = new ProprietarioObra($this->std->proprietarioObra);
//        $this->infoAdicionais = new InformacoesAdicionais($this->std->infoAdicionais);


        $xml = $this->xml->createElement('infAlvara');
        $xml->appendChild($numeroAlvara);
        $xml->appendChild($numeroProtocoloAnterior);
        $xml->appendChild($nomeObra);
        $xml->appendChild($dataAlvara);
        $xml->appendChild($dataInicioObra);
        $xml->appendChild($dataFinalObra);
        $xml->appendChild($tipoAlvara);
        $xml->appendChild($this->xml->importNode($endereco->xml(), true));
        $xml->appendChild($this->xml->importNode($undMedida->xml(), true));
        $xml->appendChild($this->xml->importNode($undMedidaSelect->xml(), true));

        return $xml;
    }

//    public function save($fileName)
//    {
//        $this->xml->save("{$fileName}.xml");
//    }

//    public function xml()
//    {


//        $alvara->appendChild($this->undMedida->undMedida);
//        $alvara->appendChild($this->undMedida->select);
//        $alvara->appendChild($this->proprietario);
//        $alvara->appendChild($this->infoAdicionais);
//        return $alvara;
//    }
}