<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
      
    </head>
    <body>
        
        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
        
        
        <form name="cad_alugar" method="post" action="proc_cad_dados.php">           
            <label>nome</label>
            <input type="text" name="nome"><br>
            <label>sobrenome</label>
            <input type="text" name="sobrenome"><br>
            <label>CPF</label>
            <input type="text" name="cpf"><br>
            <label>endereco</label>
            <input type="text" name="end"><br>
            <label>numero</label>
            <input type="number" name="num"><br>
            <label>cidade</label>
            <input type="text" name="cid"><br>
            <label>telefone</label>
            <input type="number" name="tel"><br>
            <input type="submit" value="enviar"> 
            <div id="b0">
                <a href="mostrar_dados.php">confirmar dados</a>
            </div>
        </form>
        <?php
        
        ?>
    </body>
</html>
