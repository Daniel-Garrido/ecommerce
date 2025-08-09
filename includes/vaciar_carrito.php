//funcion temporal para eliminar el contenido del carrito 
<?php
session_start();
unset($_SESSION['carrito']);
header('Location: ../index.php');
