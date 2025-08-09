//Iniciar la libreria AOS
document.addEventListener("DOMContentLoaded", function () {
  AOS.init({
    duration: 800,
    once: false,
  });
});

//cerrar el menu de navegacion
document.addEventListener("DOMContentLoaded", () => {
  const navbarCollapse = document.getElementById("navbarSupportedContent");
  if (!navbarCollapse) return;

  // Cierra el menú solo en enlaces que REALMENTE navegan
  const links = navbarCollapse.querySelectorAll(
    ".nav-link:not(.dropdown-toggle), .dropdown-item:not(.dropdown-toggle)"
  );

  links.forEach((link) => {
    link.addEventListener("click", () => {
      // Si el menú está abierto, lo cerramos
      if (navbarCollapse.classList.contains("show")) {
        const bsCollapse =
          bootstrap.Collapse.getInstance(navbarCollapse) ||
          new bootstrap.Collapse(navbarCollapse, { toggle: false });
        bsCollapse.hide();
      }
    });
  });

  // Evita que el dropdown principal se cierre al abrir submenús
  const dropdownToggles = navbarCollapse.querySelectorAll(
    '[data-bs-toggle="dropdown"]'
  );
  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
      e.stopPropagation();
    });
  });
});


//crear evento para el boton de scroll  top
document.addEventListener("DOMContentLoaded", function () {
  const scrollTopBtn = document.getElementById("scrollToTop");
  //
  window.addEventListener("scroll", function () {
    if (this.window.scrollY > 600) {
      scrollTopBtn.style.display = "block"; // mostrar el boton
    } else {
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


// Utilidad: recalcular totales leyendo la UI actual del modal
function actualizarTotal() {
  let total = 0;
  document
    .querySelectorAll("#modalCarrito .cantidad-input")
    .forEach((input) => {
      const card = input.closest(".d-flex");
      if (!card) return;

      const precioUnitario = parseFloat(
        card.querySelector(".precio-unitario")?.innerText || 0
      );
      const cantidad = parseInt(input.value) || 1;
      const subtotal = precioUnitario * cantidad;

      const subtotalSpan = card.querySelector(".subtotal-item");
      if (subtotalSpan) subtotalSpan.textContent = subtotal.toFixed(2);
      total += subtotal;
    });

  const totalGeneral = document.getElementById("total-general");
  if (totalGeneral) totalGeneral.textContent = total.toFixed(2);
}

// Arma el enlace de WhatsApp con lo que hay en el modal
function armarWhatsApp() {
  const btnFinalizar = document.getElementById("btnFinalizarCompra");
  if (!btnFinalizar) return;

  const items = document.querySelectorAll("#modalCarrito .cantidad-input");
  let mensaje = "Hola, me interesaría comprar los siguientes productos:\n\n";
  let total = 0;

  items.forEach((input) => {
    const card = input.closest(".d-flex");
    if (!card) return;

    const nombre = card.querySelector("strong")?.innerText || "Producto";
    const subtotal = parseFloat(
      card.querySelector(".subtotal-item")?.innerText || 0
    );
    const cantidad = parseInt(input.value) || 1;

    mensaje += `• ${nombre} x${cantidad} - Subtotal: $${subtotal.toFixed(2)}\n`;
    total += subtotal;
  });

  mensaje += `\nTotal: $${total.toFixed(2)} MXN`;
  const numero = "529881033705";
  const url = `https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`;
  btnFinalizar.setAttribute("href", url);
}

// Pide al servidor el HTML del modal-body y lo coloca
async function refrescarModal() {
  const modalBody = document.querySelector("#modalCarrito .modal-body");
  if (!modalBody) return;

  const res = await fetch("includes/render_carrito.php", { cache: "no-store" });
  const html = await res.text();
  modalBody.innerHTML = html;

  // recalcular total y preparar whatsapp con el contenido nuevo
  actualizarTotal();
  armarWhatsApp();
}

// Delegación de eventos dentro del modal (no se pierden al re-render)
function bindDelegatedEvents() {
  const modalBody = document.querySelector("#modalCarrito .modal-body");
  if (!modalBody) return;

  // Cambios de cantidad -> recalcular totales
  modalBody.addEventListener("change", async (e) => {
    if (e.target.classList.contains("cantidad-input")) {
      if (e.target.value < 1) e.target.value = 1;
      actualizarTotal();
      armarWhatsApp();
      // (Opcional) Podrías enviar aquí un fetch a un endpoint para persistir la cantidad en sesión
      // fetch('includes/actualizar_cantidad.php', { ... })
    }
  });

  // Eliminar producto por AJAX
  modalBody.addEventListener("submit", async (e) => {
    const form = e.target;
    if (form.classList.contains("form-eliminar")) {
      e.preventDefault();
      const formData = new FormData(form);
      await fetch(form.action, { method: "POST", body: formData }); // elimina en server
      await refrescarModal(); // repinta modal
      // Actualiza el contador (volvemos a contar en server pidiendo el header del carrito si quisieras,
      // aquí haremos una llamada rápida a renderizar para mantenerlo simple)
      // mejor pedimos un pequeño endpoint para count... pero nos apoyamos en refrescar después del add.
      // Como alternativa rápida: recalc badge leyendo .cantidad-input length
      const contador = document.getElementById("contador-carrito");
      if (contador) {
        const distintos = document.querySelectorAll(
          "#modalCarrito .form-eliminar"
        ).length;
        contador.textContent = distintos;
      }
    }
  });

  // Click en botón Finalizar -> ya se arma el enlace cada vez que se refresca y al cambiar cantidades
  // (si quieres forzar rearmar en cada click)
  document.addEventListener("click", (e) => {
    if (e.target && e.target.id === "btnFinalizarCompra") {
      armarWhatsApp();
    }
  });
}

// Click en "Agregar al carrito"
function bindAddToCart() {
  document.querySelectorAll(".agregar-carrito").forEach((boton) => {
    boton.addEventListener("click", async function () {
      const id = this.dataset.id;
      const nombre = this.dataset.nombre;
      const precio = this.dataset.precio;
      const imagen = this.dataset.imagen;

      try {
        const resp = await fetch("includes/agregar_carrito.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ id, nombre, precio, imagen }),
        });
        const data = await resp.json();

        // Actualiza badge del carrito
        if (data && data.ok) {
          const badge = document.getElementById("contador-carrito");
          if (badge) badge.textContent = data.total ?? 0;

          // SweetAlert (si la tienes cargada)
          if (window.Swal) {
            Swal.fire({
              icon: "success",
              title: "Agregado al carrito",
              text: `"${nombre}" fue agregado correctamente.`,
              confirmButtonColor: "#28a745",
              timer: 1300,
              showConfirmButton: false,
            });
          }
        }

        // Repinta el contenido del modal con lo más reciente del server
        await refrescarModal();
      } catch (err) {
        console.error(err);
        if (window.Swal) {
          Swal.fire({
            icon: "error",
            title: "Ups",
            text: "No se pudo agregar. Intenta de nuevo.",
          });
        }
      }
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  bindAddToCart();
  bindDelegatedEvents();
  // Si el usuario abre la página con carrito ya cargado, aseguramos total/whatsapp
  actualizarTotal();
  armarWhatsApp();
});
