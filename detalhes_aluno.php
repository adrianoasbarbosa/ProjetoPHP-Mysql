<?php
$id = Url::getURL(1);
include_once 'class/Aluno.php';
$al = new Aluno();
$dados = $al->listar($id);

if (!empty($dados)) {
    foreach ($dados as $mostrar) {
        ?>
        <tr>
            <th scope="row"><?= $mostrar['id'] ?></th>
            <td><?= $mostrar['nome'] ?></td>
            <td>
                <img src="<?= $caminho ?>img/alunos/<?= $mostrar['foto'] ?>" alt="<?= $mostrar['nome'] ?>" style="width: 150px;"/>
            </td>
        </tr> 
        <?php
    }
}
