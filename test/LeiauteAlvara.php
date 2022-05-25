<?php

require_once '../vendor/autoload.php';

use Attiva\SisObraXml\Alvara;

$std = new stdClass;

$std->numeroAlvara = '1111';
$std->numeroProtocoloAnterior = '1111';
$std->nomeObra = '1111';
$std->dataAlvara = '2022-05-15';
$std->dataInicioObra = '2022-05-15';
$std->dataFinalObra = '2022-05-15';
$std->tipoAlvara = 'A';

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
$std->infoAdicionais->situacao = 'teste';
$std->infoAdicionais->classe = 'teste';
$std->infoAdicionais->numeroProcesso = '123456';

$std->infoAdicionais->responsavelTecnico = new stdClass;
$std->infoAdicionais->responsavelTecnico->engenheiro = new stdClass;
$std->infoAdicionais->responsavelTecnico->engenheiro->nome = 'josé';
$std->infoAdicionais->responsavelTecnico->engenheiro->crea = '1234';
$std->infoAdicionais->responsavelTecnico->engenheiro->art = '1234';
$std->infoAdicionais->responsavelTecnico->arquiteto = new stdClass;
$std->infoAdicionais->responsavelTecnico->arquiteto->nome = 'maria';
$std->infoAdicionais->responsavelTecnico->arquiteto->cau = '123';
$std->infoAdicionais->responsavelTecnico->arquiteto->rrt = '123';

$std->infoAdicionais->responsavelProjeto = new stdClass;
$std->infoAdicionais->responsavelProjeto->engenheiro = new stdClass;
$std->infoAdicionais->responsavelProjeto->engenheiro->nome = 'pedro';
$std->infoAdicionais->responsavelProjeto->engenheiro->crea = '4321';
$std->infoAdicionais->responsavelProjeto->engenheiro->art = '5432';
$std->infoAdicionais->responsavelProjeto->arquiteto = new stdClass;
$std->infoAdicionais->responsavelProjeto->arquiteto->nome = 'araújo';
$std->infoAdicionais->responsavelProjeto->arquiteto->cau = '7564';
$std->infoAdicionais->responsavelProjeto->arquiteto->rrt = '2325';

$std->infoAdicionais->especificacao = 'teste';
$std->infoAdicionais->observacao = 'teste';

$classe = new Alvara($std);

$classe->processar();