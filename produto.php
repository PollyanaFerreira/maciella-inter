<?php

include_once('config.php');
include_once('telaProdutos.php');


    $logado = $_SESSION['email'];
$idProduto = $_SESSION['req_id'];
$sql = $mysqli->query("SELECT * FROM produtos WHERE id = '$idProduto'");




?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto     <?php 
    echo $idProduto;
    ?> | Maciella</title>

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
                
            </div> 
            <div class="d-flex" id="btn-carrinho">
                <a class="navbar-brand" href="login.php"><span class="material-symbols-outlined">
shopping_bag
</span></a>
            </div>';
          } else{
             echo '            <div class="d-flex" id="btn-login">
             <a class="navbar-brand" href="user.php"><span class="material-symbols-outlined">
                 account_circle
                 </span></a>
             
         </div>
          
            
            <div class="d-flex" id="btn-carrinho">
            <button class="navbar-brand botao-carrinho " id="sacola-Car" onclick="abrirCarrinho()" ><span class="material-symbols-outlined">
shopping_bag
</span></button>
            </div>';
          }
            ?>
        </nav>
    </header>
    <section id="carrinho" class="fixed-top h-100 p-3 d-flex justify-between z-20 shadow flex-column">
    <div id="cabecalho-carrinho" class="d-flex justify-content-between m-2">
        <p style="margin-top: 20px;" class="name">Sua Sacola</p>
        <button class="botao-carrinho" id="fechar-carrinho" onclick="fecharCarrinho()">X</button>
    </div>
    <section id="produtos-car" style=" overflow-y: scroll" class="h-100 w-100 flex-column gap-2">
  <?php 
  
   

  ?>
 
    </section>
    <p id="preco-total" class="bg-slate-200 text-green-800 rounded-sm py-4"> <?php 
  
   

  ?></p>
 <a href="finalizarCompra.php"><button class="ver-produto">Finalizar compra</button></a>
  </section>

    <section style="margin-top: 8rem;">

   
    <?php 
        if ($produto = mysqli_fetch_assoc($sql)) {
            ?>
            <div class="container-fluid mt-5 mb-5">
              <div class="row">

                <div class="col-md-1">
        

           
                       <button onclick="mudaImagem('img-1')" class="but"><img src="<?=  $produto['imagem'] ?>.png" class="img-fluid mb-4 mudaImagem" alt="Imagem" height="190" width="190" id="img-1"></button></br>
                      <button class="but" onclick="mudaImagem('img-2')"><img src="<?=  $produto['imagem_2'] ?>.png" class="img-fluid mb-4 mudaImagem" alt="Imagem" height="190" width="190" id="img-2"></button></br>
                    
           
                </div>
            
                <!-- Imagem grande e div de texto -->
                <div class="col-md-6 d-flex justify-content-center" id="imgG" >
                <img class="d-block" id="imagem-G"  src="<?= $produto['imagem'] ?>.png" height="570" width="530">
                 <img class="d-none" id="imagem-G2"  src="<?= $produto["imagem_2"] ?>.png" height="570" width="530"> 
                </div>
  
                <div class="col-md-5 d-flex flex-column mb-3 bd-highlight">
                  <div class="p-2 bd-highlight">
                  <h1 class="font-weight-normal normal"><?= $produto['nome_produto']; ?></h1>
                  </div>
                  <div class="p-2 bd-highlight">
                  <p class="font-weight-normal mt-5">
                    <?= nl2br($produto['descrição']); ?>
                    <h1>
                        <b>R$ <?= number_format($produto['preço'], 2, ',', '.'); ?></b>
                    </h1>
                    <p>Pagamento em até 10x sem juros.</p>
                  </div>

                    <div class="p-2 bd-highlight">
                    <form id="form_Kart-"<?= $produto['id'] ?>>
  <input type="button" class="btn btn-car name" onclick="<?php 
  $produtoId = $produto['id'] ;
  if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){

} else{echo 'chamarAjax('. $produtoId .')';} ?>" name="adicionarCarrinho" id="btn-carrinho" value="ADICIONAR A SACOLA"></input>
  <input type="hidden" name="produto_id" value=""<?= $produto['id'] ?>></input>
  </form>
                    </div>
                    
            
                </div>
              </div>
            
                <hr class="hw-100">
            
                <div class="row mt-3">
                    <div class="col-md-12">
                        
                    <div class="d-block h-100 w-100 carrousel-produtos" id="Todos">
                        
                    <div class="container" style="font-family: Julius Sans One; font-size: 24px; text-align:center;">
    Produtos Semelhantes
  </div>
<div class="carousel-container">
<div class="carousel" id="carousel">
<?php 
$categoria = $produto['categoria'];
$sql = $mysqli->query("SELECT * FROM produtos Where categoria = '$categoria' ");

while($produto = mysqli_fetch_assoc($sql)){
  if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    echo '<div class="card"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto" >
    <img class="card-img-top w-100 h-100" src="' . $produto['imagem'] . '.png" alt="">
    <div class="card-header">
    <h4 class="my-0 font-weight-normal name">' . $produto['nome_produto'] . '</h4>
  </div>
    <ul class="list-unstyled mt-3 mb-4">
      <p></p>
      <li class="name">R$ ' . $produto['preço'] . '</li>
      
    </ul>
    <form action="telaProdutos.php" method="post">
    <input type="submit" class="ver-produto" name="visualizar-produto" id="btn-Visualizar" value="Ver"></input>
    <input type="hidden" name="req_id" value="' . $produto['id'] . '"></input>
    </form>
    <form id="form_Kart-' . $produto['id'] . '">
    <input type="button" class="btn btn-car name" name="adicionarCarrinho" id="btn-carrinho" value="Adicionar a Sacola"></input>
    <input type="hidden" name="produto_id" value="' . $produto['id'] . '"></input>
    </form>
  
  </div></div>';
  } else{
  echo '<div class="card"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto" >
  <img class="card-img-top w-100 h-100" src="' . $produto['imagem'] . '.png" alt="">
  <div class="card-header">
  <h4 class="my-0 font-weight-normal name">' . $produto['nome_produto'] . '</h4>
</div>
  <ul class="list-unstyled mt-3 mb-4">
    <p></p>
    <li class="name">R$ ' . $produto['preço'] . '</li>
    
  </ul>
  <form action="telaProdutos.php" method="post">
  <input type="submit" class="ver-produto" name="visualizar-produto" id="btn-Visualizar" value="Ver"></input>
  <input type="hidden" name="req_id" value="' . $produto['id'] . '"></input>
  </form>
  <form id="form_Kart-' . $produto['id'] . '">
  <input type="button" class="btn btn-car name" onclick="chamarAjax(' . $produto['id'] . ')" name="adicionarCarrinho" id="btn-carrinho" value="Adicionar a Sacola"></input>
  <input type="hidden" name="produto_id" value="' . $produto['id'] . '"></input>
  </form>

</div></div>';}


}



?>



<!-- Adicione mais cards conforme necessário -->
</div>

<button class="prev" onclick="prevSlide('Todos')"><span class="material-symbols-outlined">
arrow_back_ios_new
</span></button>
<button class="next" onclick="nextSlide('Todos')"><span class="material-symbols-outlined">
arrow_forward_ios
</span></button>

</div>
</div>

                    </div>
                </div>
            
            </div>
            <?php
                } else {
                    echo "Produto não encontrado.";
                }

            ?>
            
            
            </section>
            <section class="container" id="categorias" style="margin-top: 2rem;">
  <div class="container" style="font-family: Julius Sans One; font-size: 24px;">
    Categorias
  </div>
  <div class="container">
  <form action="telaProdutos.php" method="post">
          <input type="submit" class="visualizar-categoria" name="visualizar-categoria" id="btn-acessar-Aneis" value=""></input>
          <input type="hidden" name="categoria_id" value="Anel"></input>
          </form>
          <form action="telaProdutos.php" method="post">
          <input type="submit" class="visualizar-categoria" name="visualizar-categoria" id="btn-acessar-Brincos" value=""></input>
          <input type="hidden" name="categoria_id" value="Brinco"></input>
          </form>
          <form action="telaProdutos.php" method="post">
          <input type="submit" class="visualizar-categoria" name="visualizar-categoria" id="btn-acessar-Colares" value=""></input>
          <input type="hidden" name="categoria_id" value="Colar"></input>
          </form>
          <form action="coleções.php" method="post">
          <input type="submit" class="visualizar-categoria" name="visualizar-categoria" id="btn-acessar-Coleções" value=""></input>
          <input type="hidden" name="categoria_id" value="Coleções"></input>

          </form>
          <div class="container">
            <h6 class="titulo-categoria">Aneis</h6>
            <h6 class="titulo-categoria">Brincos</h6>
            <h6 class="titulo-categoria">Colares</h6>
            <h6 class="titulo-categoria">Coleções</h6>
        </div>
  </div>
</section>
<hr>
<footer class="footer-Maciella" style="text-align: center;">
    <p>@Todos os Direitos Reservados a Maciella Ecommerce</p>
</footer>
                <script>
                    <?php 
                        echo file_get_contents('cards.js');
                    ?>
                </script>
                 </script>
        <script>
        <?php 
            echo file_get_contents('processamento_carrousel.js');
        ?>
    </script>
            <script type="text/javascript">
        <?php 
            echo file_get_contents('jquery-3.7.1.min.js');
        ?>
    </script>
    <script type="text/javascript">
              <?php 
            echo file_get_contents('adicionarCarrinho.js');
        ?>
    </script>
 
</body>
</html>