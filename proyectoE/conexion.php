<?php
$host = "localhost";
$usuario = "root";
$password = "mysql123";
$nombre_bd = "titanius";

$conn = new mysqli($host, $usuario, $password, $nombre_bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
