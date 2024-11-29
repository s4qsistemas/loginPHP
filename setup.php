<?php
// Incluir el archivo de conexión
include 'conexion.php';

$sql = "CREATE DATABASE IF NOT EXISTS $base_datos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
if ($conexion->query($sql) === TRUE) {
    echo "Base de datos '$base_datos' creada correctamente o ya existe.<br>";
} else {
    echo "Error al crear la base de datos: " . $conexion->error . "<br>";
}

// Seleccionar la base de datos
if ($conexion->select_db($base_datos)) {
    echo "Base de datos '$base_datos' seleccionada correctamente.<br>";
} else {
    echo "Error al seleccionar la base de datos: " . $conexion->error . "<br>";
}

// Crear la tabla categoría
$sql_categoria = "CREATE TABLE IF NOT EXISTS categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
)";

if ($conexion->query($sql_categoria) === TRUE) {
    echo "Tabla 'categoria' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'categoria': " . $conexion->error . "<br>";
}

// Crear la tabla usuarios
$sql_usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
)";

if ($conexion->query($sql_usuarios) === TRUE) {
    echo "Tabla 'usuarios' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'usuarios': " . $conexion->error . "<br>";
}

// Insertar datos en la tabla categoria
$sql_insert_categoria = "INSERT INTO categoria (nombre) VALUES 
    ('básico'), 
    ('medio'), 
    ('avanzado')";

if ($conexion->query($sql_insert_categoria) === TRUE) {
    echo "Datos insertados en la tabla 'categoria'.<br>";
} else {
    echo "Error al insertar datos en 'categoria': " . $conexion->error . "<br>";
}

// Cerrar la conexión
$conexion->close();
?>