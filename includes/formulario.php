
    
<?php

use App\Entity\Turma;
use App\Entity\Aluno;
?>

<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form method="post">

        <div class="form-group">
            <label>Turma</label>
            <select name='turma' id="turmas" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option value='<?= $observe->idturmaaluno  ?>'><?php if($observe->idturmaaluno !== null){    
                 $t = Turma::getTurmaById($observe->idturmaaluno);
                 echo $t->turma;
                } else{
                    echo 'Selecione uma turma';
                }
                 ?></option>
                <?php 
                    if(count($turmas)>1){
                        foreach ($turmas as $turma) {
                            if($turma->id != $observe->idturmaaluno){
                            ?> 
                            
                            <option value="<?= $turma->id; ?>"><?= $turma->turma; ?></option><?php
                            }
                            }
                    }else{
                        echo '<p>Não há turmas</p>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Aluno</label>
            <select name='nome' id="nomes" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option value='<?= $observe->idaluno ?>' ><?php 
                    if($observe->idaluno !== null){
                    $a = Aluno::getAlunoById($observe->idaluno);
                    echo $a->nome;
                   } else{
                       echo 'Selecione um aluno';
                   }
                ?></option>
                <?php 
                    if($alunos){
                        foreach ($alunos as $aluno) {
                            ?> 
                            <option value="<?= $aluno->idaluno; ?>"><?= $aluno->nome; ?></option><?php
                            }
                    }else{
                        ?><option selected>não há alunos!</option><?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="5"><?= $observe->descricao ?></textarea>
        </div>
        <div class="form-group">
            <label>Data</label>
            <input type="date" class="form-control" name="data" value="<?= $observe->data ?>">
        </div>

        <div class="form-group">
            <button class="btn btn-success">Enviar observação</button>
        </div>
    </form>
    
<script src="./js/main.js"></script>

</main>