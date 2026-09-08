
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
    $membresia = $_POST['membresia'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];

    $sql = "UPDATE clientes SET nombre='$nombre', membresia='$membresia', inicio='$inicio', fin='$fin' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Cliente actualizado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id=$id";
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();
}
?>

<form method="post" action="">
    <center>
    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
    <br><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
    <br><br>
    Membresía: <input type="text" name="membresia" value="<?php echo $cliente['membresia']; ?>" required>
    <br><br>
    Inicio: <input type="date" name="inicio" value="<?php echo $cliente['inicio']; ?>" required>
    <br><br>
    Fin: <input type="date" name="fin" value="<?php echo $cliente['fin']; ?>" required>
    <br><br>
    <input type="submit" value="Actualizar Cliente">
    </center>
</form>
<a href="listar_clientes.php"> <button> Volver a la lista </button>  </a>
<br>
<br>
<br>
<br>

</body>
    <footer>
    <p id="pie">@</p>
    </footer>
