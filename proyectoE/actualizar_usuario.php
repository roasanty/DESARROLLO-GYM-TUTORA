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
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sql);
    $usuario = $result->fetch_assoc();
}
?>

<form method="post" action="">
    <center>
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>"> 
    <br><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
    <br><br>
    Teléfono: <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>
    <br><br>
    <input type="submit" value="Actualizar Usuario">
    </center>
</form>
<a href="listar_usuarios.php"> <button>Volver a la lista</button> </a>
<br>
<br>
<br>
<br>

</body>
    <footer>
    <p id="pie">@</p>
    </footer>