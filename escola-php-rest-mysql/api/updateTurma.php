<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");    
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/turmas.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Turma($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    $item->nome = $data->nome;
    $item->serie = $data->serie;    
    
    if($item->updateTurma()){
        echo json_encode("Dados da turma atualizadas.");
    } else{
        echo json_encode("Não foi possível atualizar os dados.");
    }
?>