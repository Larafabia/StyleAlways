<?php
session_start();
include_once './conexao.php';

$numero_cart = filter_input(INPUT_POST, 'numero_c', FILTER_SANITIZE_NUMBER_INT);
$cod = filter_input(INPUT_POST, 'cod_cartao', FILTER_SANITIZE_NUMBER_INT);
$nome_cart = filter_input(INPUT_POST, 'nome_c', FILTER_SANITIZE_STRING);




$result = "INSERT INTO cartao (numero_c, cod_cartao, nome_c)VALUES ('$numero_cart', '$cod', '$nome_cart')";
$resultado = mysqli_query($conn, $result);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: mostrar_cartao.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: mostrar_cartao.php");
}
