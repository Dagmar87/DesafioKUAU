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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->nome = $data->nome;
    $item->email = $data->email;
    $item->dataDeNascimento = date('Y-m-d', $timestamp);
    $item->turmaID = $data->turmaID;
    
    if($item->createAluno()){
        echo 'Aluno criado com sucesso.';
    } else{
        echo 'O aluno não pôde ser criado.';
    }
?>