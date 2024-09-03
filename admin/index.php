<?php
date_default_timezone_set('America/Sao_Paulo');
include_once 'trava.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include_once 'cabecalho.php'; ?>
    </head>
    <body>
        <?php include_once 'navbar.php'; ?>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-12 col-sm-12">
                    <?php
                    $pagina = filter_input(INPUT_GET, 'p');
                    if (empty($pagina) || $pagina == "index") {
                        include_once 'home.php';
                    } else {
                        if (file_exists($pagina . '.php')) {
                            include_once $pagina . '.php';
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Erro 404, página não encontrada!
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include_once 'plugins.php'; ?>
    </body>
</html>