<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleções | Maciella</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
<script>
        <?php
        echo file_get_contents('script.js');

        ?>

    </script>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between fixed-top shadow mb-5 bg-white rounded" id="menu-home" style="padding-bottom: 3rem !important; ">
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
    <a href="finalizarCompra.php"><button class="ver-produto">Finalizar compra</button></a>

  </section>
<section class="container" id="categorias" style="margin-top: 10rem;">
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
<form class="link-página-coleção" action="coleçãoEx.php" method="post">
<input type="submit" class="visualizar-coleção" name="visualizar-coleçao-ex" id="btn-acessar-Serpent" value=""><h6 class="titulo">Serpente</h6></input>
          <input type="hidden" name="categoria_id" value="Coleção Serpente"></input>
</form>

<form class="link-página-coleção" action="coleçãoEx.php" method="post">
<input type="submit" class="visualizar-coleção" name="visualizar-coleçao-ex" id="btn-acessar-Pedra" value=""><h6 class="titulo">Pedra</h6></input>
          <input type="hidden" name="categoria_id" value="Coleção Pedra"></input>
</form>
<footer class="footer-Maciella" style="text-align: center;">
    <a href='https://instagram.com/maciella_joias?igshid=NGVhN2U2NjQ0Yg=='>@Macieela Ecommerce</a>
    <p>@Todos os Direitos Reservados a Maciella Ecommerce</p>
</footer>
</body>
</html>