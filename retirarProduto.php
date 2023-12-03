<?php 
session_start();
 include_once('config.php');
$produto = $_POST['produto_id'];
$email = $_SESSION['email'];

$sql = $mysqli->query("DELETE From carrinho WHERE id_produto = '$produto' and usuario = '$email' ");


?>