<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: row;
  }
  .sidebar {
    width: 250px;
    background-color: #343a40;
    color: white;
    padding-top: 20px;
  }
  .sidebar a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 12px 20px;
  }
  .sidebar a:hover {
    background-color: #495057;
  }
  .main-content {
    flex-grow: 1;
    padding: 20px;
  }
</style>

<!-- Sidebar -->
<div class="sidebar">
  <a href="dashboard.php">Inicio</a>
  <a href="#productos">Ver productos</a>
  <a href="#inventario"> Ver inventario</a>
  <a href="perfil.php"> Perfil</a>
  <a href="logout.php"> Cerrar sesión</a>
</div>

<!-- Contenido principal -->
<div class="main-content">

  <h2 class="mb-2 text-center">Panel de administración</h2>
  <div class="mb-2">
    <a href="agregar-producto.php" class="btn btn-primary">Agregar nuevo producto</a>
  </div>

  
  <!-- Tabla de productos -->
  <div class="table-responsive mb-5" id="productos">
    <h4 class="mb-3">Lista de productos</h4>
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark text-center">
        <tr>
          <th>Imagen</th>
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

  <!-- Resumen de productos -->
  <div class="row text-center mb-2">
    <div class="col-md-4">
      <div class="card border-primary">
        <div class="card-body">
          <h5>Total de guayaberas</h5>
          <p class="fs-4">
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
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


