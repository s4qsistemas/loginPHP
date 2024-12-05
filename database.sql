CREATE DATABASE registros CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE registros;
CREATE TABLE usuarios (
	nombre VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;