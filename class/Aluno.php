<?php

include_once 'Conectar.php';
include_once 'Controles.php';

class Aluno {

    private $id;
    private $nome;
    private $email;
    private $foto;
    private $temp_foto;
    private $con;
    private $ct;
    private $caminho = "../img/alunos/";

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getTemp_foto() {
        return $this->temp_foto;
    }

    public function setFoto($foto): void {
        $this->foto = $foto;
    }

    public function setTemp_foto($temp_foto): void {
        $this->temp_foto = $temp_foto;
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            $sql = "CALL listar_aluno (?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function paginar($inicio, $total_registros) {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM aluno LIMIT $inicio,$total_registros";
            $executar = $this->con->prepare($sql);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function contar() {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM view_contar_aluno";
            $executar = $this->con->prepare($sql);
            return $executar->execute() == 1 ? $executar->fetchColumn() : 0;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function crud($opcao) {
        try {
            $this->con = new Conectar();
            $sql = "CALL crud_aluno(?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->nome);
            $executar->bindValue(3, $this->email);
            $executar->bindValue(4, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function inserir() {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO aluno VALUES(NULL, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->nome);
            $executar->bindValue(2, $this->email);
            $executar->bindValue(3, $this->foto);
            return $executar->execute() == 1 ? "Inserir ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

//fim do crud

    public function enviarArquivos() {
        $this->ct = new Controles();
        return $this->ct->enviarArquivo($this->temp_foto, $this->caminho . $this->foto, "Foto aluno");
    }

}

//fim da class
