<?php
$id = filter_input(INPUT_GET, 'id');

include_once '../class/Categoria.php';
$cat = new Categoria();
$titulo = "Cadastrar";
if(isset($id)){
    $cat->setId($id);
    $dados = $cat->listar($id);
    foreach ($dados as $mostrar) {
        $nome = $mostrar['nome'];
        $descricao = $mostrar['descricao'];
    }
    $titulo = "Editar";
}

?>
<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        <?= $titulo ?> Categoria  
    </h3>  
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Nome
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Digite seu nome" maxlength="50" minlength="3" value="<?= isset($id) ? $nome : "" ?>" />
                </div>
            </div>           

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-12">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="txtdescricao" placeholder="Sua descrição aqui"><?= isset($id) ? $descricao : "" ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" 
                           class="btn btn-<?= isset($id) ? "success" : "primary" ?> m-3" 
                           name="<?= isset($id) ? "btneditar" : "btnsalvar" ?>" 
                           id="<?= isset($id) ? "btneditar" : "btnsalvar" ?>" 
                           value="<?= isset($id) ? "Editar" : "Salvar" ?>" />
                    <a class="btn btn-danger" href="?p=categoria/listar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>            
        </form>
    </div>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $descricao = filter_input(INPUT_POST, 'txtdescricao');

    $cat->setId(null);
    $cat->setNome($nome);
    $cat->setDescricao($descricao);

    echo '<div class="alert alert-primary mt-3" role="alert">'
    //. $cat->salvar()
    . $cat->crud(0)
    . '</div>';
}
if (filter_input(INPUT_POST, 'btneditar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $descricao = filter_input(INPUT_POST, 'txtdescricao');

    $cat->setNome($nome);
    $cat->setDescricao($descricao);

    echo '<div class="alert alert-primary mt-3" role="alert">'
    //. $cat->salvar()
    . $cat->crud(1)
    . '</div>';
}
