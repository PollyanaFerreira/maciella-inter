<?php 
$img = $_POST['img'];

if($img = 'img-1'){
    $data =  ' <img id="imagem-G"  src="<?= $produto["imagem"] ?>.png" height="570" width="530">';
}  else {
   $data = ' <img id="imagem-G"  src="<?= $produto["imagem_2"] ?>.png" height="570" width="530">';
}
echo $data;
?>