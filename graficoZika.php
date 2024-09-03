<h3>Gráfico Zika</h3>
<div class="alert alert-primary" role="alert">
    <p class="mb-0">Documentação Google Charts (disponível <a href="https://developers.google.com/chart/interactive/docs/gallery?hl=pt-br" title="Google Charts" target="_blank">aqui</a>).</p>
    <hr>
    <div id="grafico" style="width: 100%; height: 500px"></div>
    <hr>
    <p class="mb-0">Dados atualizados diretamente da API Zika (disponível <a href="https://info.dengue.mat.br/services/api" title="API Zika" target="_blank">aqui</a>).</p>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/script.js" type="text/javascript"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Semana epidemiológica', 'Casos', {
                role: 'annotation'
            }],
            <?php
            include_once 'class/Zika.php';
            $z = new Zika();
            $listar = $z->listar();

            if (!empty($listar)) {
                foreach ($listar as $mostrar) {
                    echo '["' . $mostrar->SE . '", ' . $mostrar->casos . ', "' . $mostrar->casos . '"],';
                }
            }
            ?>
        ]);

        var options = {
            title: 'Casos por Semana',
            legend: {
                position: 'bottom'
            },
            annotations: {
                alwaysOutside: true
            },
        };

        var chart = new google.visualization.BarChart(document.getElementById('grafico'));
        chart.draw(data, options);
    }
</script>