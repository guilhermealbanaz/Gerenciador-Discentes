<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Observação');

use App\Entity\Observacao;
use App\Entity\Aluno;
use App\Entity\Turma;

if (!isset($_GET['idob']) or !is_numeric($_GET['idob'])) {
    header('location: index.php?status=error');
    exit;
}

$observe = Observacao::getObservacao($_GET['idob']);

if (!$observe instanceof Observacao) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['nome'], $_POST['turma'], $_POST['descricao'], $_POST['data'])) {
    // $observ = new Observacao;
    $observe->idturmaaluno = $_POST['turma'];
    $observe->idaluno = $_POST['nome'];
    $observe->descricao = $_POST['descricao'];
    $observe->data = $_POST['data'];
    $observe->atualizar();

    header('location: index.php?status=success');
}

$alunos = Aluno::getAlunos();
$turmas = Turma::getTurmas();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
