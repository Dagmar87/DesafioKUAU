<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../class/alunos.php';

    $database = new Database();
    $db = $database->getConnection();
    $items = new Aluno($db);
    $stmt = $items->getAlunos();
    $itemCount = $stmt->rowCount();

    echo json_encode($itemCount);
    if($itemCount > 0){
        
        $alunoArr = array();
        $alunoArr["body"] = array();
        $alunoArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "dataDeNascimento" => $dataDeNascimento,
                "turmaID" => $turmaID
            );
            array_push($alunoArr["body"], $e);
        }
        echo json_encode($alunoArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum Registro Encontrado.")
        );
    }
?>