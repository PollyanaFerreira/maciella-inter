let currentIndex = 0;
const carousel = document.getElementById('carousel');

var aneis = document.getElementById('carousel-Aneis');
var colares = document.getElementById('carousel-Colares');
var brincos = document.getElementById('carousel-Brincos');


const totalCards = document.querySelectorAll('.card').length;

function showSlide(index, categoria) {
  if (index < 0) {
    currentIndex = totalCards - 1;
  } else if (index >= totalCards) {
    currentIndex = 0;
  } else {
    currentIndex = index;
  }

  const translateValue = -currentIndex * 30 + '%';
  
  if (categoria == 'Todos'){
    carousel.style.transform = 'translateX(' + translateValue + ')';
  } else if (categoria == 'Brincos'){
    brincos.style.transform = 'translateX(' + translateValue + ')';
  }else if (categoria == 'Colares'){
    colares.style.transform = 'translateX(' + translateValue + ')';
  }else if (categoria == 'Aneis'){
    aneis.style.transform = 'translateX(' + translateValue + ')';
  }

}

function prevSlide(categoria) {
  showSlide(currentIndex - 1, categoria);
}

function nextSlide(categoria) {
  showSlide(currentIndex + 1, categoria);
}