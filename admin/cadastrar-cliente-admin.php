<?php

include_once("conexao-listar-produtos.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados{
'nome'})) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados{
'cpf'})) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo CPF!</div>"];
} elseif (empty($dados{
'celular'})) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo celular!</div>"];
} elseif (empty($dados{
'email'})) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
} elseif (empty($dados{
'senha'})) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>"];
} else {
    $query_cliente = "INSERT INTO clientes (nome, cpf, celular, email, senha) VALUES (:nome, :cpf, :celular, :email, :senha)";
    $cad_cliente = $conn->prepare($query_cliente);
    $cad_cliente->bindParam(':nome', $dados['nome']);
    $cad_cliente->bindParam(':cpf', $dados['cpf']);
    $cad_cliente->bindParam(':celular', $dados['celular']);
    $cad_cliente->bindParam(':email', $dados['email']);
    $cad_cliente->bindParam(':senha', $dados['senha']);

    $cad_cliente->execute();

    if($cad_cliente->rowCount()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Cliente cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao cadastrar o cliente, verique todas as informaçôes e tente novamente!</div>"];
    }
}

echo json_encode($retorna);
