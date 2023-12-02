<?php
include("conexao.php");
include("validarlogin.php");

$cpf = $_SESSION['cpf'];
$quantidade = isset($_POST['quantidade']) ? $_POST['quantidade'] : '';
$id_produto = isset($_POST['idproduto']) ? $_POST['idproduto'] : '';
$data = date("Y-m-d H:i:s");

$select_produto = "SELECT nome, quantidade, custo, disponivel FROM produto WHERE id_produto = '$id_produto'";
$query_produtos = mysqli_query($conexao, $select_produto); 
$dados_produtos = mysqli_fetch_row($query_produtos);
$select_usuario = "SELECT nome, cpf, saldo FROM usuario WHERE cpf = '$cpf'";
$query_usuario = mysqli_query($conexao, $select_usuario);
$dados = mysqli_fetch_row($query_usuario);


$saldo = $dados[2];

$custo_total = $dados_produtos[2] * $quantidade;
$saldo_poscompra = $saldo - $custo_total;
if ($saldo_poscompra <= 0) {
    header('Location: aviso.php');
}
else {
    $quantidade_poscompra = $dados_produtos[1] - $quantidade;
        if ($quantidade_poscompra <= 0) {
            $quantidade_query = "UPDATE produto SET quantidade = 0 WHERE id_produto = '$id_produto'";
            $foradeestoque_query = "UPDATE produto SET disponivel = 'FALSE' WHERE id_produto = '$id_produto'";
            $queryupdate_quantidade = mysqli_query($conexao, $quantidade_query);
            $queryupdate_foradeestoque = mysqli_query($conexao, $foradeestoque_query);
        }
    $update_usuario = "UPDATE usuario SET saldo = '$saldo_poscompra' WHERE cpf = '$cpf'";
    $update_produto = "UPDATE produto SET quantidade = '$quantidade_poscompra' WHERE id_produto = '$id_produto'";
	$queryupdate_usuario = mysqli_query($conexao, $update_usuario);
	$queryupdate_produto = mysqli_query($conexao, $update_produto);
    $log_venda = "INSERT INTO venda (usuario_id, custo_total, produto_id, data_de_venda) VALUES ($cpf, $custo_total, $id_produto, '$data')";
    $querylog = mysqli_query($conexao, $log_venda);
    echo '<script>alert("Obrigado Pela Compra!");
    window.location="produtos.php";
    </script>';
	header('Location: produtos.php');



}






?>