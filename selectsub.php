<?php 

use App\Entity\Aluno;

require __DIR__ . '/vendor/autoload.php';

$turmaselecionada = $_GET['turma'];
$alunosporturma = Aluno::getAlunos('idturma ='.$turmaselecionada);

foreach($alunosporturma as $alunodaturma){
    ?> 
        <option value="<?php echo $alunodaturma->idaluno?>"><?php echo $alunodaturma->nome?></option>
        <?php
    }