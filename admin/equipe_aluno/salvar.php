<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        Cadastrar Aluno em equipe  
    </h3>  
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <?php
            include_once '../class/Equipe.php';
            $e = new Equipe();
            $dadosEquipe = $e->listar(NULL);
            ?>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="exampleFormControlSelect1">Escolha a equipe</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="selequipe">
                        <option selected disabled>Lista de equipes</option>
                        <?php
                        if (!empty($dadosEquipe)) {
                            foreach ($dadosEquipe as $mostrar) {
                                echo "<option value='$mostrar[0]'>$mostrar[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>  
            
            <?php
            include_once '../class/Aluno.php';
            $a = new Aluno();
            $dadosAluno = $a->listar(NULL);
            ?>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="exampleFormControlSelect1">Escolha o aluno</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="selaluno">
                        <option selected disabled>Lista de alunos</option>
                        <?php
                        if (!empty($dadosAluno)) {
                            foreach ($dadosAluno as $mostrar) {
                                echo "<option value='$mostrar[0]'>$mostrar[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>               

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary m-3" name="btnsalvar" id="btnsalvar" value="Salvar" />
                    <a class="btn btn-danger" href="?p=equipe_aluno/listar"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>            
        </form>
    </div>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $equipe = filter_input(INPUT_POST, 'selequipe');
    $aluno = filter_input(INPUT_POST, 'selaluno');

    include_once '../class/EquipeAluno.php';
    $ea = new EquipeAluno();

    $ea->setId_aluno($aluno);
    $ea->setId_equipe($equipe);

    echo '<div class="alert alert-primary mt-3" role="alert">'
    //. $cat->salvar()
    . $ea->salvar()
    . '</div>';
    
    echo '<meta http-equiv="refresh" content="0.1;URL=?p=equipe_aluno/listar">';
    
}


