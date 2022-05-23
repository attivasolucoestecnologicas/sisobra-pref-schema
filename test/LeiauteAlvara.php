<?php

require_once '../vendor/autoload.php';

use Attiva\SisObraXml\Alvara;

$std = new stdClass;

$std->endereco = new stdClass;
$std->endereco->cep = '55555555';
$std->endereco->tipo_logradouro = 'rua';
$std->endereco->logradouro = 'maria';
$std->endereco->numero = '55';
$std->endereco->complemento = 'sem comp';
$std->endereco->bairro = 'centro';

$std->unidadeMedida = new stdClass;
$std->unidadeMedida->valor = 'M2';
//$std->unidadeMedida->select = 'valorUnidadeMedida'; // valorUnidadeMedida ou area
//$std->unidadeMedida->valor_unidade_medida = '12345.67'; // Se for selecionado valorUnidadeMedida
$std->unidadeMedida->select = 'area';
$std->unidadeMedida->area_principal = '1|100'; // areaPrincipal ou areaComplementar
$std->unidadeMedida->area_complementar = '0|100';

$std->proprietarioObra = new stdClass;
$std->proprietarioObra->cpf = '12345678901';
$std->proprietarioObra->cnpj = '12345678901234';

$std->infoAdicionais = new stdClass;
$std->infoAdicionais->situacao = '';
$std->infoAdicionais->classe = '';
$std->infoAdicionais->numeroProcesso = '';

$std->infoAdicionais->responsavelTecnico = new stdClass;
$std->infoAdicionais->responsavelTecnico->engenheiro = new stdClass;
$std->infoAdicionais->responsavelTecnico->engenheiro->nome = '';
$std->infoAdicionais->responsavelTecnico->engenheiro->crea = '';
$std->infoAdicionais->responsavelTecnico->engenheiro->art = '';
$std->infoAdicionais->responsavelTecnico->arquiteto = new stdClass;
$std->infoAdicionais->responsavelTecnico->arquiteto->nome = '';
$std->infoAdicionais->responsavelTecnico->arquiteto->cau = '';
$std->infoAdicionais->responsavelTecnico->arquiteto->rrt = '';

$std->infoAdicionais->responsavelProjeto = new stdClass;
$std->infoAdicionais->responsavelProjeto->engenheiro = new stdClass;
$std->infoAdicionais->responsavelProjeto->engenheiro->nome = '';
$std->infoAdicionais->responsavelProjeto->engenheiro->crea = '';
$std->infoAdicionais->responsavelProjeto->engenheiro->art = '';
$std->infoAdicionais->responsavelProjeto->arquiteto = new stdClass;
$std->infoAdicionais->responsavelProjeto->arquiteto->nome = '';
$std->infoAdicionais->responsavelProjeto->arquiteto->cau = '';
$std->infoAdicionais->responsavelProjeto->arquiteto->rrt = '';

$std->infoAdicionais->especificacao = '';
$std->infoAdicionais->observacao = '';

$classe = new Alvara($std);


$classe->processar();