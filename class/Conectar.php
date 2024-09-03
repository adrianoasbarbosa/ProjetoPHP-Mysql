<?php

class Conectar extends PDO
{
    private static $instancia;
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $db = "3ds";

    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->db", $this->usuario, $this->senha);
    }

    public static function getInstance()
    {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new Conectar();
            } catch (Exception $e) {
                echo 'Erro ao conectar: ' . $e->getMessage();
                exit();
            }
        }
        return self::$instancia;
    }

    public function sql($query)
    {
        try {
            $pdo = self::getInstance();
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
