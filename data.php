<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Turma;
use App\Entity\Aluno;

switch (true) {
    case isset($_FILES['archivet']):
        $arq_tmpT = $_FILES['archivet']['tmp_name'];
        $linhas = file($arq_tmpT);
        foreach($linhas as $linha){
            $linha = trim($linha);
            $component_query = explode(',',$linha);
            $turmaID = Turma::getTurmaByName("'$component_query[0]'");
            $nomealuno = $component_query[1];
            
            $new = new Aluno;
            $new->nome = $nomealuno;
            $new->idturma = $turmaID->id;
            $new->cadastrar();
        }
        header('location: index.php?status=successCreaAlus');
        exit;    
        break;
    case isset($_FILES['archivea']):
        $arq_tmpT = $_FILES['archivea']['tmp_name'];
        $linhas = file($arq_tmpT);
        foreach($linhas as $linha){
            $linha = trim($linha);
            $newturma = new Turma;
            $newturma->turma = $linha;
            $newturma->cadastrar();
        }
        header('location: index.php?status=successCreaTurmas');
        exit;    
        break;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/importar-dados.php';
include __DIR__ . '/includes/footer.php';
