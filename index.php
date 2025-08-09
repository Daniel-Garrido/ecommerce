<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dtun Guayaberas</title>
  <!-- estilos generales -->
  <link rel="stylesheet" href="css/estilos.css">

  <!-- implementacion de bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- libreria google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

  <!-- libreria de fontawesome -->
  <script src="https://kit.fontawesome.com/eb00b890a6.js" crossorigin="anonymous"></script>

  <!-- Libreria de AOS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
</head>

<body>

  <?php include 'config/db.php'; ?>
  <?php include 'includes/header.php'; ?>

  <!-- btn para redirigir al inicio -->
  <div class="btn-container">
    <a href="#top" id="scrollToTop" class="btn-arriba bg-dark">
      <i class="fas fa-arrow-up"></i>
    </a>
  </div>

  <!-- seccion de carousel de imagenes -->
  <section id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <!-- contenido del carrousel -->
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="Img/slider2.png" class="d-block w-100 vh-100" alt="...">
        <!-- Capa oscura -->
        <div class="overlay"></div>
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <h1 data-aos="fade-up" class="titulo-principal text-white display-3 fw-bold">D´tun Guayaberas</h1>
          <p data-aos="fade-up" class="text-white fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, commodi? Expedita eos necessitatibus vitae numquam corrupti sed adipisci minus hic ex.</p>
        </div>
      </div>
      <!-- contenido del carrousel -->
      <div class="carousel-item " data-bs-interval="2000">
        <img src="Img/slider1.png" class="d-block w-100 vh-100" alt="...">
        <!-- Capa oscura -->
        <div class="overlay"></div>
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <p class="text-white fs-6"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, commodi? Expedita eos necessitatibus vitae numquam corrupti sed adipisci minus hic ex, facilis, mollitia ea quas quod porro dolorem! Dicta, et!</p>
        </div>
      </div>
      <!-- contenido del carrousel -->
      <div class="carousel-item " data-bs-interval="2000">
        <img src="Img/slider3.png" class="d-block w-100 vh-100" alt="...">
        <!-- Capa oscura -->
        <div class="overlay"></div>
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <p class="text-white fs-6"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, commodi? Expedita eos necessitatibus vitae numquam corrupti sed adipisci minus hic ex, facilis, mollitia ea quas quod porro dolorem! Dicta, et!</p>
        </div>
      </div>
    </div>

    <!-- botones para deslizar -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </section>

  <!-- Sección Garantías -->
  <section class="bg-light py-5">
    <div class="container text-center">
      <h2 data-aos="fade-up" class="mb-5 fw-normal" data-aos="fade-up">Compra tu Guayabera con seguridad</h2>
      <div class="row g-4 justify-content-center">

        <!-- Envío gratis -->
        <div data-aos="fade-up" class="col-12 col-sm-6 col-md-3">
          <div class="benefit">
            <i class="bi bi-truck fs-1"></i>
            <h5 class="fw-bold mt-3">ENVÍO A TODO MÉXICO</h5>
            <p class="text-muted">Hacemos envios a todo el pais (consulta los precios de envío)</p>
          </div>
        </div>

        <!-- Pagos seguros -->
        <div data-aos="fade-up" class="col-12 col-sm-6 col-md-3">
          <div class="benefit">
            <i class="bi bi-credit-card-2-front-fill fs-1"></i>
            <h5 class="fw-bold mt-3">PAGOS 100% SEGUROS</h5>
            <p class="text-muted">Aceptamos pagos mediante transferencia bancaria y en efectivo</p>
          </div>
        </div>

        <!-- Cambios y devoluciones -->
        <div data-aos="fade-up" class="col-12 col-sm-6 col-md-3">
          <div class="benefit">
            <i class="bi bi-box-seam fs-1"></i>
            <h5 class="fw-bold mt-3">CAMBIOS Y DEVOLUCIONES</h5>
            <p class="text-muted">Puedes hacer cambios y Devoluciones - Consulta nuestras políticas.</p>
          </div>
        </div>

        <!-- Asistencia por WhatsApp -->
        <div data-aos="fade-up" class="col-12 col-sm-6 col-md-3">
          <div class="benefit">
            <i class="bi bi-whatsapp fs-1 text-success"></i>
            <h5 class="fw-bold mt-3">ASISTENCIA VÍA WHATSAPP</h5>
            <p class="text-muted">Puedes hacer tus preguntas y cotizar a nuestro whatsapp</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- contenedor de informacion de titulo -->
  <a name="Tienda"></a>
  <div class="container mt-4">
    <h2 data-aos="fade-up" class="fw-normal">Bienvenido a nuestra tienda</h2>
    <p data-aos="fade-up">Explora nuestros productos y disfruta de una experiencia de compra única.</p>
  </div>

  <!-- Seccion de productos -->
  <section id="" class="container mt-5 mb-4">
    <div class="row">

      <?php
      $sql = "SELECT * FROM productos";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
        $productId = $row['id']; // busca el id de los productos
      ?>

        <!-- contenido de los productos -->
        <div class="col-6 col-md-3 mb-4">
          <!-- card de los productos -->
          <div class="contenido-productos card h-100 text-center border-0">
            <img data-aos="fade-up" src="uploads/<?php echo htmlspecialchars($row['imagenProducto']); ?>" class="card-img-top"
              style="height: 250px; object-fit: cover;"
              alt="Imagen del producto"
              data-bs-toggle="modal"
              data-bs-target="#modal<?php echo $productId; ?>">

            <div data-aos="fade-up" class="card-body d-flex flex-column">
              <h6 class="fw-semibold mb-0"><?php echo htmlspecialchars($row['nombreProducto']); ?></h6>
              <p class="text-muted">Precio: $<?php echo number_format((float)$row['precioProducto'], 2); ?> mxn</p>

              <!-- Iconos -->
              <div class="iconos-productos d-flex justify-content-center gap-3 mt-auto ">
                <!-- boton para agregar a favoritos -->
                <i class="fa-regular fa-heart"></i>
                <!-- Botón que abre el modal -->
                <i class="fa-regular fa-eye cursor-pointer"
                  data-bs-toggle="modal"
                  data-bs-target="#modal<?php echo $productId; ?>">
                </i>
              </div>
              <!-- boton para agregar al carrito -->
              <div class="mt-4">
                <button class="btn btn-primary agregar-carrito"
                  data-id="<?php echo $row['id']; ?>"
                  data-nombre="<?php echo htmlspecialchars($row['nombreProducto']); ?>"
                  data-precio="<?php echo $row['precioProducto']; ?>"
                  data-imagen="uploads/<?php echo htmlspecialchars($row['imagenProducto']); ?>">
                  Agregar al carrito
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal del producto -->
        <div class="modal fade" id="modal<?php echo $productId; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $productId; ?>" aria-hidden="true">

          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">

              <div class="modal-body d-flex flex-column flex-md-row gap-2 p-2">
                <!-- boton para cerrar el modal -->
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Cerrar"></button>

                <!-- contenedor de la imagen del producto  -->
                <div class="flex-shrink-0 text-center ">
                  <img src="uploads/<?php echo htmlspecialchars($row['imagenProducto']); ?>" class="img-fluid" style="max-width: 400px;" alt="Producto">
                </div>

                <!-- contenido de la informacion del producto  -->
                <div class="p-4">
                  <h5 class="modal-title fw-semibold" id="modalLabel<?php echo $productId; ?>">
                    <?php echo htmlspecialchars($row['nombreProducto']); ?>
                  </h5>
                  <p class="text-muted fw-bold mt-2">Precio :$<?php echo number_format((float)$row['precioProducto'], 2); ?> MXN</p>
                  <h5 class="modal-title fw-normal mt-4">
                    Descripción del producto:
                  </h5>
                  <p class="mt-2"><?php echo htmlspecialchars($row['descripcionProducto']); ?></p>

                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <?php include 'includes/contacto.php'; ?>
  <?php include 'includes/footer.php'; ?>

  <!-- script de bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- script local -->
  <script src="js/js.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Libreria de AOS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

  <!-- Libreria local de javascript -->
  <script src="js/formulario.js"></script>
</body>

</html>