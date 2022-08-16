<?php

// Incluir conexao com o banco de dados
include_once './conexao-listar-clientes.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//$id = "10000";

if (!empty($id)) {
    $query_cliente = "SELECT id, nome, cpf, celular, email, senha, vip FROM clientes WHERE   id=:id LIMIT 1";
    $resulta_cliente = $conn->prepare($query_cliente);
    $resulta_cliente->bindParam(':id', $id);
    $resulta_cliente->execute();

    if (($resulta_cliente) and ($resulta_cliente->rowCount() != 0)) {
        $row_cliente = $resulta_cliente->fetch(PDO::FETCH_ASSOC);
        $retorna = ['status' => true, 'dados' => $row_cliente];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>"];
}
echo json_encode($retorna);
