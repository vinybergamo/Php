<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "site";

//Criar a conexao
$conn = new mysqli($servidor, $usuario, $senha, $dbname);
if(!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}else{
    echo "Conexão realizada com sucesso";
}
?>