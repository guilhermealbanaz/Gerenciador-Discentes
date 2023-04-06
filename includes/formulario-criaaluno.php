<?php 
    $results = '';
    foreach ($turmas as $turma) {
        $results .= '<option value='.$turma->id.'>'.$turma->turma.'</option>';
        }
    $results = strlen($results) ? $results : "<option>Não há turmas cadastradas!</option>";
?>

<div class='jumbotron text-dark'>
        <a href="index.php">
            <button class="mb-3 btn btn-success">Voltar</button>
        </a>
        
    <div class="row">
    
        <div class="col">
            <form method="post">
                <h2>Cadastro de Alunos:</h2>
                <div class="form-group">
                    <label>Nome do aluno:</label>
                    <input type="text" name='nome' class="form-control" required>
                </div>
                <div class="form-group">
                <label>Turma</label>
                    <select name='turma' class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Selecione uma turma</option>
                        <?= $results; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="acao" value='cadastrar' class="btn btn-primary">Criar aluno</button>
                </div>
            </form>
        </div>
        <div class="col">
        <form method="post">
                <h2>Cadastro de Turmas:</h2>
                <div class="form-group">
                    <label>Nome da turma:</label>
                    <input type="text" name='turma' class="form-control" required>
                </div>
                    <button type="submit" name="acao" value='cadastrar-turma' class="btn btn-primary">Criar turma</button>
                </div>
            </form>
        </div>
    </div>
</div>