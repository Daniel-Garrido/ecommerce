<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

if (empty($_SESSION['carrito'])) {
  echo '<p>Tu carrito está vacío.</p>';
  exit;
}
?>

<?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
  <?php
    $nombre   = isset($producto['nombre']) ? htmlspecialchars($producto['nombre']) : 'Producto sin nombre';
    $precio   = isset($producto['precio']) ? (float)$producto['precio'] : 0;
    $cantidad = isset($producto['cantidad']) ? (int)$producto['cantidad'] : 1;
    $imagen   = isset($producto['imagen']) ? $producto['imagen'] : 'img/default.jpg';
    $subtotal = $precio * $cantidad;
  ?>
  
  <div class="d-flex align-items-center justify-content-between mb-3">
    <!-- Info producto -->
    <div class="d-flex align-items-center">
      <img src="<?php echo $imagen; ?>" width="60" class="me-3" alt="Producto">
      <div>
        <strong><?php echo $nombre; ?></strong><br>
        <span class="precio-unitario d-none"><?php echo number_format($precio, 2); ?></span>
        Precio unitario: $<?php echo number_format($precio, 2); ?> mxn<br>
        Cantidad:
        <input
          type="number"
          class="form-control form-control-sm cantidad-input"
          data-id="<?php echo $id; ?>"
          value="<?php echo $cantidad; ?>"
          min="1"
          style="width: 60px; display: inline-block;"
        >
        <br>
        Subtotal: $<span class="subtotal-item"><?php echo number_format($subtotal, 2); ?></span>
      </div>
    </div>

    <!-- Botón eliminar (lo haremos por AJAX) -->
    <form method="post" action="includes/eliminar_carrito.php" class="form-eliminar">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <button class="btn btn-sm btn-danger">Eliminar</button>
    </form>
  </div>
<?php endforeach; ?>

<hr>
<div class="text-end fw-bold fs-5">
  Total: $<span id="total-general">0.00</span>
</div>

<!-- Botón finalizar -->
<a id="btnFinalizarCompra" target="_blank" class="btn btn-success mt-3 w-100">
  Finalizar compra por WhatsApp
</a>
