<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Clientes Registrados del Día</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <p id="encabezado">Titanius</p>
    </header>
    <br><br><br>
    
    <?php
    include 'conexion.php';

    $sql = "SELECT * FROM clientes WHERE DATE(inicio) = CURDATE()";
    $result = $conn->query($sql);

    echo "<h2>Clientes Registrados del Día</h2>";

    if ($result->num_rows > 0) {
        echo "<center><table><tr><th>ID Cliente</th><th>Nombre</th><th>Membresía</th><th>Inicio</th><th>Fin</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['membresia']}</td><td>{$row['inicio']}</td><td>{$row['fin']}</td></tr>";
        }
        echo "</table></center>";
    } else {
        echo "<p>No se registraron clientes hoy.</p>";
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
