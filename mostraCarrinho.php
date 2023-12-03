<?php 
session_start();
 include_once('config.php');
 $logado = $_SESSION['email'];
 $idProduto = '';
 $preçoFinal = 0;
 $lista_produtos = $mysqli->query("SELECT * FROM carrinho WHERE usuario = '$logado'");
 if (mysqli_num_rows($lista_produtos) < 1) {
  $data = '<div>Sua Sacola está Vazia</div>';
  
  echo $data;
 } else{

  while ($row = mysqli_fetch_assoc($lista_produtos)) {
    $idProduto = $row['id_produto'];
    $preçoProduto = $row['preço'];
    $produto = $mysqli->query("SELECT imagem FROM produtos WHERE id = '$idProduto'");
    $imagemProduto = mysqli_fetch_assoc($produto);
    $data = ' <div class="d-flex justify-content-between position-relative card-carrinho" id="card-Car-'. $row['id_produto'] .'">
    <form id="retirar-'. $row['id_produto'] .'"> 
    <input type="button" class="botao-carrinho tirar-produto" onclick="retirarProduto('. $row['id_produto'] .')" name="tirarCarrinho" value="X"></input>
    <input type="hidden" name="produto_id" value="' . $row['id_produto'] . '"></input>
    </form>

      <img src="'. $imagemProduto['imagem'] .'.png" alt="" class="img-produto-carrinho">
      <div class="p-2 div-texto">
        <p class="name titulo-produto">'. $row['nome_produto'] .'</p>
        <p class="lt" id="preco-'. $row['id_produto'] .'">R$'. $preçoProduto .'</p>
      </div>
      <div class="d-flex p-2 adicionar-qtd">
      <form id="diminuir-'. $row['id_produto'] .'">
          <input type="button" onclick="diminuiCar('. $row['id_produto'] .')" class="botao-carrinho"value="-"></input>
          <input type="hidden" name="produto_id" value="' . $row['id_produto'] . '"></input>
        </form>
          <p id="quantidade-'. $row['id_produto'] .'" class="ml-2">'. $row['quantidade'] .'</p>
          <form id="aumentar-'. $row['id_produto'] .'">
            <input type="button" class="ml-2 botao-carrinho" onclick="aumentaCar('. $row['id_produto'] .')" value="+"></input>
            <input type="hidden" name="produto_id" value="' . $row['id_produto'] . '"></input>
          </form>
      </div>
    </div>';
    $preçoFinal = $preçoProduto + $preçoFinal;
    $valor = $preçoFinal;
    echo $data;

  }
return $valor;
 }



?>