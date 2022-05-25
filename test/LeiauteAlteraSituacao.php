<?php

require_once '../vendor/autoload.php';

use Attiva\SisObraXML\AlteraSituacao;

$std = new stdClass;

$std->id = 123;
$std->tipoDocumento = 'alvara';
$std->numero = '12';
$std->situacao = 'reativado';
$std->numeroProtocolo = '21322';
$std->ano = 2022;
$std->mes = '06';

$classe = new AlteraSituacao($std);
$classe->processar();