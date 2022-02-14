var myIndex = 0;
function carousel() { // hace que pasen solas las imagenes
    var i;
    var x = document.getElementsByClassName("mySlides");

    for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";  // accedemos a la clase i-esima y la escondemos
    }

    myIndex++;

    if (myIndex > x.length) {
	    myIndex = 1 // si se pasa de cantidad de slides, volvemos a la primera
    }    

    x[myIndex-1].style.display = "block";  // mostramos la slide actual
    setTimeout(carousel, 8000); // 8000 = 2 seconds --> cada 2 segundos cambia de slide (se repite la funcion)
}

function plusSlides(n) { // paso como parametro n (1 o -1) o sea, si adelanto o atraso
  showSlides(myIndex += n); // myindex es el index actual
}

function currentSlide(n) {
  showSlides(myIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length){ // si llegamos a la ultima slide, volvemos a la primera
    myIndex = 1;
  }    

  if (n < 1){ // si estamos yendo hacia la slide anterior y se termina, la slide actual es la ultima
    myIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  // por cada click, escondo las demas slides
  }


  slides[myIndex-1].style.display = "block";  // mostramos la slide actual

}

window.onload = carousel();
window.onload = showSlides(myIndex);