<?php

include_once("conexao-listar-produtos.php");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//$id = "";
if (!empty($id)) {
    $query_cliente = "DELETE FROM clientes WHERE id=:id";
    $result_cliente = $conn->prepare($query_cliente);
    $result_cliente->bindParam(":id", $id, PDO::PARAM_INT);

    if ($result_cliente->execute()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Dados do cliente apagado com sucesso</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao apagar os dados do cliente</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao apagar os dados do cliente</div>"];
}

echo json_encode($retorna);