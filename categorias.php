<?php
include_once('config.php');
include_once('telaProdutos.php');
$idCategoria = $_SESSION['categoria_id'];
$sql = $mysqli->query("SELECT * FROM produtos WHERE categoria = '$idCategoria'");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
            echo $idCategoria;
        ?>
    </title>
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
        <div class="d-flex" id="card">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="height: 100vh; width: 100%;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/slider/modelo-demonstrando-brincos-e-anel.jpg" alt="First slide">
    </div>
  </div>

</div>
        </div>
        <div class="d-block h-100" id="">
            <h1 class="font-weight-normal name align-center mt-5 mb-5">        <?php 
            echo $idCategoria;
        ?></h1>
            <p class="font-weight-normal name align-center mt-5 mb-5 container">
                <?php if ($idCategoria == 'Anel') {
                    echo 'Os anéis são uma das mais antigas formas de joias, utilizados há séculos como símbolos de status, beleza e expressão pessoal. Ao longo dos anos, eles evoluíram em estilo e design, tornando-se peças de destaque no mundo da moda e da joalheria.

                    Os anéis de joalheria são geralmente feitos de metais preciosos, como ouro, prata ou platina, e podem apresentar uma variedade de gemas preciosas ou semipreciosas. Cada anel é único, oferecendo uma combinação única de estilo, pedras e acabamentos.';
                    }else if($idCategoria == 'Brinco'){
                        echo 'Os brincos são uma das peças mais populares e versáteis na joalheria. Eles são usados nas orelhas e podem adicionar um toque de elegância, sofisticação e personalidade a qualquer visual. Os brincos são disponibilizados em uma ampla variedade de estilos, materiais e designs, tornando-se uma escolha perfeita para qualquer ocasião.

                        Os brincos de joalheria são feitos com metais preciosos, como ouro, prata ou platina, e podem ser aprimorados com gemas preciosas, como diamantes, rubis, esmeraldas e safiras, ou com pedras semipreciosas, como ametistas, topázios e pérolas. Eles podem apresentar designs clássicos, como argolas, brincos de pino ou brincos de tarraxa, ou designs mais extravagantes e modernos, como brincos de gota, brincos de franja ou brincos assimétricos.';
                    } else if($idCategoria == 'Colar'){
                        echo 'Os colares são acessórios que têm sido apreciados ao longo da história por sua beleza e elegância. Essas peças de joalheria são usadas no pescoço e podem ser encontradas em uma ampla variedade de estilos, materiais e designs, tornando-se um elemento essencial para qualquer guarda-roupa.

                        Os colares de joalheria são feitos com materiais preciosos, como ouro, prata ou platina, e podem ser adornados com pedras preciosas, como diamantes, rubis, esmeraldas e safiras, ou com pedras semipreciosas, como ametistas, topázios e turmalinas. Além disso, muitos colares apresentam designs únicos, como pingentes, correntes delicadas, colares de pérolas e colares de correntes entrelaçadas.';
                    }
                    
                    
                    ?>

            .</p>
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
      $sql = $mysqli->query("SELECT * FROM produtos WHERE categoria = '$idCategoria'");

      while($produto = mysqli_fetch_assoc($sql)){
        if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
            echo '<div class="card col-md-5"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto">
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
        echo '<div class="card col-md-5"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto">
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