<h3>Lista de Ônibus - Paginação</h3>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Placa</th>
            <th scope="col">Modelo</th>
            <th>Ver detalhes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once 'class/Onibus.php';
        $onibus = new Onibus();
        $pagina = Url::getURL(1);

        $pc = !$pagina ? 1 : $pagina;

        $total_registros = 2; // Número de registros por página
        $inicio = $pc - 1;
        $inicio = $inicio * $total_registros;

        $todos_registros = $onibus->contar();

        $total_paginas = ceil($todos_registros / $total_registros);

        $dadosPaginacao = $onibus->paginar($inicio, $total_registros);

        if (!empty($dadosPaginacao)) {
            foreach ($dadosPaginacao as $i => $mostrar) {
        ?>
                <tr>
                    <th scope="row"><?= $mostrar['id'] ?></th>
                    <td><?= $mostrar['placa'] ?></td>
                    <td><?= $mostrar['modelo'] ?></td>
                    <td>
                        <!-- Botão para acionar modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $i ?>">
                            Detalhes
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Placa: <?= $mostrar['placa'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Modelo: <?= $mostrar['modelo'] ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<?php
// agora vamos criar os botões "Anterior e próximo"
$anterior = $pc - 1;
$proximo = $pc + 1;
?>

<nav aria-label="Navegação de página exemplo">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <?php
            if ($pc > 1) {
                echo '<a class="page-link" href="' . $caminho . 'onibusPaginacao/' . $anterior . '" tabindex="-1">Anterior</a>';
            }
            ?>
        </li>
        <?php
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo '<li class="page-item"><a class="page-link" href="' . $caminho . 'onibusPaginacao/' . $i . '">' . $i . '</a></li>';
        }
        ?>
        <li class="page-item">
            <?php
            if ($pc < $total_paginas) {
                echo '<a class="page-link" href="' . $caminho . 'onibusPaginacao/' . $proximo . '" tabindex="-1">Próximo</a>';
            }
            ?>
        </li>
    </ul>
</nav>