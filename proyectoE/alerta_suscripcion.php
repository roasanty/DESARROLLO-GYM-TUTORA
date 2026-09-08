<?php
include 'conexion.php';

$sql = "SELECT * FROM clientes WHERE DATEDIFF(fin, CURDATE()) <= 5"; // Aviso de suscripción a 5 días de expirar
$result = $conn->query($sql);

echo "<h2>Clientes con Suscripción a Punto de Expirar</h2>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Cliente</th><th>Nombre</th><th>Fin Membresía</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['fin']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay clientes con suscripción próxima a vencer.</p>";
}
?>
