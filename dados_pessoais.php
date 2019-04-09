

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
            
		<a href="index.php">Voltar</a><br>
		<h1>Meus dados</h1>
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
			echo "<a href='proc_edit.php?id_login=" . $row['id_login'] . "'>Editar</a><br>";
                        echo "<a href='proc_apagar_login.php?id_login=" . $row['id_login'] . "'>Apagar</a><br><hr>";
			
		}
		
		
		$result_pg = "SELECT COUNT(id_login) AS num_result FROM login";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		 
                
                
                $result_d = "SELECT * FROM dados LIMIT $inicio, $qnt_result_pg";
		$resultado_d = mysqli_query($conn, $result_d);
		while($row_d = mysqli_fetch_assoc($resultado_d)){
			echo "ID: " . $row_d['id'] . "<br>";			
			echo "nome: " . $row_d['nome'] . "<br>";
                        echo "sobrenome: " . $row_d['sobrenome'] . "<br>";
                        echo "cpf: " . $row_d['cpf'] . "<br>";
                        echo "numero: " . $row_d['num'] . "<br>";
                        echo "cidade: " . $row_d['cid'] . "<br>";                
                        echo "telefone: " . $row_d['tel'] . "<br>";
			echo "<a href='edit.php?id=" . $row_d['id'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_dados.php?id=" . $row_d['id'] . "'>Apagar</a><br><hr>";
		}
		
		
		$result_pgs = "SELECT COUNT(id) AS num_result FROM dados";
		$resultado_pgs = mysqli_query($conn, $result_pgs);
		$row_pgs = mysqli_fetch_assoc($resultado_pgs);
                
                
                
                
                $result_c = "SELECT * FROM cartao LIMIT $inicio, $qnt_result_pg";
		$resultado_c = mysqli_query($conn, $result_c);
		while($row = mysqli_fetch_assoc($resultado_c)){
			echo "ID: " . $row['id_cartao'] . "<br>";			
			echo "numero: " . $row['numero_c'] . "<br>";
                        echo "codigo: " . $row['cod_cartao'] . "<br>";
                        echo "nome: " . $row['nome_c'] . "<br>";
			echo "<a href='proc_edit_cartao.php?id_cartao=" . $row['id_cartao'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_cartao.php?id_cartao=" . $row['id_cartao'] . "'>Apagar</a><br><hr>";
		}
		
		
		$result_pgc = "SELECT COUNT(id_cartao) AS num_result FROM cartao";
		$resultado_pgc = mysqli_query($conn, $result_pgc);
		$row_pgc = mysqli_fetch_assoc($resultado_pgc);
					 
		?>
                
                
                
	</body>
</html>

