<h3>Lista de Alunos - GET via URL</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th>Ver detalhes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'class/Aluno.php';
        $al = new Aluno();
        $dados = $al->listar(NULL);

        if (!empty($dados)) {
            foreach ($dados as $mostrar) {
                ?>
                <tr>
                    <th scope="row"><?= $mostrar['id'] ?></th>
                    <td><?= $mostrar['nome'] ?></td>
                    <td>
                        <a href="detalhes_aluno/<?= $mostrar['id'] ?>" class="btn btn-primary" title="editar registro">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                </tr> 
                <?php
            }
        }
        ?>
    </tbody>
</table>
