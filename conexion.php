<?php
    // Parámetros de conexión
    $servidor = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_datos = 'registros';

    // Establecer conexión a MySQL
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    // Verificar si hay error en la conexión
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

?>