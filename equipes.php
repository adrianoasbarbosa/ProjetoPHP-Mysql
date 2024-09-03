<h3>Equipes</h3>

<?php
include_once 'class/Equipe.php';
$eq = new Equipe();
$dados = $eq->listar(NULL);
include_once 'class/EquipeAluno.php';

if (!empty($dados)) {
    $i = 0;

    foreach ($dados as $mostrar) {
        $i++;
        ?>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading<?= $i ?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
                            <?= $mostrar[1] ?>
                        </button>
                    </h5>
                </div>

                <div id="collapse<?= $i ?>" class="collapse hide" aria-labelledby="heading<?= $i ?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <?php
                            $ea = new EquipeAluno();
                            $dados2 = $ea->filtrar($mostrar[1]);
                            if (!empty($dados2)) {
                                foreach ($dados2 as $mostrar2) {
                                    echo "<li>" . $mostrar2[1] . "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
