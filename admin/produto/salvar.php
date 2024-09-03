<?php
$id = filter_input(INPUT_GET, 'id');

include_once '../class/Produto.php';
$prod = new Produto();
$titulo = "Cadastrar";
?>
<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        <?= $titulo ?> Produto  
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
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Digite seu nome" maxlength="50" minlength="3" value="" />
                </div>
            </div>           
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Estoque
                </label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="txtestoque" name="txtestoque" max="200" min="0" value="" />
                </div>
            </div>           
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Valor unitário
                </label>
                <div class="col-sm-12">
                    <input type="number" step="0.5" class="form-control" id="txtvalor" name="txtvalor" max="10000" min="0" value="" />
                </div>
            </div>    

            <?php
            include_once '../class/Categoria.php';
            $cat = new Categoria();
            $dadosCat = $cat->listar(NULL);
            ?>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="exampleFormControlSelect1">Escolha a categoria</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="selcategoria">
                        <option selected disabled>Lista de categorias</option>
                        <?php
                        if (!empty($dadosCat)) {
                            foreach ($dadosCat as $mostrar) {
                                echo '<option value=""></option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" 
                           class="btn btn-primary m-3" 
                           name="btnsalvar" 
                           id="btnsalvar" 
                           value="Salvar" />
                    <a class="btn btn-danger" href="?p=produto/listar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>            
        </form>
    </div>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $estoque = filter_input(INPUT_POST, 'txtestoque');
    $valor = filter_input(INPUT_POST, 'txtvalor');
    $id_categoria = filter_input(INPUT_POST, 'selcategoria');

    $prod->setId(null);
    $prod->setNome(mb_strtoupper($nome));
    $prod->setEstoque($estoque);
    $prod->setValor_unit($valor);
    $prod->setId_categoria($id_categoria);

    echo '<div class="alert alert-primary mt-3" role="alert">'
    //. $cat->salvar()
    . $prod->crud(0)
    . '</div>';
}
    