<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="pagina-inicial">Projeto PHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>pagina-inicial">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>alunosModal">Alunos Modal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>alunosURL">Alunos URL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>alunosPaginacao">Alunos Paginação</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>equipes">Equipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>apiZika">API Zika</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= $caminho ?>graficoZika">Gráfico Zika</a>
            </li>
        </ul>
    </div>
</nav>