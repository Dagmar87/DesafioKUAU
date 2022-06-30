<?php
    class Aluno {

        private $conn;

        public $id;
        public $nome;
        public $email;
        public $dataDeNascimento;
        public $turmaID;

        private $db_table = "Aluno";

        public function __construct($db){
            $this->conn = $db;
        }

        // Cadastro de alunos
        public function createAluno(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        email = :email,                         
                        dataDeNascimento = :dataDeNascimento,
                        turmaID = :turmaID";                       
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->email=htmlspecialchars(strip_tags($this->email));             
            $this->dataDeNascimento=htmlspecialchars(strip_tags($this->dataDeNascimento));
            $this->turmaID=htmlspecialchars(strip_tags($this->turmaID)); 
            
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":dataDeNascimento", $this->dataDeNascimento);  
            $stmt->bindParam(":turmaID", $this->turmaID);                         
        
            if($stmt->execute()){
                return true;
             }
            return false;
        }

        // Atualização de alunos
        public function updateAluno(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nome = :nome, 
                        email = :email, 
                        dataDeNascimento = :dataDeNascimento                                              
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->dataDeNascimento=htmlspecialchars(strip_tags($this->dataDeNascimento));        
            $this->id=htmlspecialchars(strip_tags($this->id));  
            
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":dataDeNascimento", $this->dataDeNascimento);
            $stmt->bindParam(":id", $this->id);
            
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // Exclusão de alunos
        function deleteAluno(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

        // Listagem de alunos da turma
        public function getAlunosByTurma(){
            $sqlQuery = "SELECT                         
                        nome, 
                        email, 
                        dataDeNascimento, 
                        turmaID
                      FROM
                        ". $this->db_table ."
                    WHERE 
                        turmaID = ?";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->turmaID);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nome = $dataRow['nome'];
            $this->email = $dataRow['email'];
            $this->dataDeNascimento = $dataRow['dataDeNascimento'];            
        }

        // Listagem de alunos da escola
        public function getAlunos(){
            $sqlQuery = "SELECT id, nome, email, dataDeNascimento, turmaID FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
    }    

?>