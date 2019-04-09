
<?php
session_start();
include_once './conexao.php';

$id_d = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_d = "SELECT * FROM dados WHERE id = '$id_d'";
$resultado_d = mysqli_query($conn, $result_d);
$row_d = mysqli_fetch_assoc($resultado_d);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
            <a href="tela_login.php">Cadastrar</a><br>
		<a href="index_1.php">Listar</a><br>
		<h1>meus dados</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
                <form method="POST" action="proc_edit_dados.php">
                        
                        <input type="hidden" name="id" value="<?php echo $row_d['id']; ?>"><br>
                        <label>nome</label>
                        <input type="text" name="nome" value="<?php echo $row_d['nome']; ?>"><br>
                        <label>sobrenome</label>
                        <input type="text" name="sobrenome" value="<?php echo $row_d['sobrenome']; ?>"><br>
                        <label>CPF</label>
                        <input type="text" name="cpf" value="<?php echo $row_d['cpf']; ?>"><br>
                        <label>endereco</label>
                        <input type="text" name="end" value="<?php echo $row_d['end']; ?>"><br>
                        <label>numero</label>
                        <input type="number" name="num" value="<?php echo $row_d['num']; ?>"><br>
                        <label>cidade</label>
                        <input type="text" name="cid" value="<?php echo $row_d['cid']; ?>"><br>
                        <label>telefone</label>
                        <input type="number" name="tel" value="<?php echo $row_d['tel']; ?>"><br>
                        <input type="submit" value="editar"> 
                        <a href="mostrar_dados.php">voltar</a>
                </form>
			


                        
                        
			
		</form>
	</body>
</html>

