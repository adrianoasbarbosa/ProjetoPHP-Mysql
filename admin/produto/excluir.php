<?php
$id = filter_input(INPUT_GET, 'id');

include_once '../class/Categoria.php';
$cat = new Categoria();

$cat->setId($id);
$cat->crud(0);
?>

<meta http-equiv="refresh" content="0.1;URL=?p=categoria/listar">



