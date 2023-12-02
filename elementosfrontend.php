<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="design.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
<ul class="barraprincipal">
    <li><a class="botao <?php if($nomedapagina=='index.php') { ?>destaque<?php } ?>" href="index.php">Ínicio</a></li>
    <li><a class="botao <?php if($nomedapagina=='Produtos.php') { ?>destaque<?php } ?>" href="produtos.php">Produtos</a></li>
    <li><a class="botao <?php if($nomedapagina=='saibamais.php') { ?>destaque<?php } ?>" href="saibamais.php">Saiba Mais</a></li>
<!-- adicionar detecção de login depois -->
    <li><a class="botao login_botao" style="float:right" href="loginpagina.php">Login ou Sair</a></li>
</ul>
</div>


</body>

</html>