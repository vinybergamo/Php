<?php

include_once("./conexao-listar-clientes.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['id'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Tente mais tarde</div>"];
} elseif (empty($dados['nome'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo Nome!</div>"];
} elseif (empty($dados['cpf'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo CPF!</div>"];
} elseif (empty($dados['celular'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo Celular!</div>"];
} elseif (empty($dados['email'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo Email!</div>"];
} elseif (empty($dados['senha'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Necessário preencher o campo Senha!</div>"];
} else {
    $query_cliente = "UPDATE clientes SET nome=:nome, cpf=:cpf, celular=:celular, email=:email, senha=:senha, vip=:vip WHERE id=:id";
    $edit_cliente = $conn->prepare($query_cliente);
    $edit_cliente->bindParam(':nome', $dados['nome']);
    $edit_cliente->bindParam(':cpf', $dados['cpf']);
    $edit_cliente->bindParam(':celular', $dados['celular']);
    $edit_cliente->bindParam(':email', $dados['email']);
    $edit_cliente->bindParam(':senha', $dados['senha']);
    $edit_cliente->bindParam(':vip', $dados['vip']);
    $edit_cliente->bindParam(':id', $dados['id']);

    if ($edit_cliente->execute()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Dados do cliente editado com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao editar os dados do cliente</div>"];
    }
}

echo json_encode($retorna);
