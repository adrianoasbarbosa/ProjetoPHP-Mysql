<?php

/*
 * CREATE TABLE usuario(
  id int PRIMARY KEY AUTO_INCREMENT,
  email varchar(100),
  senha varchar(100)
  );
 */
include_once 'Conectar.php';

class Usuario {

    private $email;
    private $senha;
    private $con;

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function consultar() {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM usuario where email = ? AND senha = ?";
            $ligacao = $this->con->prepare($sql);
            $ligacao->bindValue(1, $this->email);
            $ligacao->bindValue(2, sha1($this->senha));

            return $ligacao->execute() == 1 ? $ligacao->fetchAll() : false;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
