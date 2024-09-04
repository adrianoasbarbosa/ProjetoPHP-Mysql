<?php

include_once 'Conectar.php';

class Passageiro
{

    private $id;
    private $nome;
    private $cpf;
    private $con;

    // Getter and Setter methods
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    // Método para salvar um passageiro
    public function salvar()
    {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO passageiro (nome, cpf) VALUES (?, ?);";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->nome);
            $executar->bindValue(2, $this->cpf);
            return $executar->execute() == 1 ? "Cadastrado" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    // Método para listar passageiros com paginação
    public function paginar($inicio, $total_registros)
    {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM passageiro LIMIT ?, ?";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $inicio, PDO::PARAM_INT);
            $executar->bindValue(2, $total_registros, PDO::PARAM_INT);
            $executar->execute();
            return $executar->fetchAll();
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    // Método para contar o total de registros
    public function contar()
    {
        try {
            $this->con = new Conectar();
            $sql = "SELECT COUNT(*) AS total FROM passageiro";
            $executar = $this->con->prepare($sql);
            $executar->execute();
            $resultado = $executar->fetch();
            return $resultado['total'];
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }
}
