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
                
                
                $result_d = "SELECT * FROM dados LIMIT $inicio, $qnt_result_pg";
		$resultado_d = mysqli_query($conn, $result_d);
		while($row_d = mysqli_fetch_assoc($resultado_d)){
			echo "ID: " . $row_d['id'] . "<br>";			
			echo "nome: " . $row_d['nome'] . "<br>";
                        echo "sobrenome: " . $row_d['sobrenome'] . "<br>";
                        echo "cpf: " . $row_d['cpf'] . "<br>";
                        echo "endereço: " . $row_d['end'] . "<br>";
                        echo "numero: " . $row_d['num'] . "<br>";
                        echo "cidade: " . $row_d['cid'] . "<br>";                
                        echo "telefone: " . $row_d['tel'] . "<br>";
			echo "<a href='edit_dados.php?id=" . $row_d['id'] . "'>Editar</a><br>";
			echo "<a href='proc_apagar_dados.php?id=" . $row_d['id'] . "'>Apagar</a><br><hr>";
		}
		
		
		$result_pgs = "SELECT COUNT(id) AS num_result FROM dados";
		$resultado_pgs = mysqli_query($conn, $result_pgs);
		$row_pgs = mysqli_fetch_assoc($resultado_pgs);
					
		?>
                <a href="boleto.php">boleto</a>
                <a href="cartao.php">cartao</a>
	</body>
</html>