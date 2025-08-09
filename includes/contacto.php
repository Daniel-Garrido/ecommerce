<a name="form"></a>
<div id="CONTACTO" class="container my-5">  
  <h2 data-aos="fade-up" class="fw-normal mb-4 text-center">
    Para servicio de mayoreo puede contactarnos
  </h2>

  <form id="formContacto" class="p-4 border border-light border-2" novalidate>
    <!-- Nombre -->
    <div class="mb-3">
      <label data-aos="fade-up" for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="emailjs_name" placeholder="Ingresa tu nombre" required>
    </div>

    <!-- Correo -->
    <div class="mb-3">
      <label data-aos="fade-up" for="correo" class="form-label">Correo Electrónico</label>
      <input type="email" class="form-control" id="correo" name="emailjs_email" placeholder="nombre@ejemplo.com" required>
    </div>

    <!-- Servicio -->
    <div class="mb-3">
      <label data-aos="fade-up" for="servicio" class="form-label">Describe tu servicio</label>
      <textarea class="form-control" id="servicio" name="emailjs_message" rows="4" placeholder="Describe brevemente el servicio que necesitas" required></textarea>
    </div>

    <!-- Botón -->
    <button  type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>


<!--Libreria de SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--Libreria de EmailJS SDK -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
<!-- Libreria local de javascript -->
<script src="js/formulario.js"></script>

