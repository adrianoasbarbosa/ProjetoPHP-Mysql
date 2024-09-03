<?php

/*
 * CREATE VIEW view_equipe_aluno AS
  select e.nome_equipe, a.nome
  FROM equipe_aluno ea
  INNER JOIN equipe e ON ea.fk_equipe_id = e.id
  INNER JOIN aluno a ON ea.fk_aluno_id = a.id
  ORDER BY e.nome_equipe;
 */

include_once 'Conectar.php';

class EquipeAluno {

    private $id_equipe;
    private $id_aluno;
    private $con;

    public function getId_equipe() {
        return $this->id_equipe;
    }

    public function getId_aluno() {
        return $this->id_aluno;
    }

    public function setId_equipe($id_equipe): void {
        $this->id_equipe = $id_equipe;
    }

    public function setId_aluno($id_aluno): void {
        $this->id_aluno = $id_aluno;
    }

    public function salvar() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO equipe_aluno VALUES (?, ?);";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id_equipe);
            $executar->bindValue(2, $this->id_aluno);
            return $executar->execute() == 1 ? "Cadastrado" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function listar() {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM view_equipe_aluno";
            $executar = $this->con->prepare($sql);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function filtrar($nome_equipe) {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM view_equipe_aluno WHERE nome_equipe = ?";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $nome_equipe);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

}
