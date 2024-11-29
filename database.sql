CREATE DATABASE registros CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

 USE registros;

 CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL);

 CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id));

INSERT INTO categoria (nombre) VALUES ('básico'), ('medio'),('avanzado');