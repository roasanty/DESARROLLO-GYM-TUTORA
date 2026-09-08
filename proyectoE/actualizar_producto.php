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
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE productos SET nombre='$nombre', precio='$precio', cantidad='$cantidad' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id=$id";
    $result = $conn->query($sql);
    $producto = $result->fetch_assoc();
}
?>

<form method="post" action="">
    <center>
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <br><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
    <br><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
    <br><br>
    Cantidad: <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
    <br><br>
    <input type="submit" value="Actualizar Producto">
    </center>
</form>
<a href="listar_productos.php"> <button>Volver a la lista  </button> </a>
<br>
<br>
<br>
<br>

</body>
    <footer>
    <p id="pie">@</p>
    </footer>