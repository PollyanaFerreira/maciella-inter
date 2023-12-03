<?php 
 include_once('config.php');
 session_start();
 
$id_produto = $_POST['produto_id'];
$fim = false;
$usuario = $_SESSION['email'];
$Quantidade = 1;


 $carrinho = mysqli_query($mysqli, "SELECT * FROM carrinho WHERE usuario = '$usuario' and id_produto = '$id_produto' ");


          while($elemento = mysqli_fetch_assoc($carrinho)) {
            print_r($elemento);
            if ($elemento['id_produto'] == $id_produto) {
              
               $Quantidade = $elemento["quantidade"] + 1;
               $result = mysqli_query($mysqli, "UPDATE carrinho SET quantidade = '$Quantidade' Where id_produto = '$id_produto' ");
               global $fim;
               $fim = true;
              break;
      }
      }


    if ($fim == false) {
      $produto = $mysqli->query("SELECT * FROM produtos WHERE id = '$id_produto'");
      while ($produto_car = mysqli_fetch_assoc($produto)) {
        $nome = $produto_car["nome_produto"];
        $preco = $produto_car['preço'];
        $imagem = $produto_car['imagem'];
        $usuario = $_SESSION['email'];
        $Quantidade = 1;
        $id_produto = $produto_car['id'];


      $result = mysqli_query($mysqli, "INSERT INTO carrinho(nome_produto,preço,imagem,quantidade,usuario,id_produto) VALUES ('$nome','$preco','$imagem','$Quantidade','$usuario','$id_produto')");
     }
    }

        


    

?>