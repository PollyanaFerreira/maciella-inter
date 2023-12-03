<?php 
session_start();
$idProduto = 0;
$idCategoria = '';
if(isset($_POST['visualizar-produto'])){
 $idProduto = $_POST['req_id'];
$_SESSION['req_id'] = $idProduto;
 print_r($_SESSION['req_id']);
 
header('Location: produto.php');
}

if(isset($_POST['visualizar-categoria'])){
    $idCategoria = $_POST['categoria_id'];
    $_SESSION['categoria_id'] = $idCategoria;
    header('Location: categorias.php');
}

?>