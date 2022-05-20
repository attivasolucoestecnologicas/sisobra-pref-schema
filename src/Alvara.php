<?php

namespace Attiva\SisObraXml;

class Alvara extends Base
{
    private $std;
    private $fileName = 'LeiauteAlvara';

    public function __construct(\stdClass $std)
    {
        $this->std = $std;
        parent::__construct();
    }

    public function processar()
    {
        $pai = $this->xml->createElement('sisobraPref');
        $this->xml->appendChild($pai);

        $versao = $this->xml->createElement('versao', '1.0.1');
        $pai->appendChild($versao);

        $alvara = $this->xml->createElement('infAlvara');
        $pai->appendChild($alvara);

        $nAlvara = $this->xml->createElement('numeroAlvara');
        $nProtocoloAnt = $this->xml->createElement('numeroProtocoloAnterior');
        $nomeObra = $this->xml->createElement('nomeObra');
        $dtAlvara = $this->xml->createElement('dataAlvara');
        $dtInicioObra = $this->xml->createElement('dataInicioObra');
        $dtFinalObra = $this->xml->createElement('dataFinalObra');
        $tpAlvara = $this->xml->createElement('tipoAlvara');

//        $endObra = $this->xml->createElement('enderecoObra');
        $undMedida = $this->xml->createElement('unidadeMedida');

        // SELECT
        $valUndMedida = $this->xml->createElement('valorUnidadeMedida');
        $area = $this->xml->createElement('area');
        // FIM SELECT

        $propObra = $this->xml->createElement('proprietarioObra');
        $infoAdicionais = $this->xml->createElement('infoAdicionais');

        $alvara->appendChild($nAlvara);
        $alvara->appendChild($nProtocoloAnt);
        $alvara->appendChild($nomeObra);
        $alvara->appendChild($dtAlvara);
        $alvara->appendChild($dtInicioObra);
        $alvara->appendChild($dtFinalObra);
        $alvara->appendChild($tpAlvara);
        $this->responsavelObra($alvara, 'dono_da_obra', '11111111111222');
        $this->endObra($alvara, $this->std->endereco);
        $alvara->appendChild($undMedida);
        $alvara->appendChild($valUndMedida);
        $alvara->appendChild($area);
        $alvara->appendChild($propObra);
        $alvara->appendChild($infoAdicionais);

        $this->xml->save('Alvara.xml');
    }

    private function responsavelObra(\DOMNode $node, $resp, $value)
    {
        if ($resp == 'proprietario_do_imovel') {
            $respExecObra = $this->xml->createElement('responsavelExecObra', $value);
        } elseif (in_array($resp, ['dono_da_obra', 'incorporador_construcao_civil'])) {
            $respExecObra = $this->xml->createElement('responsavelExecObra');
            if (check_cpf_cnpj($value) == 'cpf') {
                $doc = $this->xml->createElement('cpf', $value);
                $respExecObra->appendChild($doc);
            }
            if (check_cpf_cnpj($value) == 'cnpj') {
                $doc = $this->xml->createElement('cnpj', $value);
                $respExecObra->appendChild($doc);
            }
        } elseif ($resp == 'empresa_construtora') {
            $respExecObra = $this->xml->createElement('responsavelExecObra');
            $cnpj = $this->xml->createElement('cnpj', $value);
            $respExecObra->appendChild($cnpj);
        } elseif (in_array($resp, ['empresa_lider_consorcio', 'consorcio'])) {
            $respExecObra = $this->xml->createElement('responsavelExecObra');
            $cnpjCons = $this->xml->createElement('cnpjConsorcio', $value);
            $cnpjEmp = $this->xml->createElement('cnpjEmpresaLiderConsorcio', $value);
            $respExecObra->appendChild($cnpjCons);
            $respExecObra->appendChild($cnpjEmp);
        } elseif ($resp == 'construcao_nome_coletivo') {
            $respExecObra = $this->xml->createElement('responsavelExecObra');
            if (check_cpf_cnpj($value) == 'cpf') {
                $doc = $this->xml->createElement('cpf', $value);
                $respExecObra->appendChild($doc);
            }
            if (check_cpf_cnpj($value) == 'cnpj') {
                $doc = $this->xml->createElement('cnpj', $value);
                $respExecObra->appendChild($doc);
            }
        } else {
            $respExecObra = $this->xml->createElement('responsavelExecObra');
        }
        $node->appendChild($respExecObra);
    }

    private function endObra(\DOMNode $node, \Stdclass $std)
    {
        $endereco = $this->xml->createElement('enderecoObra');
        $cep = $this->xml->createElement('cep', $std->cep);
        $tipoLogradouro = $this->xml->createElement('tipoLogradouro', $std->tipo_logradouro);
        $logradouro = $this->xml->createElement('logradouro', $std->logradouro);
        $numero = $this->xml->createElement('numero', $std->numero);
        $complemento = $this->xml->createElement('complemento', $std->complemento);
        $bairro = $this->xml->createElement('bairro', $std->bairro);

        $endereco->appendChild($cep);
        $endereco->appendChild($tipoLogradouro);
        $endereco->appendChild($logradouro);
        $endereco->appendChild($numero);
        $endereco->appendChild($complemento);
        $endereco->appendChild($bairro);

        $node->appendChild($endereco);
    }
}