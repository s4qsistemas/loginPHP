<?php
session_start();
if ($_SESSION['categoria'] !== 'avanzado') {
    header('Location:./');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexion.php';
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $categoria = $_POST['categoria'];
    $query = "INSERT INTO usuarios (nombre, password, categoria_id) VALUES ('$usuario', '$password', '$categoria')";

    if ($conexion->query($query) === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear usuario: " . $conexion->error;
    }
    $conexion->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    <form method="POST" action="crear_usuario.php">
        <label>Nombre de Usuario:</label>
        <input type="text" name="usuario" required><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <label>Rol:</label>
        <select name="categoria" required>
            <option value="1">Básico</option>
            <option value="2">Medio</option>
            <option value="3">Avanzado</option>
        </select><br><br>
        <input type="submit" value="Crear Usuario">
    </form>
    <p><a href="principal_avanzado.php">Volver</a></p>
</body>
</html>
