<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/alunos.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Aluno($db);
    $item->turmaID = isset($_GET['turmaID']) ? $_GET['turmaID'] : die();

    $item->getAlunosByTurma();
    if($item->nome != null){
        
        $alu_arr = array(            
            "nome" => $item->nome,
            "email" => $item->email,
            "dataDeNascimento" => $item->dataDeNascimento,
            "turmaID" => $item->turmaID
        );
      
        http_response_code(200);
        echo json_encode($alu_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Aluno não encontrado.");
    }
?>