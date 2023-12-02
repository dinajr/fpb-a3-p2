<?php
include("elementosfrontend.php");
?>

<!DOCTYPE html>
<html>

<body>
<center>
		<h1>CONTA DA LOJA</h1>
		<h3>Login</h3>
		<form id="form-login" action="login.php" method="POST">
			Login: <input type="text" name="login"><br>
			Senha: <input type="password" name="senha"><br><br>
			<input type="submit" name="entrar" value="Entrar">
		</form>
        <a href="registrarusuariopagina.php">Não tem conta? Crie uma.</a><br><br>
        <a href="logout.php">Sair</a>
</center>
</body>
</html>
