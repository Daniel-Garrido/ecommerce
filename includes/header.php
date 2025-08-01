<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start(); //inicia la sesion
}
?>

<!-- menu de navegacion -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Logo</a>

    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Tienda Guayaberas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active text-white" aria-current="page" href="includes/sobreNegocio.php">Sobre nosotros</a>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>


          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Guayaberas para caballero</a></li>
            <li><a class="dropdown-item" href="#">Guayaberas para dama</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Servicio de mayoreo</a></li>
          </ul>

        </li>

        <!-- icono de lista de deseos -->
        <li class="nav-item">
          <a href="wishlist.php" class="nav-link text-white position-relative">
            <i class="fa-regular fa-heart fa-lg"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
          </a>
        </li>

        <!-- icono de ver carrito -->
        <li class="nav-item">
          <a href="#" class="nav-link text-white position-relative" data-bs-toggle="modal" data-bs-target="#modalCarrito">
            <i class="fa-solid fa-cart-shopping fa-lg"></i>
            <span id="contador-carrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>
            </span>
          </a>

        </li>

      </ul>

    </div>

  </div>
</nav>

<!-- modal para el carrito de compras -->
<div class="modal fade" id="modalCarrito" tabindex="-1">
  <div class="modal-dialog modal-dialog-end modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tu carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- contenido del modal -->
      <div class="modal-body">
        <?php if (!empty($_SESSION['carrito'])): ?>
          <?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
            <div class="d-flex align-items-center justify-content-between mb-3">
              <!-- Info producto -->
              <div class="d-flex align-items-center">
                <img src="<?php echo $producto['imagen']; ?>" width="60" class="me-3">
                <div>
                  <strong><?php echo htmlspecialchars($producto['nombre']); ?></strong><br>
                  Precio: $<?php echo number_format((float)$producto['precio'], 2); ?> mxn
                </div>
              </div>

              <!-- Botón eliminar -->
              <form method="post" action="includes/eliminar_carrito.php" onsubmit="return confirm('¿Eliminar este producto del carrito?')">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>Tu carrito está vacío.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>