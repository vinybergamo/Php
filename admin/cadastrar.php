<?php
session_start();
include_once("../config/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";


$result_usuarios = "INSERT INTO clientes (nome, cpf, celular, email, senha, admin, created) VALUES ('$nome','$cpf','$celular','$email','$senha', '0', NOW())";
$resulta = $conn->query($result_usuarios);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../inicio.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar usuario</p>";
	header("Location: ../inicio.php");
}
