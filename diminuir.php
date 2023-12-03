<?php 
 include_once('config.php');
 session_start();
 $usuario = $_SESSION['email'];

$produto = $_POST['produto_id'];

$carrinho = mysqli_query($mysqli, "SELECT * FROM carrinho WHERE usuario = '$usuario' and id_produto = '$produto' ");
$produtinho = mysqli_query($mysqli, "SELECT * FROM produtos WHERE id = '$produto' ");

if($elemento = mysqli_fetch_assoc($carrinho)){
    if($elemento['quantidade'] <= 1 ){
        $sql = mysqli_query($mysqli, "DELETE From carrinho WHERE id_produto = '$produto' and usuario = '$usuario' ");
 
    } else{
        if($row = mysqli_fetch_assoc($produtinho)){
            $Quantidade = $elemento["quantidade"] - 1;
            $preco = $Quantidade * $row["preço"];
            $result = mysqli_query($mysqli, "UPDATE carrinho SET quantidade = '$Quantidade', preço = '$preco'  Where id_produto = '$produto' ");
            echo $Quantidade;
        }

    }
    
    
}




?>