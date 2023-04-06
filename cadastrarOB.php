<?php

use App\Entity\Observacao;
use App\Entity\Aluno;
use App\Entity\Turma;

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Observação');

$observe = new Observacao;
$observe->idturmaaluno = null;
$observe->idaluno = null;
$observe->descricao = '';
$observe->data = '';

if (isset($_POST['nome'], $_POST['turma'], $_POST['descricao'], $_POST['data'])) {
    $observe->idturmaaluno = $_POST['turma'];
    $observe->idaluno = $_POST['nome'];
    $observe->descricao = $_POST['descricao'];
    $observe->data = $_POST['data'];
    $observe->cadastrar();

    header('location: index.php?status=success');
    exit;
}

$turmas = Turma::getTurmas();
$alunos = Aluno::getAlunos();


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
