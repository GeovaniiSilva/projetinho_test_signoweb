<?php

class Connection{
    //Classe Connection que é responsável por fazer a conexão com o banco de dados


    private $host = "localhost";
    private $username = "root";
    private $password = "godlove22";
    private $database = "test_signoweb";
    private $conn = null;
    public function get_connection(){
        
        try{
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connection failed ". $e->getMessage();
        }
        return $this->conn;
    }

    public function __destruct(){
        $this->conn = null;
    }
}