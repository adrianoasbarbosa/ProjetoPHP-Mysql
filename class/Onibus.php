<?php

include_once 'Conectar.php';

class Onibus
{

    private $id;
    private $placa;
    private $modelo;
    private $con;

    // Getter and Setter methods
    public function getId()
    {
        return $this->id;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setPlaca($placa): void
    {
        $this->placa = $placa;
    }

    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    // Método para salvar um ônibus
    public function salvar()
    {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO onibus (placa, modelo) VALUES (?, ?);";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->placa);
            $executar->bindValue(2, $this->modelo);
            return $executar->execute() == 1 ? "Cadastrado" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    // Método para listar ônibus com paginação
    public function paginar($inicio, $total_registros)
    {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM onibus LIMIT ?, ?";
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
            $sql = "SELECT COUNT(*) AS total FROM onibus";
            $executar = $this->con->prepare($sql);
            $executar->execute();
            $resultado = $executar->fetch();
            return $resultado['total'];
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }
}
