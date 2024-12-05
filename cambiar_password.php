<?php
session_start();
if (empty($_SESSION['usuario'])) {
    header('Location:./');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexion.php';
    $usuario = $_SESSION['usuario'];
    $password_actual = $_POST['password_actual'];
    $password_nueva = $_POST['password_nueva'];
    $consulta = "SELECT password FROM usuarios WHERE nombre = '$usuario'";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0) {
        $datos = $resultado->fetch_assoc();
        if (password_verify($password_actual, $datos['password'])) {
            $password_hash = password_hash($password_nueva, PASSWORD_DEFAULT);
            $actualizar = "UPDATE usuarios SET password = '$password_hash' WHERE nombre = '$usuario'";
            if ($conexion->query($actualizar) === TRUE) {
                echo "Contraseña actualizada exitosamente.";
            } else {
                echo "Error al actualizar la contraseña: " . $conexion->error;
            }
        } else {
            echo "La contraseña actual es incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    $conexion->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <h1>Cambiar Contraseña</h1>
    <form method="POST" action="cambiar_password.php">
        <label>Contraseña Actual:</label>
        <input type="password" name="password_actual" required><br><br>
        <label>Nueva Contraseña:</label>
        <input type="password" name="password_nueva" required><br><br>
        <input type="submit" value="Actualizar Contraseña">
    </form>
    <p><a href="javascript:history.back()">Volver</a></p>
</body>
</html>
 