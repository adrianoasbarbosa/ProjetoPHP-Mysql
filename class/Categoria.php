<?php

/*
 * CREATE TABLE categoria (
  id int PRIMARY KEY AUTO_INCREMENT,
  nome varchar(50),
  descricao text
  );
 */

include_once 'Conectar.php';

class Categoria {

    private $id;
    private $nome;
    private $descricao;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function salvar() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO categoria VALUES (null, ?, ?);";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->nome);
            $executar->bindValue(2, $this->descricao);
            return $executar->execute() == 1 ? "Cadastrado" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_categoria (?)";
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
            $sql = "CALL crud_categoria(?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->nome);
            $executar->bindValue(3, $this->descricao);
            $executar->bindValue(4, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }//fim do crud

}//fim da class
