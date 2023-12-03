document.addEventListener('scroll', rolar);

var ultimaPosicao = 0;

function rolar() {
        var atualPosicao = window.scrollY;
        var logo = document.getElementById('logo')
        var menu = document.getElementById('menu-home')
        var conteudo = document.getElementById('content')
        var roxo = document.getElementById('card')
        var btnLogin = document.getElementById('btn-login')
        var btnCar = document.getElementById('btn-carrinho')
        var contato = document.getElementById('link')
        var drop = document.getElementById('drop')
        if(atualPosicao > ultimaPosicao) {
            logo.style.fontSize = "3rem"
            menu.style.paddingBottom = "3rem"
            conteudo.style.top = "7rem"
            roxo.style.top = "8rem"
            btnCar.classList.remove('d-none')
            btnCar.classList.add('d-flex')
            btnLogin.classList.remove('d-none')
            btnLogin.classList.add('d-flex')
            contato.classList.remove('d-none')
            contato.classList.add('d-flex')
            menu.classList.add('shadow', 'p-3', 'mb-5', 'bg-white', 'rounded')

          
           
        } else {
            conteudo.style.top = "27rem"
            logo.style.fontSize = "20rem"
            menu.style.paddingBottom = "22rem"
            btnCar.classList.remove('d-flex')
            btnCar.classList.add('d-none')
            btnLogin.classList.remove('d-flex')
            btnLogin.classList.add('d-none')
            contato.classList.remove('d-flex')
            contato.classList.add('d-none')
            menu.classList.remove('shadow', 'p-3', 'mb-5', 'bg-white', 'rounded')
    
       
        }

       
    }

    function abrirCarrinho() {
        var carr = document.getElementById('carrinho')
        carr.style.marginLeft = "75%"

        $.ajax({
    
            
            url: 'mostraCarrinho.php',
            success: function(data, valor){

                $('#produtos-car').html(data);
                $('#preco-total').html(valor);
                var sacola = document.getElementById('sacola-Car')
                sacola.style.color = 'black';
            },
            error: function(){
                alert('error')
            }
        })
    }
    function fecharCarrinho() {
        var carr = document.getElementById('carrinho')
        carr.style.marginLeft = "100%"
    }   
    function retirarProduto(id){
        var id_produto = id
        $.ajax({
    
            type: 'post',
            url: 'retirarProduto.php',
            data: $('#retirar-' + id_produto).serialize(),
            success: function(data){

                $('#card-Car-' + id_produto).html(data);
                attSubtotal()
                abrirCarrinho()
            },
            error: function(){
                alert('error')
            }
        })
    }
function avancar(anter, prox){
    var antes = document.getElementById(anter)
    var proxima = document.getElementById(prox)

    antes.classList.remove('d-block')
    antes.classList.add('d-none')
    proxima.classList.remove('d-none')
    proxima.classList.add('d-block')

}
function finalizaCompra(){
    $.ajax({
    
        type: 'post',
        url: 'minhasCompras.php',
        success: function(){


        },
        error: function(){
            alert('error')
        }
    })
}
function mudaImagem(img){

    var imagem = img
   var imagemG = document.getElementById('imagem-G')
    var imagemG2 = document.getElementById('imagem-G2')


    if(imagem == "img-1"){
        imagemG.classList.remove('d-none')
       imagemG.classList.add('d-block')
       imagemG2.classList.remove('d-block')
        imagemG2.classList.add('d-none')
    } else if(imagem == "img-2"){
        imagemG2.classList.remove('d-none')
        imagemG2.classList.add('d-block')
        imagemG.classList.remove('d-block')
       imagemG.classList.add('d-none')
    }

}
function aumentaCar(produto){
    $.ajax({
    
        type: 'post',
        url: 'aumentar.php',
        data: $('#aumentar-' + produto).serialize(),
        success: function(Quantidade){

            $('#quantidade-' + produto).html(Quantidade);
            attPreco(produto)
        },
        error: function(){
            alert('error')
        }
    })
}
function diminuiCar(produto){
    $.ajax({
    
        type: 'post',
        url: 'diminuir.php',
        data: $('#diminuir-' + produto).serialize(),
        success: function(Quantidade){

            $('#quantidade-' + produto).html(Quantidade);
            attPreco(produto)
        },
        error: function(){
            alert('error')
        }
    })
}
function attPreco(produto){
    $.ajax({
    
        type: 'post',
        url: 'attpreco.php',
        data: $('#aumentar-' + produto).serialize(),
        success: function(preco){

            $('#preco-' + produto).html(preco);
            attSubtotal()
        },
        error: function(){
            alert('error')
        }
    })
}
function attSubtotal(){
    $.ajax({
    
        type: 'post',
        url: 'subTotal.php',
        success: function(preco){
            var sub = preco.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            $('#valor-final').html(sub);
        },
        error: function(){
            alert('error')
        }
    })
}

    