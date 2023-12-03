
<?php
session_start();

 include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: home.php');
} else{
    $logado = $_SESSION['email'];

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciella | Official Site</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
                <?php
        echo file_get_contents('style.css') 
        ?>
    </style>
</head>
<body>
<script>
        <?php
        echo file_get_contents('script.js');

        ?>

    </script>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between fixed-top" id="menu-home">
            <div class="d-none" id="link">
              <a href="https://instagram.com/maciella_joias?igshid=NGVhN2U2NjQ0Yg==">contact us</a>
            </div>
            <div class="d-flex position-relative" id="container-logo">
                <h1 id="logo">Maciella</h1>
            </div>
           
            <div class="d-none" id="btn-login">
                <a class="navbar-brand" href="user.php"><span class="material-symbols-outlined">
                    account_circle
                    </span></a>
                
            </div>
            
    
                
            </div>
            <div class="d-none" id="btn-carrinho">
                <button class="navbar-brand botao-carrinho " id="sacola-Car" onclick="abrirCarrinho()" ><span class="material-symbols-outlined">
shopping_bag
</span></button>
            </div>
        </nav>
    </header>

    <section id="carrinho" class="fixed-top h-100 p-3 d-flex justify-between z-20 shadow flex-column">
    <div id="cabecalho-carrinho" class="d-flex justify-content-between m-2">
        <p style="margin-top: 20px;" class="name">Sua Sacola</p>
        <button class="botao-carrinho" id="fechar-carrinho" onclick="fecharCarrinho()">X</button>
    </div>
    <section id="produtos-car" style=" overflow-y: scroll" class="h-100 w-100 flex-column gap-2">
  <?php 
  
   
}
  ?>
 
    </section>
    <a href="finalizarCompra.php"><button class="ver-produto">Finalizar compra</button></a>

  </section>


    <section class="d-block" id="content">
        <div class="d-flex" id="card">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 100vh; width: 100%;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/slider/modelo-demonstrando-brincos-e-anel.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img  class="d-block w-100" src="img/slider/jovem-modelo-morena-demonstrando-joias.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/slider/modelo-demonstrando-brincos.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
        <div class="d-block h-100" id="">
          <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-start" id="menu-Carrosel">

  
            <input onclick="mudaCarou('Todos')" type="submit" class=" btns-carrosel" id="btns-carrosel-todos" name="btns-carrosel-todos" value="Todos">     
</input>
           <input onclick="mudaCarou('Aneis')" type="submit" class=" btns-carrosel" id="btns-carrosel-Aneis" name="btns-carrosel-Aneis" value="Aneis">      
</input>
           <input onclick="mudaCarou('Colares')" type="submit" class=" btns-carrosel" id="btns-carrosel-Colares" value="Colares">
        
</input>
           <input onclick="mudaCarou('Brincos')" type="submit" class=" btns-carrosel" id="btns-carrosel-Brincos" value="Brincos">
           
</input>
    

          
          </nav>
          <hr>
          <div class="d-block h-100 w-100 carrousel-produtos" id="Todos">

        <div class="carousel-container">
    <div class="carousel" id="carousel">
      <?php 
      
      $sql = $mysqli->query("SELECT * FROM produtos");
  
        while($produto = mysqli_fetch_assoc($sql)){

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
          <input type="button" class="btn btn-car name" onclick="chamarAjax(' . $produto['id'] . ')" name="adicionarCarrinho" id="btn-carrinho" value="Adicionar a sacola"></input>
          <input type="hidden" name="produto_id" value="' . $produto['id'] . '"></input>
          </form>

        </div></div>';


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

   <div class="d-none h-100 w-100 carrousel-produtos" id="Aneis">

        <div class="carousel-container">
    <div class="carousel" id="carousel-Aneis">
      <?php 
      
      $sql = $mysqli->query("SELECT * FROM produtos WHERE categoria = 'Anel'");
  
        while($produto = mysqli_fetch_assoc($sql)){

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
          <input type="button" class="btn btn-car name" onclick="chamarAjax(' . $produto['id'] . ')" name="adicionarCarrinho" id="btn-carrinho" value="Adicionar a sacola"></input>
          <input type="hidden" name="produto_id" value="' . $produto['id'] . '"></input>
          </form>

        </div></div>';


        }
      

      
      ?>



      <!-- Adicione mais cards conforme necessário -->
      </div>
  
    <button class="prev" onclick="prevSlide('Aneis')"><span class="material-symbols-outlined">
arrow_back_ios_new
</span></button>
    <button class="next" onclick="nextSlide('Aneis')"><span class="material-symbols-outlined">
arrow_forward_ios
</span></button>

  </div>
  </div>

   <div class="d-none h-100 w-100 carrousel-produtos" id="Colares">

        <div class="carousel-container">
    <div class="carousel" id="carousel-Colares">
      <?php 
      
      $sql = $mysqli->query("SELECT * FROM produtos WHERE categoria = 'Colar'");
  
        while($produto = mysqli_fetch_assoc($sql)){

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
          <input type="button" class="btn btn-car name" onclick="chamarAjax(' . $produto['id'] . ')" name="adicionarCarrinho" id="btn-carrinho" value="Adicionar a sacola"></input>
          <input type="hidden" name="produto_id" value="' . $produto['id'] . '"></input>
          </form>

        </div></div>';


        }
      

      
      ?>



      <!-- Adicione mais cards conforme necessário -->
      </div>
  
    <button class="prev" onclick="prevSlide('Colares')"><span class="material-symbols-outlined">
arrow_back_ios_new
</span></button>
    <button class="next" onclick="nextSlide('Colares')"><span class="material-symbols-outlined">
arrow_forward_ios
</span></button>

  </div>
  </div>
   <div class="d-none h-100 w-100 carrousel-produtos" id="Brincos">

        <div class="carousel-container">
    <div class="carousel" id="carousel-Brincos">
      <?php 
      
      $sql = $mysqli->query("SELECT * FROM produtos WHERE categoria = 'Brinco'");
  
        while($produto = mysqli_fetch_assoc($sql)){

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
          <input type="button" class="btn btn-car name" onclick="chamarAjax(' . $produto['id'] . ')" name="adicionarCarrinho" id="btn-carrinho" value="Adicionar a sacola"></input>
          <input type="hidden" name="produto_id" value="' . $produto['id'] . '"></input>
          </form>
          

        </div></div>';


        }
      

      
      ?>



      <!-- Adicione mais cards conforme necessário -->
      </div>
  
    <button class="prev" onclick="prevSlide('Brincos')"><span class="material-symbols-outlined">
arrow_back_ios_new
</span></button>
    <button class="next" onclick="nextSlide('Brincos')"><span class="material-symbols-outlined">
arrow_forward_ios
</span></button>

  </div>
  </div>

    </section>
    <hr style="margin-top: 8rem;">
<section class="container" id="categorias">
  <div class="container" style="font-size: 24px;">
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
<footer class="footer-Maciella" style="text-align: center;">
<a href='https://instagram.com/maciella_joias?igshid=NGVhN2U2NjQ0Yg=='>@Macieela Ecommerce</a>
    <p>@Todos os Direitos Reservados a Maciella Ecommerce</p>
</footer>
    <script>
        <?php 
            echo file_get_contents('cards.js');
        ?>
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