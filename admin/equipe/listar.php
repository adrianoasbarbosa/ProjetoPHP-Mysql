<h3>Lista de Passageiros</h3>
<a class="btn btn-outline-primary float-right" href="?p=passageiro/salvar">Add</a>
<br><br>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once '../class/Passageiro.php';
        $passageiro = new Passageiro();
        $dados = $passageiro->listar(NULL);

        if (!empty($dados)) {
            foreach ($dados as $mostrar) {
        ?>
                <tr>
                    <th scope="row"><?= $mostrar['id'] ?></th>
                    <td><?= $mostrar['nome'] ?></td>
                    <td><?= $mostrar['cpf'] ?></td>
                    <td>
                        <a href="" class="btn btn-primary" title="editar registro">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="" class="btn btn-danger" data-confirm="Excluir registro?" title="excluir registro">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>