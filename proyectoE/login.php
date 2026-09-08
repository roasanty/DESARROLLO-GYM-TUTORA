<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: menuAdmin.html"); // Redirige si ya está logueado
    exit();
}

include 'conexion.php'; // Conexion a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar el usuario
    $sql = "SELECT * FROM usuarios WHERE nombre='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar contraseña
        if (password_verify($contrasena, $row['contrasena'])) {
            $_SESSION['user'] = $row['nombre'];
            header("Location: menuAdmin.html");
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
    <p id="encabezado">Titanius</p>
</header>

<form method="POST" action="">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>
    <input type="password" name="contrasena" placeholder="Contraseña" required><br>
    <button type="submit">Iniciar sesión</button>
</form>

<footer>
    <p id="pie">@</p>
</footer>

</body>
</html>
