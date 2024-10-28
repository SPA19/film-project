<?php
//Se ejecuta la consulta con el pod para guardar en la base de datos
include_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $stmt = $connection->prepare("INSERT INTO movies (title, year, director, poster) VALUES (?, ?, ?, ?)");

    $stmt->execute([
      $_POST['title'],
      $_POST['year'],
      $_POST['director'],
      $_POST['poster']
    ]);
    echo "Película guardada correctamente";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}