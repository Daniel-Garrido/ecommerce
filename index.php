<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php include 'config/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Productos</h2>
<div class="productos">
<?php
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='producto'>";
    echo "<img src='uploads/{$row['imagen']}' width='150'><br>";
    echo "<strong>{$row['nombre']}</strong><br>";
    echo "Precio: \$" . number_format($row['precio'], 2) . "<br>";
    echo "{$row['descripcion']}";
    echo "</div>";
}
?>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>