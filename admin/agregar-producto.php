<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php include '../config/db.php'; ?>
<?php include '../includes/header.php'; ?>

<div class="container mt-4">

  <h2 class="text-center">Agregar nuevo producto</h2>
  
  <!-- formulario para agregar producto -->
  <form action="procesar-agregar.php" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
      <label class="form-label">Nombre del producto</label>
      <input type="text" name="nombreProducto" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcionProducto" class="form-control"></textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Precio del producto</label>
      <input type="number" name="precioProducto" step="0.01" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Cantidad en stock</label>
      <input type="number" name="stockProducto" class="form-control">
    </div>

    <div class="mb-3">
      <label class="form-label">Imagen del producto</label>
      <input type="file" name="imagenProducto" class="form-control" accept="image/*">
    </div>

  
    <!-- categoria de los productos -->
    <select name="categoria_id" class="form-select">
      <option value="">Selecciona una categoría</option>
      <?php
      $cat_sql = "SELECT id, nombreCategoria FROM categorias";
      $cat_result = $conn->query($cat_sql);
      while ($cat = $cat_result->fetch_assoc()) {
        echo "<option value='{$cat['id']}'>{$cat['nombreCategoria']}</option>";
      }
      ?>
    </select>

    <button type="submit" class="mt-4 btn btn-primary">Agregar Producto</button>
  </form>
</div>

<?php include '../includes/footer.php'; ?>