<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';
?>

<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
<div class="container mt-5">
  <h2 class="mb-4">Panel de administración</h2>

  <!-- Botón para agregar producto -->
  <div class="mb-3">
    <a href="agregar-producto.php" class="btn btn-primary">Agregar nuevo producto</a>
    <a href="logout.php" class="btn btn-secondary float-end">Cerrar sesión</a>
  </div>

  <!-- Resumen de productos -->
  <div class="row text-center mb-4">
    <div class="col-md-4">
      <div class="card border-primary">
        <div class="card-body">
          <h5>Total de productos</h5>
          <p class="display-6">
            <?php
            $res = $conn->query("SELECT COUNT(*) AS total FROM productos");
            $row = $res->fetch_assoc();
            echo $row['total'];
            ?>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabla de productos -->
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark text-center">
        <tr>
          <th>Imagen del producto</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Categoría</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT productos.*, categorias.nombreCategoria 
                FROM productos 
                JOIN categorias ON productos.categoria_id = categorias.id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
        ?>
          <tr>
            <td><img src="../uploads/<?php echo htmlspecialchars($row['imagenProducto']); ?>" width="60" height="60" style="object-fit: cover;"></td>
            <td><?php echo htmlspecialchars($row['nombreProducto']); ?></td>
            <td>$<?php echo number_format((float)$row['precioProducto'], 2); ?></td>
            <td><?php echo $row['stockProducto']; ?></td>
            <td><?php echo htmlspecialchars($row['nombreCategoria']); ?></td>
            <td>
              <a href="editar-producto.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
              <a href="eliminar-producto.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../includes/footer.php'; ?>
