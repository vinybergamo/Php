<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "site";

//Criar a conexao
$conn_img = mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conn_img) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
} else {
    //echo "Conexão realizada com sucesso";
}
