<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$id = $data['id'] ?? null;
if ($id === null) {
    echo json_encode(['ok' => false, 'msg' => 'ID faltante']);
    exit;
}

if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad'] += 1;
} else {
    $_SESSION['carrito'][$id] = [
        'nombre'   => $data['nombre'] ?? 'Producto',
        'precio'   => (float)($data['precio'] ?? 0),
        'imagen'   => $data['imagen'] ?? 'img/default.jpg',
        'cantidad' => 1
    ];
}

echo json_encode([
  'ok'    => true,
  'total' => count($_SESSION['carrito']) // nº de productos distintos (badge)
]);

