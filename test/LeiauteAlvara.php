<?php

require_once '../vendor/autoload.php';

use Attiva\SisObraXml\Alvara;

$std = new \stdClass;

$std->endereco = new \stdClass;
$std->endereco->cep = '55555555';
$std->endereco->tipo_logradouro = 'rua';
$std->endereco->logradouro = 'maria';
$std->endereco->numero = '55';
$std->endereco->complemento = 'sem comp';
$std->endereco->bairro = 'centro';

$std->unidadeMedida = 'M2';
$std->unidadeMedida->valorUnidadeMedida = '12595.00'; // FLOAT


$classe = new Alvara($std);


$classe->processar();