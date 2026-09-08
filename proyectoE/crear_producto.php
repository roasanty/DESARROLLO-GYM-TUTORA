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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO productos (nombre, precio, cantidad) VALUES ('$nombre', '$precio', '$cantidad')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto creado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    <center>
    Nombre: <input type="text" name="nombre" required>
    <br><br>
    Precio: <input type="number" step="0.01" name="precio" required>
    <br><br>
    Cantidad: <input type="number" name="cantidad" required>
    <br><br>
    <input type="submit" value="Crear Producto">
    
    </center>
</form>
<a href="listar_productos.php"> <button> Ver Productos</button>  </a>
    <a href="menuAdmin.html"><button >Menu</button></a>
    <br>
<br>
<br>
<br>


</body>
<footer>
    <p id="pie">@</p>
    </footer>