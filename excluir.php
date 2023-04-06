<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Observação');

use App\Entity\Observacao;

if (!isset($_GET['idob']) or !is_numeric($_GET['idob'])) {
    header('location: index.php?status=error');
    exit;
}

$observe = Observacao::getObservacao($_GET['idob']);

if (!$observe instanceof Observacao) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['excluir'])) {
    // $observ = new Observacao;
    $observe->excluir();

    header('location: index.php?status=success');
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
