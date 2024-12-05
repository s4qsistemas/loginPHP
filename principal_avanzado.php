<?php
session_start();
if ($_SESSION['categoria'] !== 'avanzado') {
    header('Location:./');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Avanzado</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> (Administrador)</h1>
    <p>Tienes acceso total al sistema.</p>
    <nav>
        <ul>
            <li><a href="crear_usuario.php">Crear Usuario</a></li>
            <li><a href="buscar_usuario.php">Buscar Usuarios</a></li>
            <li><a href="cambiar_password_admin.php">Cambiar Contraseña de Otros Usuarios</a></li>
            <li><a href="eliminar_usuario.php">Eliminar Usuario</a></li>
            <li><a href="cambiar_password.php">Cambiar Mi Propia Contraseña</a></li>
        </ul>
    </nav>
    <p><a href="cerrar.php">Cerrar Sesión</a></p>
</body>
</html>
