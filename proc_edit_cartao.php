<?php
session_start();
include_once './conexao.php';

$id_c = filter_input(INPUT_POST, 'id_cartao', FILTER_SANITIZE_NUMBER_INT);
$numero_cart = filter_input(INPUT_POST, 'numero_c', FILTER_SANITIZE_NUMBER_INT);
$cod = filter_input(INPUT_POST, 'cod_cartao', FILTER_SANITIZE_NUMBER_INT);
$nome_cart = filter_input(INPUT_POST, 'nome_c', FILTER_SANITIZE_STRING);


$result = "UPDATE cartao SET numero_c='$numero_cart', cor_cartao='$cod', nome_c='$numero_cart' WHERE id_login='$id_c'";
$resultado = mysqli_query($conn, $result);


if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: edit_cartao");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit_cartao.php");
}
