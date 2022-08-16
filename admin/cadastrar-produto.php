<?php

/*include_once("conexao-listar-produtos.php");
$nome_image=$_FILES['imagem']['name'];


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados{
'nome'})) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} else {
    $query_produto = "INSERT INTO produtos (nome, descricao, preco, precovip, estoque, vip, categoria, custo) VALUES (:nome, :descricao, :preco, :precovip, :estoque, :vip, :categoria, :custo)";
    $cad_produto = $conn->prepare($query_produto);
    $cad_produto->bindParam(':nome', $dados['nome']);
    $cad_produto->bindParam(':descricao', $dados['descricao']);
    $cad_produto->bindParam(':preco', $dados['preco']);
    $cad_produto->bindParam(':precovip', $dados['precovip']);
    $cad_produto->bindParam(':estoque', $dados['estoque']);
    $cad_produto->bindParam(':vip', $dados['vip']);
    $cad_produto->bindParam(':categoria', $dados['categoria']);
    $cad_produto->bindParam(':custo', $dados['custo']);







    $cad_produto->execute();
    if($cad_produto->rowCount()){
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Produto cadastrado com sucesso!</div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao cadastrar produto, verique todas as informaçôes e tente novamente!</div>"];
    }
}

echo json_encode($retorna);*/

