<?php
$servername = "localhost";
$username = "root";
$password = "FORMULA1";
$dbname = "proyecto3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$evento = $_GET['evento'];
$sql = "SELECT ruta FROM fotos WHERE evento='$evento'";
$result = $conn->query($sql);

$fotos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fotos[] = $row;
    }
}

echo json_encode($fotos);

$conn->close();
?>
