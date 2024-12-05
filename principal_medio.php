<?php
session_start();
if ($_SESSION['categoria'] !== 'medio') {
    header('Location:./');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Medio</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> (Usuario Medio)</h1>
    <p>Puedes buscar usuarios y cambiar contraseñas de otros usuarios.</p>
    <nav>
        <ul>
            <li><a href="buscar_usuario.php">Buscar Usuarios</a></li>
            <li><a href="cambiar_password_admin.php">Cambiar Contraseña de Otros Usuarios</a></li>
            <li><a href="cambiar_password.php">Cambiar Mi Propia Contraseña</a></li>
        </ul>
    </nav>
    <p><a href="cerrar.php">Cerrar Sesión</a></p>
</body>
</html>
