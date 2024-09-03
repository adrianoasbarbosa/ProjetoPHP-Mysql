<?php

/*
 * CREATE TABLE produto (
  id int AUTO_INCREMENT PRIMARY KEY,
  nome varchar(50),
  estoque int,
  valor_unit decimal(10,2),
  id_categoria int,
  FOREIGN KEY (id_categoria) REFERENCES categoria (id)
  );
 * 
 * DELIMITER && 
  CREATE PROCEDURE crud_produto (IN var_id INT, var_nome VARCHAR(50), var_estoque INT, var_valor_unit decimal(10,2), var_id_categoria INT, opcao int)
  BEGIN
  IF (EXISTS(SELECT id FROM produto WHERE id = var_id)) THEN
  IF (opcao = 1) THEN
  UPDATE produto SET nome = var_nome, estoque = var_estoque, valor_unit = var_valor_unit, id_categoria = var_id_categoria WHERE id = var_id;
  ELSE
  DELETE FROM produto WHERE id = var_id;
  END IF;
  ELSE
  INSERT INTO produto VALUES (var_id, var_nome, var_estoque, var_valor_unit, var_id_categoria);
  END IF;
  END
  &&
 */

include_once 'Conectar.php';

class Produto {

    private $id;
    private $nome;
    private $estoque;
    private $valor_unit;
    private $id_categoria;
    private $con;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function getValor_unit() {
        return $this->valor_unit;
    }

    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEstoque($estoque): void {
        $this->estoque = $estoque;
    }

    public function setValor_unit($valor_unit): void {
        $this->valor_unit = $valor_unit;
    }

    public function setId_categoria($id_categoria): void {
        $this->id_categoria = $id_categoria;
    }

    public function listar($id) {
        try {
            $this->con = new Conectar();
            //$sql = "CALL listar_categoria (?)";
            $sql = "SELECT * FROM view_Produto;";
            $executar = $this->con->prepare($sql);
            //$executar->bindValue(1, $id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

    public function crud($opcao) {
        try {
            $this->con = new Conectar();
            $sql = "CALL crud_produto(?, ?, ?, ?, ?, ?)";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, $this->nome);
            $executar->bindValue(3, $this->estoque);
            $executar->bindValue(4, $this->valor_unit);
            $executar->bindValue(5, $this->id_categoria);
            $executar->bindValue(6, $opcao);
            return $executar->execute() == 1 ? "Procedimento ok" : "Erro";
        } catch (PDOException $e) {
            echo "Erro de bd " . $e->getMessage();
        }
    }

//fim do crud
}

//fim da class
