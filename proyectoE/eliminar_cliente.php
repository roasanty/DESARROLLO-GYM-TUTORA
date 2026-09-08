<!DOCTYPE html>
<head >
			<title>MENU ADMINISTRADOR</title>
			<link rel="stylesheet" target="_blank" rel="noopener" href="estilo.css">
	</head>
    <body>
    <header>
            <p id="encabezado"> Titanius</p>
        </header>
        <br>
        <br>
        <br>
<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Cliente eliminado exitosamente.";
} else {
    echo "Error: " . $conn->error;
}
?>
<a href="listar_clientes.php"> <button>Volver a la lista</button> </a>
</body>
    <footer>
    <p id="pie">@</p>
    </footer>