<?php
$servername = "localhost";
$username = "root";
$password = "FORMULA1";
$dbname = "proyecto3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT titulo, contenido, fecha_publicacion, autor FROM noticias";
$result = $conn->query($sql);

$noticias = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

echo json_encode($noticias);

$conn->close();
?>
