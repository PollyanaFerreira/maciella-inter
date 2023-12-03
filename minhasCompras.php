<?php 

include_once('config.php');
session_start();
$Quantidade = 1;
$fim = false;
$usuario = $_SESSION['email'];
$carrinho = mysqli_query($mysqli, "SELECT * FROM carrinho WHERE usuario = '$usuario'");
$minhasCompras = mysqli_query($mysqli, "SELECT * FROM minhas_compras WHERE usuario = '$usuario'");

while($row = mysqli_fetch_assoc($carrinho)){
    $id_produto = $row['id_produto'];
    $Quantidade = $row['quantidade'];
    while($produto = mysqli_fetch_assoc($minhasCompras)) {
        if ($produto['id_produto'] == $id_produto) {
              
            $Quantidade = $produto["quantidade"] + 1;
            $result = mysqli_query($mysqli, "UPDATE minhas_compras SET quantidade = '$Quantidade' Where id_produto = '$id_produto' ");
            global $fim;
            $fim = true;
            $limpar = mysqli_query($mysqli, "DELETE From carrinho WHERE id_produto = '$id_produto' and usuario = '$usuario'");
           break;
    }
    }
    if($fim == false){
    $result = mysqli_query($mysqli, "INSERT INTO minhas_compras(id_produto,usuario,quantidade) Values ('$id_produto', '$usuario', '$Quantidade')");
    $limpar = mysqli_query($mysqli, "DELETE From carrinho WHERE id_produto = '$id_produto' and usuario = '$usuario'");
    }
}

?>