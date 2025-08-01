<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$id = $data['id'];
$_SESSION['carrito'][$id] = [
    'nombre' => $data['nombre'],
    'precio' => $data['precio'],
    'imagen' => $data['imagen']
];

echo json_encode(['total' => count($_SESSION['carrito'])]);
