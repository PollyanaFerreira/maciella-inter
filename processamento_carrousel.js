function mudaCarou(categoria) {
    var container = document.getElementById(categoria)
    var aneis = document.getElementById('Aneis')
    var colares = document.getElementById('Colares')
    var brincos = document.getElementById('Brincos')
    var todos = document.getElementById('Todos')

    aneis.classList.remove('d-block');
    colares.classList.remove('d-block');
    brincos.classList.remove('d-block');
    todos.classList.remove('d-block');

    aneis.classList.add('d-none');
    colares.classList.add('d-none');
    brincos.classList.add('d-none');
    todos.classList.add('d-none');

    container.classList.remove('d-none');
    container.classList.add('d-block');
}