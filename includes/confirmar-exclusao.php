<main>

    <h2 class="mt-3">Excluir Observação</h2>

    <form method="post">

        <div class="form-group">
            <p>Você deseja realmente excluir a observação que cadastrou no dia: <strong><?= date('d/m/Y', strtotime($observe->data)) ?></strong> do aluno: <strong><?= $observe->idaluno ?></strong> </p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type='submit' name='excluir' class="btn btn-danger">Excluir observação</button>
        </div>
    </form>
</main>