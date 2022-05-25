<?php

namespace Attiva\SisObraXML;

class AlteraSituacao extends Base
{
    private $std;
    private $fileName = 'LeiauteAlteraSituacao';

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        parent::__construct();
    }

    public function processar()
    {
        $pai = $this->xml->createElement('sisobraPref');
        $pai->setAttribute('Id', $this->std->id);
        $this->xml->appendChild($pai);

        $versao = $this->xml->createElement('versao', '1.0.1');
        $pai->appendChild($versao);

        $raiz = $this->xml->createElement('infHabitese');
        $pai->appendChild($raiz);

        $tpDocumento = $this->xml->createElement('tipoDocumento', $this->std->tipoDocumento);
        $numero = $this->xml->createElement('numero', $this->std->numero);
        $situacao = $this->xml->createElement('situacao', $this->std->situacao);
        $nProtocolo = $this->xml->createElement('numeroProtocolo', $this->std->numeroProtocolo);
        $ano = $this->xml->createElement('ano', $this->std->ano);
        $mes = $this->xml->createElement('mes', $this->std->mes);

        $raiz->appendChild($tpDocumento);
        $raiz->appendChild($numero);
        $raiz->appendChild($situacao);
        $raiz->appendChild($nProtocolo);
        $raiz->appendChild($ano);
        $raiz->appendChild($mes);

        $this->xml->save("{$this->fileName}.xml");
    }
}