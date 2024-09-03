<?php
include_once './class/URL.php';
$caminho = URL::getBase();
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
                    $p = (Url::getURL(0) != null ? Url::getURL(0) : "pagina-inicial");

                    if (file_exists($p . ".php")) {
                        include_once $p . ".php";
                    } else {
                        include_once "erro404.php";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include_once 'plugins.php'; ?>
    </body>
</html>