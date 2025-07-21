<?php
$host = 'localhost';
$dbname = 'dtunguayaberas';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
  die("Conexion fallida: " . $conn->connect_error);
}

?>