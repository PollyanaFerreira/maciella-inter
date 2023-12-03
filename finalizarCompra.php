<?php 
session_start();
include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: index.php');
} else{
    $logado = $_SESSION['email'];
    $sql = $mysqli->query("SELECT * FROM carrinho WHERE usuario = '$logado'");
    if(mysqli_num_rows($sql) < 1){
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra | Maciella</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        <?php
        echo file_get_contents('style.css');
        ?>
    </style>
    <style>
        <?php 
            echo file_get_contents('css/bootstrap.min.css');
        ?>
    </style>

</head>
<body>
<script><?php
        echo file_get_contents('script.js');

        ?> </script>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between fixed-top shadow mb-5 bg-white rounded" id="menu-home" style="padding-bottom: 2.5rem !important; ">
            <div class="d-flex" id="link">
            <?php echo "<a href='" . $_SERVER['HTTP_REFERER'] . "' class='voltar-pagina'><span class='material-symbols-outlined'>
undo
</span></a>";?>
            </div>
            <div class="d-flex position-relative" id="container-logo">
                <a  id="logo" href="index.php"><h1>Maciella</h1></a>
            </div>
            <?php 
            if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
                echo '            <div class="d-flex" id="btn-login">
                <a class="navbar-brand" href="login.php"><span class="material-symbols-outlined">
                    account_circle
                    </span></a>
                
            </div>';
          } else{
             echo '            <div class="d-flex" id="btn-login">
             <a class="navbar-brand" href="user.php"><span class="material-symbols-outlined">
                 account_circle
                 </span></a>
             
         </div>';
          }
            ?>
            <div class="d-flex" id="btn-carrinho">
            <button class="navbar-brand botao-carrinho " id="sacola-Car" onclick="abrirCarrinho()" ><span class="material-symbols-outlined">
shopping_bag
</span></button>
            </div>
        </nav>
    </header>
    <div class="container" style="margin-top: 8rem; margin-left: 5rem;font-size: 36px;">Continuar Comprando</div>
    <div class="d-flex">
    <div id="divs-escondidas">
        
          <div class="div-escondida" >
          <div class="container" style="font-size: 24px;margin-bottom: 1rem; ">
                    Sacola de Produtos
                </div>
          <div class="" id="div-Sacola">
                <div class="conteudos-finaliza" id="produtos-Sacola" style=" overflow-y: scroll;">
                    <?php 

                        $valorFinal = 0;
                        while($row = mysqli_fetch_assoc($sql)) {
                            $idProduto = $row['id_produto'];
    $preçoProduto = $row['preço'];
    $produto = $mysqli->query("SELECT imagem FROM produtos WHERE id = '$idProduto'");
    $imagemProduto = mysqli_fetch_assoc($produto);
                            echo ' <div class="d-flex justify-content-between position-relative card-carrinho m-4" id="card-Car-'. $row['id_produto'] .'">
                            <form id="retirar-'. $row['id_produto'] .'"> 
                            <input type="button" class="botao-carrinho tirar-produto" onclick="retirarProduto('. $row['id_produto'] .')" name="tirarCarrinho" value="Excluir"></input>
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
                            $valorFinal = $preçoProduto + $valorFinal;
                        }

        }
                    ?>
                </div>
                <button class="ver-produto" style="margin-top: 1rem;width: 25%; "  onclick="avancar('div-Sacola', 'div-Entrega')">Ir para entrega</button>
          </div>
          </div>
          <div class="div-escondida" >
          <div class="container" style="font-size: 24px;margin-bottom: 1rem; ">
                    Informações de Entrega
                </div>
            <div class="d-none" id="div-Entrega">

                <div class="conteudos-finaliza" id="entrega-infos">
                   <h3>Entregar para: <?php
                   
                   $user = $mysqli->query("SELECT * FROM usuarios WHERE email = '$logado'"); 
                   if ($row = mysqli_fetch_assoc($user)) {
                    echo $row['nome'];
                   }
                   ?> </h3>
                   <div class="container" style="text-align: center;margin-top: 4rem;">
                    <h6>Endereço</h6   >
                        <div class="container endereco" style="text-align: center;">
                            <p><?php 
                            
                            echo "" . $row['endereço'] . ", " . $row['cidade']
                            
                            ?></p>
                        </div>
                   </div>
                </div>
                <button class="ver-produto" style="width: 25%; " onclick="avancar('div-Entrega', 'div-Pagamento')">Ir para Pagamento</button>
                </div>
          </div>
          <div class="div-escondida ">
                <div class="container" style="font-size: 24px;margin-bottom: 1rem; ">
                    Pagamento
                </div>
<div class="d-none" id="div-Pagamento">
                <div class="conteudos-finaliza"  >
                <title>Tela de Formas de Pagamento</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <h3>Formas de Pagamento</h3>
  <div class="payment-options">
    <label>
      <input type="radio" name="payment" value="credit-card" required> Cartão de Crédito
    </label>
    <label>
      <input type="radio" name="payment" value="debit-card" required> Cartão de Débito
    </label>
    <label>
      <input type="radio" name="payment" value="bank-transfer" required> Transferência Bancária
    </label>
    <label>
      <input type="radio" name="payment" value="paypal" required> PayPal
    </label>
  </div>
                </div>

                <button class="ver-produto" style="width: 25%; " onclick="finalizaCompra()" data-toggle="modal" data-target="#exampleModalCenter">Finalizar Compra</button>

                
          </div>

    </div>
    </div>
    <div onclick="fechaModal()" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Compra Realizada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="fechaModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
    </div>
  </div>
</div>
    <div id="divs-informacao">

                   <div class="container cupom">
                    <h5>Adicionar Cupom promocional</h5>
                        <form action="">
                        <input type="text" name="cupomValor" id="cupom" placeholder="">
                        <input type="submit" name="entregarCupom" id="entregarCupom">
                        </form>
                   </div>
                   <div class="container infos-finais">
                    <h3>Resumo da Compra</h3>
                    <div class="d-flex justify-content-between">
                    <h6>Subtotal:  </h6>
                    <h6 id="valor-final">R$
                        <?php echo $valorFinal; ?>,00</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                    <h6>Envio:  </h6>
                    <h6>Grátis</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                    <h6>Cupom:  </h6>
                    <h6>--</h6>
                    </div>
                    </div>

                   </div>

    </div>
    </div>
    <script>
        function fechaModal(){

        var urlAtual = window.location.href;
        window.location.href=urlAtual;

}

    </script>

</body>
</html>