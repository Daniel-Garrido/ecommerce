//crear evento para el boton de scroll  top
document.addEventListener("DOMContentLoaded", function(){
  const scrollTopBtn = document.getElementById("scrollToTop");
  //
  window.addEventListener("scroll", function(){
    if(this.window.scrollY > 600){
      scrollTopBtn.style.display = "block"; // mostrar el boton 
    }
    else{
      scrollTopBtn.style.display = "none"; // Ocultar el botón
    }
  });

  scrollTopBtn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth", // Desplazamiento suave
    });
  });

});


//codigo para el carrito de compras

document.querySelectorAll('.agregar-carrito').forEach(boton => {
  boton.addEventListener('click', function () {
    const id = this.dataset.id;
    const nombre = this.dataset.nombre;
    const precio = this.dataset.precio;
    const imagen = this.dataset.imagen;

    fetch('includes/agregar_carrito.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ id, nombre, precio, imagen })
    })
    .then(response => response.json())
    .then(data => {
      document.getElementById('contador-carrito').textContent = data.total;
    });
  });
});


