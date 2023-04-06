<?php 

use App\Entity\Turma;
use App\Entity\Aluno;

require __DIR__ . '/vendor/autoload.php';

print_r($_GET);

switch(true){
    case isset($_GET['turmadel']):
        if (!is_numeric($_GET['turmadel'])) {
            header('location: index.php?status=errorDelTur');
            exit;
        }
        $turmaobj = Turma::getTurmaById($_GET['turmadel']);

        if(!$turmaobj instanceof Turma){
            header('location: index.php?status=errorDelTur');
            exit;
        }
        if(isset($_GET['turmadel'])){
            $turmaobj->excluir();
            header('location: index.php?status=successDelTur');
            exit;
        }
    case isset($_GET['alunodel']):
        if (!is_numeric($_GET['alunodel'])) {
            header('location: index.php?status=errorDelAl');
            exit;
        }
        $alunoobj = Aluno::getAlunoById($_GET['alunodel']);

        if(!$alunoobj instanceof Aluno){
            header('location: index.php?status=errorDelAl');
            exit;
        }
        if(isset($_GET['alunodel'])){
            $alunoobj->excluir();
            header('location: index.php?status=successDelAl');
            exit;
        }
    default:
        header('location: index.php?status=error');
        exit;
}

// if (!is_numeric($_GET['alunodel'])) {
//     header('location: index.php?status=errorAlDel');
//     exit;
// }

// $alunoobj = Aluno::getAlunoById($_GET['alunodel']);

// if(!$alunoobj instanceof Aluno){
//     header('location: index.php?status=errorAlDel');
//     exit;
// }

// print_r($_GET);
// switch (true){
//     break;
//     case isset($_GET['alunodel']):
//         $alunoobj->excluir();
//         header('location: index.php?status=success');
//         exit;
//     break;
//     
// }

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
