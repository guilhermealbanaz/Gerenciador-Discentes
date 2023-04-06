<?php

use App\Entity\Aluno;
use App\Entity\Turma;

$mensagem = '';
if(isset($_GET['status'])){
    switch ($_GET['status']) {
        case 'success':
            $mensagem ='<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem ='<div class="alert alert-danger">A ação não foi executada!</div>';
            break;
        case 'errorDelTur':
            $mensagem ='<div class="alert alert-danger">Selecione uma turma válida!</div>';
            break;
        case 'successDelTur':
            $mensagem ='<div class="alert alert-success">Turma excluída com sucesso!</div>';
            break;
        case 'errorDelAl':
            $mensagem ='<div class="alert alert-danger">Selecione um aluno válido!</div>';
            break;
        case 'successDelAl':
            $mensagem ='<div class="alert alert-success">Aluno excluido com sucesso!</div>';
            break;
        case 'successCreaAl':
            $mensagem ='<div class="alert alert-success">Aluno criado com sucesso!</div>';
            break;
        case 'successCreaAlus':
            $mensagem ='<div class="alert alert-success">Alunos criados com sucesso!</div>';
            break;
        case 'successCreaTur':
            $mensagem ='<div class="alert alert-success">Turma criada com sucesso!</div>';
            break;
        case 'successCreaTurmas':
            $mensagem ='<div class="alert alert-success">Turmas criadas com sucesso!</div>';
            break;
    }
}

$results = '';
foreach ($observacoes as $observacao) {
    $nome = Aluno::getAlunoById($observacao->idaluno)->nome;
    $tu = Turma::getTurmaById($observacao->idturmaaluno)->turma;
    $results .= '<tr>
                    <td>' .  $nome.'</td>
                    <td>' .  $tu.'</td>
                    <td id="title" style="cursor:pointer" title="'. $observacao->descricao .'">' . $observacao->descricao . '</td>
                    <td>' . date('d/m/Y', strtotime($observacao->data)) . '</td>
                    <td>
                        <a href="editar.php?idob=' . $observacao->idob . '">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?idob=' . $observacao->idob . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
                    ';
}

$results = strlen($results) ? $results : "<tr>
                                            <td colspan='6' class='text-center'>Nenhuma observação encontrada</td>
                                          </tr>";

$turmas = Turma::getTurmas();                                
$alunos = Aluno::getAlunos();
//para a consulta da busca       
$resultTur = '';
foreach($turmas as $t){ 
    if($t->id != $turmaSearch){
    $resultTur .= '<option value="'. $t->id.'">'.$t->turma.'
    </option>'; }}
//para a consulta de qual excluir 
$resultTur2 = '';
foreach($turmas as $t){ 
    $resultTur2 .= '<option value="'. $t->id.'">'.$t->turma.'
    </option>'; }

$resultAl = '';
foreach($alunos as $a){ 
    $resultAl .= '<option value="'. $a->idaluno.'">'.$a->nome.'
    </option>'; }

    unset($_GET['status']);
    unset($_GET['pagina']);
    $gets = http_build_query($_GET);

    $paginacao = '';
    $paginas = $obPagination->getPages();
    foreach($paginas as $p){
        $class = $p['atual'] ? 'btn-success' : 'btn-light';
        $paginacao .= '<a href="?pagina='.$p['pagina'].'&'.$gets.'">
                            <button type="button" class="btn '.$class.' ">'.$p['pagina'].'</button>
                       </a>';
    }
?>

<head>
    
</head>
<main>

    <?= $mensagem ?>

    <section>
        <a href="cadastrarOB.php">
            <button class="btn btn-success">Nova observação</button>
        </a>
        
        <a href="cadastrarAL.php">
            <?php   ?>
            <button class="btn btn-primary">Cadastrar um novo aluno/nova turma</button>
        </a>
        <button type="button" id="btnDel" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Excluir Aluno/Turma</button>
    </section>

    <section>
        <form method="get">
            <div class="row my-4">

                <div class="col">
                    <label>Buscar por nome de aluno:</label>
                    <input type="text" name="busca" class="form-control" value="<?= $busca ?>">
                </div>
                <div class="col">
                    <label>Turma</label>
                    <select name="filterStatus" class="form-control">
                        <option value="<?= $turmaSearch !== '' ? $turmaSearch : '' ?>"> <?= $turmaSearch !== '' ? Turma::getTurmaById($turmaSearch)->turma : 'Selecione a Turma que deseja consultar' ?></option>
                        <?php echo $turmaSearch !== '' ? '<option value="">Selecione a Turma que deseja consultar</option>' : null;
                        echo $resultTur; ?>
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>

            </div>
        </form>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Turma</th>
                    <th>Descrição do problema</th>
                    <th>Data do ocorrido</th>
                </tr>
            </thead>
            <tbody>
                <?= $results; ?>
            </tbody>
        </table>
    </section>
    <section>

        <?= $paginacao; ?>

    </section>

</main>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content text-dark">
      
        <section class="text-center mt-3" >
                <strong style="color:red;">Atenção</strong>
            <p >Excluindo uma turma você excluirá todos os alunos que pertencem a ela!</p>
        </section>

        <div class="row">
    
        <div class="col ">
            <form method="post" class="ml-4 mr-2" >
                <div class="form-group">
                    <label>Nome do aluno:</label>
                    <select name='alunoNome' id="alunoSel" class="form-control" required>
                    <option selected>Selecione um aluno para remover </option> 
                        <?= $resultAl; ?>
                    </select>
                </div>
                <a id='link2' href="apagar.php?alunodel=err">
                    <button type="button" class="btn btn-danger mb-3"> Remover esse aluno? </button> 
                </a>
            </form>
        </div>
        <div class="col">
        <form class="ml-2 mr-4">
                <div class="form-group">
                    <label>Nome da turma:</label>
                    <select name='turmaNome'  id="turmaSel" class="form-control" required>
                        <option selected>Selecione uma turma para remover </option> 
                        <?= $resultTur2; ?>
                    </select>
                </div>
                <a id='link' href="apagar.php?turmadel=err">
                    <button type="button" class="btn btn-danger mb-3"> Remover essa turma? </button> 
                </a>
                </div>
            </form>
        </div>
    </div>

    </div>
  </div>
</div>
<script>

    const inputselectTurma = document.getElementById('turmaSel');
    const a = document.querySelector("#link");

    inputselectTurma.onchange = () =>{
        a.href="apagar.php?turmadel="+ inputselectTurma.value;
    }


    const inputselectAluno = document.getElementById('alunoSel');
    const a2 = document.querySelector("#link2");

    inputselectAluno.onchange = () =>{
        a2.href="apagar.php?alunodel="+ inputselectAluno.value;
    }

    

   

</script>