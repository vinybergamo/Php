<?php

//inclcuir a conexão com o banco de dados
include_once("./conexao-listar-produtos.php");

//receber os dados da requisição
$dados_requisicao = $_REQUEST;

// Lida de coluna na tabela

$colunas = [
    0 => 'id',
    1 => 'nome',
    2 => 'descricao',
    3 => 'preco',
    4 => 'precovip',
    5 => 'estoque',
    6 => 'vip',
    7 => 'images',
    8 => 'categoria',
    9 => 'custo',
    10 => 'criado'
];

// Obter a quantidade de registro no banco de dados
$query_qntd_produtos = "SELECT COUNT(id) as qntd_produtos FROM produtos";

// Acessa o IF quando há parametros de pesquisa
if(!empty($dados_requisicao['search']['value'])){
    $query_qntd_produtos .= " WHERE id LIKE :id ";
    $query_qntd_produtos .= " OR nome LIKE :nome ";
    $query_qntd_produtos .= " OR categoria LIKE :categoria ";
}
// Preparar QUERY
$resulta_qntd_produtos = $conn->prepare($query_qntd_produtos);
// Acessa o IF quando ha paramentros de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $resulta_qntd_produtos->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $resulta_qntd_produtos->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $resulta_qntd_produtos->bindParam(':categoria', $valor_pesq, PDO::PARAM_STR);
}

$resulta_qntd_produtos->execute();
$row_qntd_produtos = $resulta_qntd_produtos->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qntd_produtos);


$query_produtos = "SELECT id, nome, preco, precovip, estoque, vip, categoria, criado
                    FROM produtos ";

// Acessa o IF quando há parametros de pesquisa
if(!empty($dados_requisicao['search']['value'])){
    $query_produtos .= " WHERE id LIKE :id ";
    $query_produtos .= " OR nome LIKE :nome ";
    $query_produtos .= " OR categoria LIKE :categoria ";
}

$query_produtos .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

$resulta_produtos = $conn->prepare($query_produtos);
$resulta_produtos->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$resulta_produtos->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

// Acessa o IF quando ha paramentros de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $resulta_produtos->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $resulta_produtos->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $resulta_produtos->bindParam(':categoria', $valor_pesq, PDO::PARAM_STR);
}


//executar a query
$resulta_produtos->execute();

while ($row_ciente = $resulta_produtos->fetch(PDO::FETCH_ASSOC)) {
    //var_dump($row_ciente);
    extract($row_ciente);
    $registro = [];
    $registro[] = $id;
    $registro[] = $nome;
    $registro[] = $preco;
    $registro[] = $precovip;
    $registro[] = $estoque;
    $registro[] = $categoria;
    $registro[] = $vip;
    $registro[] = "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#upimg'>
    <i class='bi bi-camera'></i>
  </button>";
    $dados_produtos[] = $registro;
}

//var_dump($dados_produtos);

//Criar o array de informações a serem retornadas para o javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), //Para cada requisição é enviado um membro como paramentro
    "recordsTotal" => intval($row_qntd_produtos['qntd_produtos']), //Quantidade de registros que há no banco de dados
    "recordsFilteerd" => intval($row_qntd_produtos['qntd_produtos']), // Total de registros quando houver pesquisa
    "data" => $dados_produtos // Array de dados com os registros retornados da tabela de produtos
];

//var_dump($resultado);

//Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);
