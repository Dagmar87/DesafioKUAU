<?php
    class Turma {

        private $conn;

        private $db_table = "Turma";

        public $id;
        public $nome;
        public $serie;

        public function __construct($db){
            $this->conn = $db;
        }

        // Listagem de turmas
        public function getTurmas(){
            $sqlQuery = "SELECT id, nome, serie FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // Cadastro de turmas
        public function createTurma(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        serie = :serie";
        
            $stmt = $this->conn->prepare($sqlQuery);        
            
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->serie=htmlspecialchars(strip_tags($this->serie));          
            
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":serie", $this->serie);            
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // Atualização de turmas
        public function updateTurma(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        serie = :serie                        
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->serie=htmlspecialchars(strip_tags($this->serie));            
            $this->id=htmlspecialchars(strip_tags($this->id));        
            
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":serie", $this->serie);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // Exclusão de turmas
        function deleteTurma(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // Lista Apenas uma Turma
        public function getSingleTurma(){
            $sqlQuery = "SELECT
                        id, 
                        nome, 
                        serie                        
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nome = $dataRow['nome'];
            $this->serie = $dataRow['serie'];            
        }        

    }
?>