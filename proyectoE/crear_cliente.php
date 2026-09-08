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
    $nombre = $_POST['nombre'];
    $membresia = $_POST['membresia'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];

    $sql = "INSERT INTO clientes (nombre, membresia, inicio, fin) VALUES ('$nombre', '$membresia', '$inicio', '$fin')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cliente creado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    <center>
    Nombre: <input type="text" name="nombre" required>
    <br><br>
    Membresía: <input type="text" name="membresia" required>
    <br><br>
    Inicio: <input type="date" name="inicio" required>
    <br><br>
    Fin: <input type="date" name="fin" required>
    <br><br>
    <input type="submit" value="Crear Cliente">
    </center>
</form>
<a href="listar_clientes.php"><button>Ver Clientes</button></a>
<a href="menuAdmin.html"><button >Menu</button></a>
<br>
<br>
<br>
<br>
</body>
<footer>
    <p id="pie">@</p>
    </footer>