<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Observacao;
use \App\Entity\Aluno;
use App\Entity\Turma;
use App\Db\Pagination;

$arrTurmas = Turma::getTurmas();
foreach($arrTurmas as $arrkeys){
    $arr[] = $arrkeys->id;
}


$f = '';
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$turmaSearch = filter_input(INPUT_GET, 'filterStatus', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$turmaSearch = in_array($turmaSearch, $arr) ? $turmaSearch : '';

if($busca){
    $newbusca=str_replace(' ','%',$busca);
    if(!Aluno::getAlunoByName("'%$newbusca%'")){
        $f = Aluno::getAlunoByName("'%$newbusca%'");
    }else{
        $f = Aluno::getAlunoByName("'%$newbusca%'")->idaluno;
    };
}
$condicoes = [
    strlen($busca) ? 'idaluno = '.$f : null,
    strlen($turmaSearch) ? 'idturmaaluno = '.$turmaSearch : null,
];

$condicoes = array_filter($condicoes);

if(is_int($f) or is_string($f)){
    $where = implode(' AND ', $condicoes);
}else{
    $where = 'idaluno = -1';
}
$quantidadeObservacoes = Observacao::getQtdObs($where);
$obPagination = new Pagination($quantidadeObservacoes,$_GET['pagina'] ?? 1, 6);

    if(is_int($f) or is_string($f)){
        $observacoes = Observacao::getObservacoes($where, null, $obPagination->getLimit());
    }else{
        $observacoes = Observacao::getObservacoes('idaluno = -1');
    }
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
