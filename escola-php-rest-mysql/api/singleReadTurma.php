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
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();

    $item->getSingleTurma();
    if($item->nome != null){
        
        $tur_arr = array(
            "id" =>  $item->id,
            "nome" => $item->nome,
            "serie" => $item->serie            
        );
      
        http_response_code(200);
        echo json_encode($tur_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Turma não encontrada.");
    }
?>