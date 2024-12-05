<?php
session_start();
if ($_SESSION['categoria'] !== 'medio' && $_SESSION['categoria'] !== 'avanzado') {
    header('Location:./');
    exit();
}
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $busqueda = mysqli_real_escape_string($conexion, $_POST['busqueda']);
    $consulta = "SELECT u.nombre, c.nombre AS categoria
                 FROM usuarios u
                 JOIN categoria c ON u.categoria_id = c.id
                 WHERE u.nombre LIKE '%$busqueda%'";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "Usuario: " . $fila['nombre'] . " - Rol: " . $fila['categoria'] . "<br>";
        }
    } else {
        echo "No se encontraron usuarios.";
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Usuarios</title>
</head>
<body>
    <h1>Buscar Usuarios</h1>
    <form method="POST" action="buscar_usuario.php">
        <label>Buscar:</label>
        <input type="text" name="busqueda" placeholder="Ingrese un nombre" required>
        <input type="submit" value="Buscar">
    </form>
    <p><a href="javascript:history.back()">Volver</a></p>
</body>
</html>
