<?php

require_once __DIR__ . '/../vendor/autoload.php';

$alvara = require_once './LeiauteAlvara.php';
$habitese = require_once './LeiauteHabitese.php';
$alteracao = require_once './LeiauteAlteraSituacao.php';

$lote = new \Attiva\SisObraXML\LoteAlvaraHabitese();

$lote->alvara = [$alvara, $alvara, $alvara, $alvara];
$lote->habitese = [$habitese, $habitese, $habitese, $habitese];
$lote->alteracao = [$alteracao, $alteracao, $alteracao, $alteracao];

$lote->xml()->save();


