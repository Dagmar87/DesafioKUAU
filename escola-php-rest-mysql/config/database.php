<?php 
    class Database {
        private $host = "127.0.0.1";
        private $database_name = "escoladb";
        private $username = "root";
        private $password = "password";
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Não foi possível conectar o banco de dados: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>