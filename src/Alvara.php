<?php

namespace Attiva\SisObraXML;

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
        $alvara = new \Attiva\SisObraXML\Factory\Alvara($this->std);
        $xml = $this->xml->importNode($alvara->xml(), true);

        $pai->appendChild($xml);
//
//        $propObra = $this->xml->createElement('proprietarioObra');
//        $infoAdicionais = $this->xml->createElement('infoAdicionais');
//
//        $alvara->appendChild($nAlvara);
//        $alvara->appendChild($nProtocoloAnt);
//        $alvara->appendChild($nomeObra);
//        $alvara->appendChild($dtAlvara);
//        $alvara->appendChild($dtInicioObra);
//        $alvara->appendChild($dtFinalObra);
//        $alvara->appendChild($tpAlvara);
//        $this->responsavelObra($alvara, 'dono_da_obra', '11111111111222');
//        $this->endObra($alvara, $this->std->endereco);
//        $alvara->appendChild($undMedida);
//
//        if ($this->std->unidadeMedida->select == 'valorUnidadeMedida') {
//            $alvara->appendChild($valUndMedida);
//        } elseif ($this->std->unidadeMedida->select == 'area') {
//            $alvara->appendChild($area);
//        }
//
//        if (isset($this->std->proprietarioObra->cpf)) {
//            $doc = $this->xml->createElement('cpf', $this->std->proprietarioObra->cpf);
//            $propObra->appendChild($doc);
//        } elseif (isset($this->std->proprietarioObra->cnpj)) {
//            $doc = $this->xml->createElement('cnpj', $this->std->proprietarioObra->cnpj);
//            $propObra->appendChild($doc);
//        }
//
//        $alvara->appendChild($propObra);
//
//        $this->infoAdicionais($infoAdicionais, $this->std->infoAdicionais);
//
//        $alvara->appendChild($infoAdicionais);
        $this->xml->save("{$this->fileName}.xml");
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

    private function infoAdicionais(\DOMNode $node, \stdClass $std)
    {
        $situacao = $this->xml->createElement('situacao', $std->situacao);
        $classe = $this->xml->createElement('classe', $std->classe);
        $numeroProcesso = $this->xml->createElement('numeroProcesso', $std->numeroProcesso);

        $responsavelTecnico = $this->xml->createElement('responsavelTecnico');
        $engenheiro = $this->xml->createElement('engenheiro');
        $arquiteto = $this->xml->createElement('arquiteto');
        if (isset($std->responsavelTecnico)) {
            if (isset($std->responsavelTecnico->engenheiro)) {
                $engRT = $std->responsavelTecnico->engenheiro;
                $engenheiroNome = $this->xml->createElement('nome', $engRT->nome);
                $engenheiroCrea = $this->xml->createElement('crea', $engRT->crea);
                $engenheiroArt = $this->xml->createElement('art', $engRT->art);
                $engenheiro->appendChild($engenheiroNome);
                $engenheiro->appendChild($engenheiroCrea);
                $engenheiro->appendChild($engenheiroArt);
            }
            if (isset($std->responsavelTecnico->arquiteto)) {
                $arqRT = $std->responsavelTecnico->arquiteto;
                $arquitetoNome = $this->xml->createElement('nome', $arqRT->nome);
                $arquitetoCrea = $this->xml->createElement('cau', $arqRT->cau);
                $arquitetoArt = $this->xml->createElement('rrt', $arqRT->rrt);
                $arquiteto->appendChild($arquitetoNome);
                $arquiteto->appendChild($arquitetoCrea);
                $arquiteto->appendChild($arquitetoArt);
            }
        }
        $responsavelTecnico->appendChild($engenheiro);
        $responsavelTecnico->appendChild($arquiteto);

        $responsavelProjeto = $this->xml->createElement('responsavelProjeto');
        $engenheiroProjeto = $this->xml->createElement('engenheiro');
        $arquitetoProjeto = $this->xml->createElement('arquiteto');
        if (isset($std->responsavelProjeto)) {
            if (isset($std->responsavelProjeto->engenheiro)) {
                $engP = $std->responsavelProjeto->engenheiro;
                $engenheiroProjetoNome = $this->xml->createElement('nome', $engP->nome);
                $engenheiroProjetoCrea = $this->xml->createElement('crea', $engP->crea);
                $engenheiroProjetoArt = $this->xml->createElement('art', $engP->art);
                $engenheiroProjeto->appendChild($engenheiroProjetoNome);
                $engenheiroProjeto->appendChild($engenheiroProjetoCrea);
                $engenheiroProjeto->appendChild($engenheiroProjetoArt);
            }
            if (isset($std->responsavelProjeto->arquiteto)) {
                $arqP = $std->responsavelProjeto->arquiteto;
                $arquitetoProjetoNome = $this->xml->createElement('nome', $arqP->nome);
                $arquitetoProjetoCrea = $this->xml->createElement('cau', $arqP->cau);
                $arquitetoProjetoArt = $this->xml->createElement('rrt', $arqP->rrt);
                $arquitetoProjeto->appendChild($arquitetoProjetoNome);
                $arquitetoProjeto->appendChild($arquitetoProjetoCrea);
                $arquitetoProjeto->appendChild($arquitetoProjetoArt);
            }
        }
        $responsavelProjeto->appendChild($engenheiroProjeto);
        $responsavelProjeto->appendChild($arquitetoProjeto);

        $especificacao = $this->xml->createElement('especificacao', $std->especificacao);
        $observacao = $this->xml->createElement('observacao', $std->observacao);

        $node->appendChild($situacao);
        $node->appendChild($classe);
        $node->appendChild($numeroProcesso);
        $node->appendChild($responsavelTecnico);
        $node->appendChild($responsavelProjeto);
        $node->appendChild($especificacao);
        $node->appendChild($observacao);
    }
}