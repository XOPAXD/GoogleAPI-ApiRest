<?php


class DataBase 
{
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $database = "csc";
    private $port 	  = 3306;
    private $conexao  = null; 

    public function __construct()
    {          
        $this->conect();
    }

    public function getConection()
    {
        return $this->conexao;
    }

    private function conect() 
    {
        $this->conexao = mysqli_connect(
                  $this->host, 
                  $this->username, 
                  $this->password, 
                  $this->database,
                  $this->port);
    }
}