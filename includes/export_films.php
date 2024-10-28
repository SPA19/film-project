<?php
//se genera el excel por medio de headers
include_once '../config/db.php';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="movies.xls"');

echo "ID\tTitle\tYear\tDirector\tPoster\tAdded Date\n";

$stmt = $connection->query("SELECT *, DATE_FORMAT(created_at, '%Y-%m-%d %H:%i') as formatted_date FROM movies ORDER BY created_at DESC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['id'] . "\t";
    echo $row['title'] . "\t";
    echo $row['year'] . "\t";
    echo $row['director'] . "\t";
    echo $row['poster'] . "\t";
    echo $row['formatted_date'] . "\n";
}