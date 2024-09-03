<?php

include_once 'Conectar.php';

class Equipe {

    private $id;
    private $nome_equipe;
    private $nr_membros;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getNome_equipe() {
        return $this->nome_equipe;
    }

    public function getNr_membros() {
        return $this->nr_membros;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome_equipe($nome_equipe): void {
        $this->nome_equipe = $nome_equipe;
    }

    public function setNr_membros($nr_membros): void {
        $this->nr_membros = $nr_membros;
    }

    public function salvar() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO equipe VALUES (null, ?, ?);";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->nome_equipe);
            $executar->bindValue(2, $this->nr_membros);
            return $executar->execute() == 1 ? "Cadastrado" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_equipe (?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function crud($opcao) {
        try {
            $this->con = new Conectar();
            $sql = "CALL crud_equipe(?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->nome_equipe);
            $executar->bindValue(3, $this->nr_membros);
            $executar->bindValue(4, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }
    
    

//fim do crud
}

//fim da class
