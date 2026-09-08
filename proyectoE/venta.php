<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Función para obtener el precio automáticamente cuando se selecciona un producto
        function obtenerPrecio() {
            var producto_id = document.getElementById('producto').value;  // Obtener el ID del producto seleccionado

            if (producto_id) {
                // Enviar una petición AJAX al archivo PHP que devolverá el precio
                $.ajax({
                    url: 'obtener_precio.php',  // Archivo PHP que devuelve el precio del producto
                    type: 'GET',
                    data: { id: producto_id },
                    success: function(data) {
                        // Establecer el precio en el campo correspondiente
                        var precio = parseFloat(data);
                        document.getElementById('precio_producto').value = precio.toFixed(2); // Mostrar el precio con 2 decimales
                        calcularTotal(); // Actualizar el total cuando se obtenga el precio
                    }
                });
            } else {
                document.getElementById('precio_producto').value = '';  // Si no hay producto seleccionado, limpiar el campo de precio
            }
        }

        // Función para calcular el total automáticamente
        function calcularTotal() {
            var cantidad = document.getElementById('cantidad').value;
            var precio = document.getElementById('precio_producto').value;
            if (cantidad && precio) {
                var total = cantidad * precio;
                document.getElementById('total').value = total.toFixed(2); // Mostrar el total con 2 decimales
            }
        }
    </script>
</head>
<body>
    <header>
        <p id="encabezado">Titanius</p>
    </header>
    <br><br><br>

    <h2>Registrar Venta</h2>
    <form method="post" action="">

        <center>
            Producto:
            <select name="producto" id="producto" onchange="obtenerPrecio()" required>
                <option value="">Seleccione un Producto</option>
                <?php
                include 'conexion.php';

                // Obtener productos de la base de datos
                $sql = "SELECT * FROM productos";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
            <br><br>

            Cantidad:
            <input type="number" id="cantidad" name="cantidad" min="1" required oninput="calcularTotal()">
            <br><br>

            Precio del Producto: 
            <input type="text" id="precio_producto" readonly>
            <br><br>

            Total a Pagar:
            <input type="text" id="total" name="total" readonly>
            <br><br>

            <input type="submit" value="Registrar Venta">
        </center>

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $producto_id = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        $precio_total = $_POST['total'];

        // Verificar si hay suficiente cantidad en inventario
        $sql_check = "SELECT cantidad, precio FROM productos WHERE id = $producto_id";
        $result_check = $conn->query($sql_check);
        $row_check = $result_check->fetch_assoc();

        if ($row_check['cantidad'] >= $cantidad) {
            // Registrar la venta
            $sql_venta = "INSERT INTO ventas (producto_id, cantidad, total, fecha_venta) VALUES ('$producto_id', '$cantidad', '$precio_total', NOW())";
            if ($conn->query($sql_venta) === TRUE) {
                // Actualizar cantidad del producto
                $sql_update = "UPDATE productos SET cantidad = cantidad - $cantidad WHERE id = $producto_id";
                $conn->query($sql_update);

                echo "<p>Venta registrada exitosamente.</p>";
            } else {
                echo "<p>Error al registrar la venta.</p>";
            }
        } else {
            echo "<p>No hay suficiente cantidad en el inventario para realizar esta venta.</p>";
        }
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
