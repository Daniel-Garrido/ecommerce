<?php
include '../config/db.php';

$nombre = $_POST['nombreProducto'];
$descripcion = $_POST['descripcionProducto'];
$precio = $_POST['precioProducto'];
$stock = $_POST['stockProducto'];
$categoria_id = $_POST['categoria_id'];
$imagen = $_FILES['imagenProducto']['name'];
$tmp = $_FILES['imagenProducto']['tmp_name'];

$destino = "../uploads/" . $imagen;
move_uploaded_file($tmp, $destino);

$creado_en = date('Y-m-d H:i:s');
$actualizado_en = $creado_en;

$sql = "INSERT INTO productos (
    nombreProducto, descripcionProducto, precioProducto, stockProducto, imagenProducto, categoria_id, creado_en, actualizado_en
) VALUES (
    '$nombre', '$descripcion', '$precio', '$stock', '$imagen', '$categoria_id', '$creado_en', '$actualizado_en'
)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Producto agregado exitosamente');window.location.href='agregar-producto.php';</script>";
} else {
    echo "Error al agregar los productos: " . $conn->error;
}

?>
