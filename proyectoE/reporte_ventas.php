<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <p id="encabezado">Titanius</p>
    </header>
    <br><br><br>

    <?php
    include 'conexion.php';

    $sql = "SELECT v.id, p.nombre AS producto, v.cantidad, v.total, v.fecha_venta FROM ventas v JOIN productos p ON v.producto_id = p.id ORDER BY v.fecha_venta DESC";
    $result = $conn->query($sql);

    echo "<h2>Reporte de Ventas</h2>";

    if ($result->num_rows > 0) {
        echo "<center><table><tr><th>ID Venta</th><th>Producto</th><th>Cantidad</th><th>Precio Total</th><th>Fecha</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['producto']}</td><td>{$row['cantidad']}</td><td>{$row['total']}</td><td>{$row['fecha_venta']}</td></tr>";
        }
        echo "</table></center>";
    } else {
        echo "<p>No se registraron ventas.</p>";
    }
    ?>

    <center>
        <a href="menuAdmin.html"><button>Volver al Menú</button></a>
        <br>
<br>
<br>
<br>

    </center>

    <br><br>
    <footer>
        <p id="pie">@</p>
    </footer>
</body>
</html>
