<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];

    // Configuración de conexión a la base de datos usando variables de entorno
    $servername = getenv('localhost');
    $username = getenv('root');
    $password = getenv('');
    $dbname = getenv('db_camion');

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("INSERT INTO localizaciones (latitud, longitud) VALUES (?, ?)");
    $stmt->bind_param("dd", $latitud, $longitud);

    if ($stmt->execute()) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }

    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>
