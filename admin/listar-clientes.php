<?php 

//inclcuir a conexão com o banco de dados
include_once("./conexao-listar-clientes.php");

//receber os dados da requisição
$dados_requisicao = $_REQUEST;

// Lista de colunas na tabela
$colunas = [
    0 => 'id',
    1 => 'nome',
    2 => 'cpf',
    3 => 'celular',
    4 => 'email',
    5 => 'senha',
    6 => 'vip',
    7 => 'admin',
    8 => 'created',
    9 => 'modified'
];

//
$query_qntd_clientes = "SELECT COUNT(id) as qntd_clientes FROM clientes";

// Acessa o IF quando há parametros de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $query_qntd_clientes .= " WHERE id LIKE :id ";
    $query_qntd_clientes .= " OR nome LIKE :nome ";
    $query_qntd_clientes .= " OR cpf LIKE :cpf ";
    $query_qntd_clientes .= " OR celular LIKE :celular ";
    $query_qntd_clientes .= " OR email LIKE :email ";
}
// Preparar a query
$resulta_qntd_clientes = $conn->prepare($query_qntd_clientes);
// Acessa o IF quando há parametros de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $resulta_qntd_clientes->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $resulta_qntd_clientes->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $resulta_qntd_clientes->bindParam(':cpf', $valor_pesq, PDO::PARAM_STR);
    $resulta_qntd_clientes->bindParam(':celular', $valor_pesq, PDO::PARAM_STR);
    $resulta_qntd_clientes->bindParam(':email', $valor_pesq, PDO::PARAM_STR);
}



$resulta_qntd_clientes->execute();
$row_qntd_clientes = $resulta_qntd_clientes->fetch(PDO::FETCH_ASSOC);


//var_dump($row_qntd_clientes);

$query_clientes = "SELECT id, nome, cpf, celular, email, created 
                    FROM clientes ";

// Acessa o IF quando há parametros de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $query_clientes .= " WHERE id LIKE :id ";
    $query_clientes .= " OR nome LIKE :nome ";
    $query_clientes .= " OR cpf LIKE :cpf ";
    $query_clientes .= " OR celular LIKE :celular ";
    $query_clientes .= " OR email LIKE :email ";
}

$query_clientes .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . 
$dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

$resulta_clientes = $conn->prepare($query_clientes);
$resulta_clientes->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$resulta_clientes->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

// Acessa o IF quando há parametros de pesquisa
if(!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $resulta_clientes->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $resulta_clientes->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $resulta_clientes->bindParam(':cpf', $valor_pesq, PDO::PARAM_STR);
    $resulta_clientes->bindParam(':celular', $valor_pesq, PDO::PARAM_STR);
    $resulta_clientes->bindParam(':email', $valor_pesq, PDO::PARAM_STR);
}
// Executar a QUERY
$resulta_clientes->execute();

while($row_ciente = $resulta_clientes->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_ciente);
    extract($row_ciente);
    $registro = [];
    $registro[] = $id;
    $registro[] = $nome;
    $registro[] = $cpf;
    $registro[] = $celular;
    $registro[] = $email;
    $registro[] = $created;
    $registro[] = "<button type='button' id='$id' class='btn btn-outline-primary btn-sm' onclick='visCliente($id)'><i class='bi bi-eye'></i></button> <button type='button' id='$id' class='btn btn-outline-warning btn-sm' onclick='editCliente($id)'><i class='bi bi-pencil-square'></i></button> <button type='button' id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarCliente($id)'><i class='bi bi-trash'></i></button>";
    $dados_clientes[] = $registro;
}

//var_dump($dados_clientes);

//Criar o array de informações a serem retornadas para o javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), //Para cada requisição é enviado um membro como paramentro
    "recordsTotal" => intval($row_qntd_clientes['qntd_clientes']), //Quantidade de registros que há no banco de dados
    "recordsFilteerd" => intval($row_qntd_clientes['qntd_clientes']), // Total de registros quando houver pesquisa
    "data" => $dados_clientes // Array de dados com os registros retornados da tabela de clientes
];

//var_dump($resultado);

//Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);