<div class="col-md-6 col-sm-12">
    <h3>Zika API (ITU-SP)</h3>
</div>

<table class="table mt-4">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Semana epidemiológica</th>
            <th scope="col">Número de casos notificados por semana</th>
            <th scope="col">Evidência de transmissão sustentada</th>
            <th scope="col">Nível de alerta</th>
        </tr>
    </thead>
    <tbody>

        <?php
        include_once 'class/Zika.php';
        $z = new Zika();
        $listar = $z->listar();

        if (!empty($listar)) {
            foreach ($listar as $mostrar) {
        ?>
                <tr>
                    <td><?= $mostrar->SE ?></td>
                    <td><?= $mostrar->casos ?></td>
                    <td><?= $mostrar->transmissao ?></td>
                    <td><?= $mostrar->nivel ?></td>
                </tr>
        <?php
            }
        }
        ?>


    </tbody>
</table>