<?php
session_start();
if ($_SESSION['categoria'] !== 'avanzado') {
    header('Location:./');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexion.php';
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $query = "DELETE FROM usuarios WHERE nombre = '$usuario'";
    if ($conexion->query($query) === TRUE) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar usuario: " . $conexion->error;
    }
    $conexion->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <form method="POST" action="eliminar_usuario.php">
        <label>Nombre de Usuario:</label>
        <input type="text" name="usuario" required><br><br>
        <input type="submit" value="Eliminar Usuario">
    </form>
    <p><a href="principal_avanzado.php">Volver</a></p>
</body>
</html>
