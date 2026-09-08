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

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

echo "<h2>Lista de Productos</h2>";
if ($result->num_rows > 0) {
    echo "<center><table><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Acciones</th></tr></center>";
    while ($row = $result->fetch_assoc()) {
        echo "<center><tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['precio']}</td>
        <td>{$row['cantidad']}</td>
        <td><a href='actualizar_producto.php?id={$row['id']}'>Actualizar</a> | 
        <a href='eliminar_producto.php?id={$row['id']}'>Eliminar</a></td></tr></center>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}
?>
<a href="crear_producto.php"> <button>Crear Nuevo Producto</button> </a>
<br>
<br>
<br>
<br>
</body>
    <footer>
    <p id="pie">@</p>
    </footer>