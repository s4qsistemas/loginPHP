<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexion.php';
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO usuarios (nombre, password, categoria_id) VALUES ('$usuario', '$password', 3)";
    if ($conexion->query($query) === TRUE) {
        echo "Primer usuario creado exitosamente. Ahora puedes iniciar sesión.";
        echo "<a href='index.php'>Ir al Login</a>";
    } else {
        echo "Error al crear el primer usuario: " . $conexion->error;
    }
    $conexion->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Primer Usuario</title>
</head>
<body>
    <h1>Crear Primer Usuario Administrador</h1>
    <form method="POST" action="crear_primer_usuario.php">
        <label>Nombre de Usuario:</label>
        <input type="text" name="usuario" required><br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Crear Usuario">
    </form>
</body>
</html>
