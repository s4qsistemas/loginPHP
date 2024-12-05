<?php
session_start();
if ($_SESSION['categoria'] !== 'básico') {
    header('Location:./');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Básico</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> (Usuario Básico)</h1>
    <p>Puedes cambiar tu propia contraseña.</p>
    <nav>
        <ul>
            <li><a href="cambiar_password.php">Cambiar Contraseña</a></li>
        </ul>
    </nav>
    <p><a href="cerrar.php">Cerrar Sesión</a></p>
</body>
</html>