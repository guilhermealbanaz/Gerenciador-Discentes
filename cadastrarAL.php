<?php

use App\Entity\Aluno;
use App\Entity\Turma;

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Aluno');

if(isset($_POST['acao'])){
    switch ($_POST['acao']) {
        case 'cadastrar':
            if(isset($_POST['nome'], $_POST['turma'])){
                $newusuario = new Aluno;
                $newusuario->nome = $_POST['nome'];
                $newusuario->idturma = $_POST['turma'];
                $newusuario->cadastrar();
                header('location: index.php?status=successCreaAl');
                exit;
            }
            break;
        
        case 'cadastrar-turma':
            if(isset($_POST['turma'])){
                $newturma = new Turma;
                $newturma->turma = $_POST['turma'];
                $newturma->cadastrar();
                header('location: index.php?status=successCreaTur');
                exit;
            }
            break;
    }
    
}

$turmas = Turma::getTurmas();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-criaaluno.php';
include __DIR__ . '/includes/footer.php';
