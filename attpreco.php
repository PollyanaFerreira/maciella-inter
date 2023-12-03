<?php 
include_once('config.php');
session_start();
$usuario = $_SESSION['email'];

$produto = $_POST['produto_id'];

$carrinho = mysqli_query($mysqli, "SELECT preço FROM carrinho WHERE usuario = '$usuario' and id_produto = '$produto' ");
if($row = mysqli_fetch_assoc($carrinho)){
    echo "R$". $row['preço'];
}
?>