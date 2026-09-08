<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Obtener el precio del producto seleccionado
    $sql = "SELECT precio FROM productos WHERE id = $producto_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['precio']; // Devolver el precio como respuesta
    } else {
        echo "0"; // En caso de que no se encuentre el producto
    }
}
?>
