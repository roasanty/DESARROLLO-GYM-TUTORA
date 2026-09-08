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
date_default_timezone_set('America/Mexico_City'); // Establece tu zona horaria aquí
include 'conexion.php';

// Consulta de clientes y generación de la tabla
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

echo "<h2>Lista de Clientes</h2>";
if ($result->num_rows > 0) {
    echo "<div class='table-container'><table class='tabla-clientes'>
            <tr><th>ID</th><th>Nombre</th><th>Membresía</th><th>Inicio</th><th>Fin</th><th>Acciones</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $inicio = date('d-m-Y', strtotime($row['inicio']));
        $fin = date('d-m-Y', strtotime($row['fin']));

        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['membresia']}</td>
                <td>{$inicio}</td>
                <td>{$fin}</td>
                <td>
                    <a href='actualizar_cliente.php?id={$row['id']}'>Actualizar</a> | 
                    <a href='eliminar_cliente.php?id={$row['id']}'>Eliminar</a>
                </td>
              </tr>";
    }
    echo "</table></div>";
} else {
    echo "<p>No hay clientes registrados.</p>";
}
?>


<a href="crear_cliente.php"><button>Crear Nuevo Cliente</button></a>
<br>
<br>
<br>
<br>


<t/body>
<fooer>
    <p id="pie">@</p>
</footer>

</body>
</html>
