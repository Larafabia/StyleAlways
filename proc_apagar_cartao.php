<?php
session_start();
include_once './conexao.php';
$id_c = filter_input(INPUT_GET, 'id_cartao', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_c)){
	$result_c = "DELETE FROM dados WHERE id_cartao='$id_c'";
	$resultado_c = mysqli_query($conn, $result_c);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: mostrar_cartao.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: mostrar_cartao.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: mostrar_cartao.php");
}
