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
    
    if($item->deleteTurma()){
        echo json_encode("Turma excluída.");
    } else{
        echo json_encode("Os dados não puderam ser excluídos.");
    }
?>