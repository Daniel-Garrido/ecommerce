<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- estilos generales -->
  <link rel="stylesheet" href="css/estilos.css">

  <!-- implementacion de bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- libreria fontawesome -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

</head>

<body>

  <?php include 'config/db.php'; ?>
  <?php include 'includes/header.php'; ?>

  <!-- seccion de carousel de imagenes -->
  <section id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="Img/img1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-white">D´tun Guayaberas</h5>
          <p class="text-white"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, commodi? Expedita eos necessitatibus vitae numquam corrupti sed adipisci minus hic ex, facilis, mollitia ea quas quod porro dolorem! Dicta, et!</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="Img/img1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-white">D´tun Guayaberas</h5>
          <p class="text-white"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, commodi? Expedita eos necessitatibus vitae numquam corrupti sed adipisci minus hic ex, facilis, mollitia ea quas quod porro dolorem! Dicta, et!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="Img/img1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-white">D´tun Guayaberas</h5>
          <p class="text-white"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate, commodi? Expedita eos necessitatibus vitae numquam corrupti sed adipisci minus hic ex, facilis, mollitia ea quas quod porro dolorem! Dicta, et!</p>
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

  <!-- contenedor de informacion de titulo -->
  <div class="container mt-4">
    <h1>Bienvenido a nuestra tienda</h1>
    <p>Explora nuestros productos y disfruta de una experiencia de compra única.</p>
  </div>

  <!-- seccion de productos -->
  <section class="container mt-5">
    
    <div class="row">

      <?php
      $sql = "SELECT * FROM productos";
      $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
      ?>

        <!-- cards de los productos -->
        <div class="col-md-3 mb-2">
          <div class="card h-100">
            <img src="uploads/<?php echo htmlspecialchars($row['imagenProducto']); ?>" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Imagen del producto">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo htmlspecialchars($row['nombreProducto']); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($row['descripcionProducto']); ?></p>
              <p class="card-text fw-bold text-dark mt-auto">Precio: $<?php echo number_format((float)$row['precioProducto'], 2); ?> mxn</p>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

    </div>
  </section>
  <?php include 'includes/contacto.php';?>
  <?php include 'includes/footer.php'; ?>

  <!-- script de bootsrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>