<?php
include("elementosfrontend.php");
include("conexao.php");
include("validarlogin.php");


$cpf = $_SESSION['cpf'];

$pegarprodutos = "SELECT * FROM produto"; 
$query_produtos = mysqli_query($conexao, $pegarprodutos); 
$select_usuario = "SELECT nome, cpf, saldo FROM usuario WHERE cpf = '$cpf'";
$query_usuario = mysqli_query($conexao, $select_usuario);
$dados = mysqli_fetch_row($query_usuario);

$nome = $dados[0];
$saldo = $dados[2];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

<div class="paginaprodutos">
  <div class="carta">
    <div>
    <?php echo "<h3>Usuário: " . $nome . "</h3>";
          echo "<h4 style=\"color:green;\">Saldo: R$ " . $saldo . "</h4>";
    ?>
		
    </div>
    <!--
    <div class="caixa">
    <img src="fotos/1.jpg" alt="foto" width="400" height="400"></img>
    <center><h4><b>Teste</b></h4></center>
    <p>Teste</p>
    </div>

    <div class="caixa">
    <img src="fotos/1.jpg" alt="foto" width="400" height="400"></img>
    <center><h4><b>Teste</b></h4></center>
    <p>Teste</p>
    </div>
    -->
    <?php 
        while ($lista=mysqli_fetch_array($query_produtos))  { 
        $id_produto = $lista['id_produto'];
        $nome = $lista['nome'];
        $custo = $lista['custo'];
        $descricao = $lista['descricao'];
        $quantidade = $lista['quantidade'];
        if ($lista['disponivel'] == true) {
            $disponivel = true;
        }
        else {
            $disponivel = false;
        }
    ?> 

    <div class="caixa">
    <?php echo "<img src=\"fotos/" . $id_produto . ".jpg\" alt=\"foto\" width=\"400\" height=\"400\"></img>" ?>
        <?php echo "<h2><b>" . $nome . "</b></h2>" ?>
        <?php echo "<h3 style=\"color:green;\"> R$ " . $custo ."</h3></p>" ?>
        <?php if ($disponivel == true ) { 
            echo "<h4 style=\"color:green;\"> Produto Disponível! </h4></p>";
        }
        else {
            echo "<h4 style=\"color:red;\"> Produto Fora de Estoque!</h4></p>";
        }   
        ?>
        <?php echo "<p>" . $descricao ."</p>" ?>
        <?php if ($disponivel == true ) { ?>
        <form id="form-comprar" action="comprar.php" method="POST">
			Quantidade: <input type="number" name="quantidade" required><br>
            <?php echo "<input type=\"hidden\" value=\"" . $id_produto . "\" name=\"idproduto\">"; ?>
			<input type="submit" name="comprar" value="Comprar">   
        </form>
        <?php } 
         else { 
        echo "<h4 style=\"color:red;\"> Produto Fora de Estoque!</h4></p>";
         } ?>
    </div>

    <?php 
        } 
    ?> 
  </div>
</div>
<!--

-->


</body>

</html>