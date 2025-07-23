<?php
session_start();
include '../config/db.php';

// Obtener datos del formulario
$username = $_POST['usuario'];
$password = $_POST['contrasenia'];

// Buscar usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Validar usuario
if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();
    
    // Comparación directa de contraseña sin hash
    if ($password === $usuario['contrasenia']) {
        $_SESSION['admin'] = $usuario['usuario'];
        header("Location: dashboard.php");
        exit();
    }
}

// Si falla la verificación
echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href='login.php';</script>";
exit();
