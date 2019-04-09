

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
		
		$result = "SELECT * FROM cartao LIMIT $inicio, $qnt_result_pg";
		$resultado = mysqli_query($conn, $result);
		while($row = mysqli_fetch_assoc($resultado)){
			echo "ID: " . $row['id_cartao'] . "<br>";			
			echo "numero: " . $row['numero_c'] . "<br>";
                        echo "codigo: " . $row['cod_cartao'] . "<br>";
                        echo "nome: " . $row['nome_c'] . "<br>";
			echo "<a href='proc_edit_cartao.php?id_cartao=" . $row['id_cartao'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_cartao.php?id_cartao=" . $row['id_cartao'] . "'>Apagar</a><br><hr>";
		}
		
		
		$result_pg = "SELECT COUNT(id_cartao) AS num_result FROM cartao";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		 ?>
                
                <a href="index1.php">confimar compar</a><br>
                

