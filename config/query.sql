-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS films_database;
USE films_database;

-- Crear la tabla de películas
CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    year VARCHAR(4),
    director VARCHAR(255),
    poster VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);