<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../class/turmas.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Turma($db);
    $stmt = $items->getTurmas();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        
        $turmaArr = array();
        $turmaArr["body"] = array();
        $turmaArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nome" => $nome,
                "serie" => $serie
            );
            array_push($turmaArr["body"], $e);
        }
        echo json_encode($turmaArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum Registro Encontrado.")
        );
    }
?>