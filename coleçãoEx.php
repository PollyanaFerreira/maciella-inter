<?php 
if(isset($_POST['visualizar-coleçao-ex'])) {
    include_once('config.php');
    $colecao = $_POST['categoria_id'];
 


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php     echo $colecao; ?> | Maciella</title>
    <script><?php
        echo file_get_contents('script.js');

        ?> </script>
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
    <?php 
 }
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between fixed-top shadow mb-5 bg-white rounded" id="menu-homeOther" style="padding-bottom: 2.5rem !important; ">
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

<section class="d-block" id="contentOther" style="top: 3rem !important; text-align:center;">
        <div class="d-flex " id="card">
        <div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">
  <div class="carousel-inner" style="height: 100vh; width: 100%;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php 
      
      if ($colecao == 'Coleção Serpente') {
        echo "img/coleções/coleção - SERPENTE/270717-cobra-bulgaria-01-1280x720.jpg";
      } else if ($colecao == 'Coleção Pedra'){
        echo "img/coleções/coleção - PEDRA/capas_artigo_D-IF_7__1.png";
      }
      
      ?>" alt="First slide">
    </div>
  </div>

</div>
        </div>
        <div class="d-block h-100" id="">
            <h1 class="font-weight-normal name align-center mt-5 mb-5">        <?php 
            echo $colecao;
        ?></h1>
            <p class="font-weight-normal name align-center mt-5 mb-5 container">
            <?php if ($colecao == 'Coleção Serpente') {

              echo 'A coleção Serpenti da Maciella é uma das mais icônicas e reconhecíveis no mundo da joalheria. Inspirada na majestosa e misteriosa serpente, a coleção captura a beleza e a elegância desse símbolo atemporal.

              Os designs da coleção Serpenti são conhecidos por sua audácia e sofisticação. As peças são habilmente elaboradas em ouro amarelo, branco ou rosa, e muitas vezes acentuadas com diamantes ou gemas preciosas, como esmeraldas, rubis ou safiras. A serpente é representada de maneiras distintas, seja em forma de colares, pulseiras, anéis ou relógios, e cada peça é criada com detalhes meticulosos que capturam a essência e a fluidez da serpente.';

            }else if($colecao == 'Coleção Pedra'){
              echo 'A coleção de joias baseadas em pedras preciosas é uma ode à beleza e raridade das gemas mais preciosas encontradas na natureza. Cada peça dessa coleção é cuidadosamente criada para destacar e realçar a singularidade de cada pedra, combinando artesanato requintado com designs deslumbrantes.

              As pedras preciosas são conhecidas por sua beleza cativante, cores vibrantes e brilho intenso. Nessa coleção, diamantes, rubis, esmeraldas, safiras e outras gemas preciosas são cuidadosamente selecionadas e incorporadas em anéis, colares, brincos e pulseiras magníficas.';
            }
            ?>
</p>
            <div class="container">
                <div class="row">
                    <div class="col font-weight-normal text-left">
                    <b>Filtrar</b>
                    </div>
                    <div class="col font-weight-normal text-right">
                    <b>Ordenar</b>
                    </div>
                </div>
            </div>

          <hr>

          <div class="d-block h-100 w-100 ">

        <div class="container coluna-produtos">
    <div class="row" id="">
      <?php 
      $sql = $mysqli->query("SELECT * FROM produtos WHERE ocupação = '$colecao'");
      while($produto = mysqli_fetch_assoc($sql)){
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
          echo '    <div class="col-sm"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto">
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
        </div>  </div>';
        } else{
        echo '    <div class="col-sm"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto">
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
      </div>  </div>';}
      } 
      ?>



      <!-- Adicione mais cards conforme necessário -->
      </div>
  

  </div>
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
<footer class="footer-Maciella" style="text-align: center;">
<a href='https://instagram.com/maciella_joias?igshid=NGVhN2U2NjQ0Yg=='>@Macieela Ecommerce</a>
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