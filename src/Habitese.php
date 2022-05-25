<?php

namespace Attiva\SisObraXML;

class Habitese extends Base
{
    private $std;
    private $fileName = 'LeiauteHabitese';

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        parent::__construct();
    }

    public function processar()
    {
        $pai = $this->xml->createElement('sisobraPref');
        $pai->setAttribute('Id', 123);
        $this->xml->appendChild($pai);

        $versao = $this->xml->createElement('versao', '1.0.1');
        $pai->appendChild($versao);

        $raiz = $this->xml->createElement('infDocumento');
        $pai->appendChild($raiz);

        $nHabitese = $this->xml->createElement('numeroHabitese', $this->std->numeroHabitese);
        $dtHabitese = $this->xml->createElement('dataHabitese', $this->std->dataHabitese);
        $dtFinalObra = $this->xml->createElement('dataFinalObra', $this->std->dataFinalObra);
        $tpHabitese = $this->xml->createElement('tipoHabitese', $this->std->tipoHabitese);
        $observacao = $this->xml->createElement('observacao', $this->std->observacao);

        // SELECT
        $valUndMedida = null;
        $area = null;

        $undMedida = $this->xml->createElement('unidadeMedida', $this->std->unidadeMedida->valor);
        if ($this->std->unidadeMedida->select == 'valorUnidadeMedida') {
            $valUndMedida = $this->xml->createElement('valorUnidadeMedida', $this->std->unidadeMedida->valor_unidade_medida);
        } elseif ($this->std->unidadeMedida->select == 'area') {
            $area = $this->xml->createElement('area');
            $areaPrincipal = $this->xml->createElement('areaPrincipal', $this->std->unidadeMedida->area_principal);
            $areaComplementar = $this->xml->createElement('areaComplementar', $this->std->unidadeMedida->area_complementar);
            $area->appendChild($areaPrincipal);
            $area->appendChild($areaComplementar);
        }
        // FIM SELECT

        $qtdBlocos = $this->xml->createElement('qtd_total_unidades_bloco', $this->std->qtd_total_unidades_bloco);
        $nAlvara = $this->xml->createElement('numeroAlvara', $this->std->numeroAlvara);
        $dtAlvara = $this->xml->createElement('dataAlvara', $this->std->dataAlvara);

        $raiz->appendChild($nHabitese);
        $raiz->appendChild($dtHabitese);
        $raiz->appendChild($dtFinalObra);
        $raiz->appendChild($tpHabitese);
        $raiz->appendChild($observacao);
        $raiz->appendChild($undMedida);
        if ($this->std->unidadeMedida->select == 'valorUnidadeMedida') {
            $raiz->appendChild($valUndMedida);
        } elseif ($this->std->unidadeMedida->select == 'area') {
            $raiz->appendChild($area);
        }
        $raiz->appendChild($qtdBlocos);
        $raiz->appendChild($nAlvara);
        $raiz->appendChild($dtAlvara);

        $this->xml->save("{$this->fileName}.xml");
    }
}