<?php
session_start();
include_once './conexao.php';

$id_d = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);


$result_d = "UPDATE dados SET nome='$nome', sobrenome='$sobrenome', cpf='$cpf', end='$endereco', num='$numero', cid='$cidade', tel='$telefone' WHERE id='$id_d'";
$resultado_d = mysqli_query($conn, $result_d);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: edit_dados.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit_dados.php");
}
