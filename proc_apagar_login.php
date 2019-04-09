<?php
session_start();
include_once './conexao.php';
$id = filter_input(INPUT_GET, 'id_login', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result = "DELETE FROM login WHERE id_login='$id'";
	$resultado = mysqli_query($conn, $result);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: index1.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: index1.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: index1.php");
}


