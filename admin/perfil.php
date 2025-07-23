<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include '../config/db.php';

$mensaje = "";

// Obtener los datos del usuario
$usuarioActual = $_SESSION['admin'];
$query = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$query->bind_param("s", $usuarioActual);
$query->execute();
$resultado = $query->get_result();
$usuario = $resultado->fetch_assoc();

// Actualizar usuario o contraseña si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevoUsuario = $_POST['nuevo_usuario'];
    $nuevaContrasenia = $_POST['nueva_contrasenia'];
    $confirmarContrasenia = $_POST['confirmar_contrasenia'];

    // Validar campos
    if ($nuevoUsuario === "" || $nuevaContrasenia === "" || $confirmarContrasenia === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif ($nuevaContrasenia !== $confirmarContrasenia) {
        $mensaje = "Las contraseñas no coinciden.";
    } else {
        // Hashear nueva contraseña
        $contraseniaHash = password_hash($nuevaContrasenia, PASSWORD_DEFAULT);

        // Actualizar en la BD
        $update = $conn->prepare("UPDATE usuarios SET usuario = ?, contrasenia = ? WHERE usuario = ?");
        $update->bind_param("sss", $nuevoUsuario, $contraseniaHash, $usuarioActual);

        if ($update->execute()) {
            $_SESSION['admin'] = $nuevoUsuario; // Actualizar sesión
            $mensaje = "Datos actualizados correctamente.";
        } else {
            $mensaje = "Error al actualizar los datos.";
        }
    }
}
?>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5" style="max-width: 600px;">
  <h2 class="mb-4 text-center">Perfil del administrador</h2>

  <?php if ($mensaje): ?>
    <div class="alert alert-info"><?php echo $mensaje; ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label class="form-label">Usuario actual</label>
      <input type="text" class="form-control" value="<?php echo htmlspecialchars($usuario['usuario']); ?>" disabled>
    </div>

    <div class="mb-3">
      <label for="nuevo_usuario" class="form-label">Nuevo nombre de usuario</label>
      <input type="text" name="nuevo_usuario" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="nueva_contrasenia" class="form-label">Nueva contraseña</label>
      <input type="password" name="nueva_contrasenia" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="confirmar_contrasenia" class="form-label">Confirmar nueva contraseña</label>
      <input type="password" name="confirmar_contrasenia" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar datos</button>
    <a href="dashboard.php" class="btn btn-secondary">Volver al panel</a>
  </form>
</div>
