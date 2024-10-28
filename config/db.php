<?php
//PDO
try {
  //variables de conexión
  $type_db = "mysql";
  $host = "localhost";
  $db_name = "films_database";
  $username = "root";
  $password = "";

  // Se crea instancia de POD.
  $connection = new PDO("$type_db:host=$host;dbname=$db_name;charset=utf8", $username, $password);

  //Se establece el modo de error para poder manejar las excepciones.
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  // Manejo de errores.
  echo "Error de conexión: " . $e->getMessage();
}
