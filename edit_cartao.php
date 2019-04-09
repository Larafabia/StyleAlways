
<?php
session_start();
include_once './conexao.php';
$id_c = filter_input(INPUT_GET, 'id_cartao', FILTER_SANITIZE_NUMBER_INT);
$result_c = "SELECT * FROM cartao WHERE id_cartao = '$id_c'";
$resultado_c = mysqli_query($conn, $result_c);
$row_c = mysqli_fetch_assoc($resultado_c);



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
                <form method="POST" action="proc_edit_cartao.php">
                        
                        <input type="hidden" name="id_cartao" value="<?php echo $row_c['id_cartao']; ?>"><br>
                        <label>numero</label>
                        <input type="number" name="numero_c" value="<?php echo $row_c['numero_c']; ?>"><br>
                        <label>codigo de cartao</label>
                        <input type="number" name="cod_cartao" value="<?php echo $row_c['cod_cartao']; ?>"><br>
                        <label>nome</label>
                        <input type="text" name="nome_c" value="<?php echo $row_c['nome_c']; ?>"><br>
                        <input type="submit" value="editar">
                        <a href="mostrar_cartao.php">voltar</a>
                </form>
			


                        
                        
			
		</form>
	</body>
</html>

