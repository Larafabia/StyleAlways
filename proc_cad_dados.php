<?php
session_start();
include_once './conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$endereço = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);




$result = "INSERT INTO dados (nome, sobrenome, cpf, end, num, cid, tel)VALUES ('$nome', '$sobrenome', '$cpf', '$endereço', '$numero', '$cidade', '$telefone')";
$resultado = mysqli_query($conn, $result);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: colocar_dados.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: proc_car_dados.php");
}
