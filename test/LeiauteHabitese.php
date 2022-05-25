<?php

require_once '../vendor/autoload.php';

use Attiva\SisObraXML\Habitese;

$std = new stdClass;

$std->numeroHabitese = '1111';
$std->dataHabitese = '2022-05-15';
$std->dataFinalObra = '2022-05-15';
$std->tipoHabitese = 'A';
$std->observacao = 'obs teste';

$std->unidadeMedida = new stdClass;
$std->unidadeMedida->valor = 'M2';
//$std->unidadeMedida->select = 'valorUnidadeMedida'; // valorUnidadeMedida ou area
//$std->unidadeMedida->valor_unidade_medida = '12345.67'; // Se for selecionado valorUnidadeMedida
$std->unidadeMedida->select = 'area';
$std->unidadeMedida->area_principal = '1|100'; // areaPrincipal ou areaComplementar
$std->unidadeMedida->area_complementar = '0|100';

$std->qtd_total_unidades_bloco = '5';
$std->numeroAlvara = '12321';
$std->dataAlvara = '2022-05-12';

$classe = new Habitese($std);
$classe->processar();