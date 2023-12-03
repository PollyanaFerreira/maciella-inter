<?php 

include_once('config.php');
session_start();
$usuario = $_SESSION['email'];
$preco = 0;
$carrinho = mysqli_query($mysqli, "SELECT * FROM carrinho WHERE usuario = '$usuario'");
while($row = mysqli_fetch_assoc($carrinho)){
    $preco = $preco + $row['preço'];
    
}
echo "R$ ".$preco.",00";
?>