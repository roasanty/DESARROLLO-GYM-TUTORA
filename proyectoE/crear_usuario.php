<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU ADMINISTRADOR</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <p id="encabezado">Titanius</p>
    </header>
    <br><br><br>

    <?php
    include 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $contraseña = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
        $telefono = $_POST['telefono'];

        $sql = "INSERT INTO usuarios (nombre, contrasena, telefono) VALUES ('$nombre', '$contraseña', '$telefono')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Nuevo usuario creado exitosamente.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
    ?>

    <form method="post" action="">
        <center>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" required>
            <br><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>
            <br><br>

            <input type="submit" value="Crear Usuario">
        </center>
    </form>

    <center>
        <a href="listar_usuarios.php"><button>Ver usuarios</button></a>
        <a href="menuAdmin.html"><button>Menú</button></a>
    </center>

    <footer>
        <p id="pie">@</p>
    </footer>
</body>
</html>



