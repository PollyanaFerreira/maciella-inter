<?php
session_start();

 include_once('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: home.php');
} else{
    $logado = $_SESSION['email'];

    
if(isset($_POST['sair'])){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: home.php');
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Maciella</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="user.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
                <?php
        echo file_get_contents('user.css') 
        ?>
    </style>
        <style>
        <?php
        echo file_get_contents('style.css');
        ?>
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-between fixed-top shadow mb-5 bg-white rounded" id="menu-homeOther" style="padding-bottom: 2.5rem !important;background-color: white; ">
            <div class="d-flex" id="link">
                <a class="navbar-brand" href="#">Contatos</a>
            </div>
            <div class="d-flex position-relative" id="container-logo">
                <a  id="logo" href="index.php"><h1>Maciella</h1></a>
            </div>
            <div class="d-flex" id="btn-login">
                <a class="navbar-brand" href="#"><span class="material-symbols-outlined">
                    account_circle
                    </span></a>
                
            </div>

        </nav>
    </header>
    <div class="d-flex justify-content-start">
    <div class="" id="nave-menu">
        <div class="d-block" id="links-nave">
        <a class="d-block" href="#itens-info">Informações da Conta</a>
        <a class="d-block" href="#minhasCompras">Minhas Compras</a>
        <a class="d-block" href="#infos-Entrega">Informações de Entrega</a>
        </div>
        
    </div>
    <div class="" id="infos" style=" overflow-y: scroll;"> 
        <div id="itens-info">
        <h1>Minha Conta</h1>
    <?php

$sql = $mysqli->query("SELECT * FROM usuarios WHERE email = '$logado'");
while($user = mysqli_fetch_assoc($sql)){
    if ($user["sexo"] == 'masculino'){
    echo "<h1 id='usarname'>Bem vindo: " . $user["nome"] . ".</h1>";
    }if ($user["sexo"] == 'feminino'){
    echo "<h1 id='usarname'>Bem vinda: " . $user["nome"] . ".</h1>";
    }






?>
<div class="d-flex position-relative" id="campos-up">
                <form action="user.php" method="POST" id="formulario-update">
                    <fieldset>
                    <div class="mb-3">
                       
                        <label for="nome" class="labelInput">Nome completo</label>
                        <input type="text" name="nome" id="nome" class="inputUser" placeholder='<?php 
                            echo $user['nome'];


                        ?>' >
                    </div>
                    <div class="mb-3">
                    <label for="email" class="labelInput">Email</label>
                        <input type="text" name="email" id="email" class="inputUser" placeholder='<?php 
                            echo $user['email'];


                        ?>'>
                       
                    </div>
                
                      <div class="mb-3">
                      <label for="telefone" class="labelInput">Telefone</label>
                      <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder='<?php 
                            echo $user['telefone'];
}
}
                        ?>' >
                   
                      </div>
           

 
                    </fieldset>
                  </form>
            </div>
    <form action="user.php" method="POST">
    <button type="submit" name="sair" id="logout">Sair</button>
</form>
        </div>
      <div class="container" id="minhasCompras">
      <div class="container" style="margin-bottom: 1rem; ">
      <h1>Minhas Compras</h1>
      <div class="container coluna-produtos">
    <div class="row" id="">
    <?php 
      $sql = $mysqli->query("SELECT * FROM minhas_compras WHERE usuario = '$logado'");
      while($row = mysqli_fetch_assoc($sql)){
        $id_produto = $row['id_produto'];
        $produtos = $mysqli->query("SELECT * FROM produtos WHERE id = '$id_produto'");
        if($produto = mysqli_fetch_assoc($produtos)){
            echo '    <div class="col-sm card col-md-5"><div class="h-100 m-2 d-flex flex-column p-2 justify-content:between shadow-sm p-3 mb-5 bg-white rounded card-produto" id="card-produto-user">
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
          </div>  </div>';
          
          
        }
       
      } 
      ?>
    </div>   </div>
                </div>
      </div>
      <div class="container" style="margin-left: 0; padding: 4rem;">
        <h1>Informações de Entrega</h1>
            <div class="d-block" id="infos-Entrega">

                <div class="conteudos-finaliza" id="entrega-infos">
                  <?php
                   
                   $user = $mysqli->query("SELECT * FROM usuarios WHERE email = '$logado'"); 
                   if ($row = mysqli_fetch_assoc($user)) {
             
                   
                   ?> 
                   <div class="container" style="text-align: center;margin-top: 4rem;">
                    <h6>Endereço</h6   >
                        <div class="container endereco" style="text-align: center;">
                            <p><?php 
                            
                            echo "" . $row['endereço'] . ", " . $row['cidade'];}
                            
                            ?></p>
                        </div>
                   </div>
                </div>
      </div>
    </div>

    </div>


</body>
</html>