

function chamarAjax(id){

        var id_produto = id

        $.ajax({
    
            type: 'post',
            url: 'produtoCarrinho.php',
            data: $('#form_Kart-' + id_produto).serialize(),
            success: function(){
                var sacola = document.getElementById('sacola-Car')
                sacola.style.color = '#785196CF';
                abrirCarrinho()
               
                
                
            },
            error: function(){
                alert('error')
            }
        })
      


}

    
