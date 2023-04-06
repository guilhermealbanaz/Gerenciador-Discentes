
<h1 class="display-4 text-center">Importar Dados</h1>

<div class="container mt-5 bg-secondary">
    <div class="row align-items-end">
        <div class="col blockquote text-center">
        Importar alunos
        <form method="post" action="data.php" enctype="multipart/form-data">
            <input style='cursor:pointer;' class="mt-3" type="file" name="archivet">
            <button type="submit" class="form-control btn btn-warning mt-4">
                Importar
            </button>
        </form>
        </div>
        <div class="col blockquote text-center">
        <form method="post" action="data.php" enctype="multipart/form-data">
            Importar turmas
            <input style='cursor:pointer;'class="mt-3" type="file" name="archivea">
            <button type="submit" class="form-control btn btn-warning mt-4">
                Importar
            </button>
        </form>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
    <a href="index.php">
        <button type="button" class="btn btn-primary">Voltar para a página inicial</button>
    </a>
</div>

<hr style="background-color:white">

<div class="clearfix">
  <img src="./includes/img/img-turma.png" style="float:left; margin-right: 30px; margin-bottom: 30px;" alt="Img">

  <p>
    Para fazer o upload de de turmas, você deve criar um arquivo com a extensão .txt, ou seja, abra um bloco de notas e liste o nome de cada turma que deseja cadastrar em cada linha como na imagem ao lado:
  </p>
  <p>
        Depois de escrever os nomes das turmas siga esses passos:
        <ul>
            <li>
                Clique em arquivo e aperte em salvar;
            </li>
            <li>
                Clique em salvar como e selecione um diretório para armazenar esse arquivo;
            </li>
            <li>
                No site clique no botão escolher arquivo e selecione o arquivo no qual você salvou e aperte em <b>Importar</b>;
            </li>
        </ul>
    </p>

</div>

<hr style="background-color:white">

<div class="clearfix">
  <img src="./includes/img/img-aluno.png" style="float:right; margin-left: 30px; margin-bottom: 30px;" alt="Img">

  <p>
    Para fazer o upload de alunos, você deve criar um arquivo com a extensão .txt, ou seja, abra um bloco de notas e liste primeiro o nome da TURMA e separado com uma virgula escreva o nome do ALUNO que deseja cadastrar em cada linha como na imagem ao lado:
    
  </p>
  
    <p>
        <strong>LEMBRANDO: É NECESSÁRIO QUE A TURMA QUE VOCÊ ESCREVER JÁ ESTEJA CADASTRADA, CASO CONTRÁRIO SERÁ GERADO UM ERRO FATAL!</strong>
    </p>
    <p>
        Depois de escrever os nomes das turmas e alunos siga esses passos:
        <ul>
            <li>
                Clique em arquivo e aperte em salvar;
            </li>
            <li>
                Clique em salvar como e selecione um diretório para armazenar esse arquivo;
            </li>
            <li>
                No site clique no botão escolher arquivo e selecione o arquivo no qual você salvou e aperte em <b>Importar</b>;
            </li>
        </ul>
    </p>
</div>

