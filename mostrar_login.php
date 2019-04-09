<?php
session_start();
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar</title>		
	</head>
	<body>
            <a href="tela_login.php">Cadastrar</a><br>
		<a href="index1.php">Listar</a><br>
		<h1>confirme seus dados</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		
		$qnt_result_pg = 3;
                
              $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result = "SELECT * FROM login LIMIT $inicio, $qnt_result_pg";
		$resultado = mysqli_query($conn, $result);
		while($row = mysqli_fetch_assoc($resultado)){
			echo "ID: " . $row['id_login'] . "<br>";			
			echo "E-mail: " . $row['email'] . "<br>";
                        echo "Senha: " . $row['senha'] . "<br>";
			echo "<a href='edit_login.php?id_login=" . $row['id_login'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_login.php?id_login=" . $row['id_login'] . "'>Apagar</a><br><hr>";
		}
		
		
		$result_pg = "SELECT COUNT(id_login) AS num_result FROM login";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		 
		?>
                <a href="boleto.php">boleto</a>
                <a href="cartao.php">cartao</a>
	</body>
</html>