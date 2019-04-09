<!DOCTYPE html>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>	
                <link rel="stylesheet" type="text/css" href="css/login.css"/>
	</head>
	<body>
            
            
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
                
		<form method="POST" action="proc_cad_login.php">
                    <div id="tela">
                        <h1>Cadastre-se</h1>
                        <label>E-mail: </label>
			<input type="email" name="email"><br><br>
			<label>Senha </label>
                        <input type="password" name="senha"><br><br>
			<input type="submit" value="Cadastrar">
                    <div id="b1">
                        <a href="index.php">Voltar</a>
                    </div>
                    </div>
                   
		</form>
                
        </body> 
</html>
