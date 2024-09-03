<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        Cadastrar Equipe  
    </h3>  
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <div class="form-group">
                <label for="inputText" class="col-sm-2 col-form-label">
                    Nome Equipe
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Digite seu nome" maxlength="50" minlength="3" />
                </div>
            </div>    

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary m-3" name="btnsalvar" id="btnsalvar" value="Salvar" />
                    <a class="btn btn-danger" href="?p=equipe/listar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>            
        </form>
    </div>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');

    include_once '../class/Equipe.php';
    $eq = new Equipe();

    $eq->setId(null);
    $eq->setNome_equipe($nome);
    //inicia a equipe com nenhum membro
    $eq->setNr_membros(0);

    echo '<div class="alert alert-primary mt-3" role="alert">'
    //. $cat->salvar()
    . $eq->crud(0)
    . '</div>';
}
