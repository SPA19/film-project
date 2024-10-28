<?php
//Se ejecuta la consulta con el pod para eliminar registros segun el id
include_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  try {
    $stmt = $connection->prepare("DELETE FROM movies WHERE id = :id");

    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    $stmt->execute();

    echo "Película eliminada satisfactoriamente";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}