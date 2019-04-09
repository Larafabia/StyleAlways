
<?php
session_start();
include_once './conexao.php';
$id = filter_input(INPUT_GET, 'id_login', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM login WHERE id_login = '$id'";
$resultado = mysqli_query($conn, $result);
$row = mysqli_fetch_assoc($resultado);



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
                <form method="POST" action="proc_edit_login.php">
                        
                        <input type="hidden" name="id_login" value="<?php echo $row['id_login']; ?>"><br>
                        <label>email</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
                        <label>senha</label>
                        <input type="password" name="senha" value="<?php echo $row['senha']; ?>"><br>
                        <input type="submit" value="editar">
                </form>
			


                        
                        
			
		</form>
	</body>
</html>

