<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $dbname = "db_camion";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO localizaciones (latitud, longitud) VALUES ('$latitud', '$longitud')";

    if ($conn->query($sql) === TRUE) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }

    $conn->close();
}