<?php
include("conexion.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT nombre, tipo, descripcion, ubicacion FROM eventos";
$result = $conn->query($sql);

$eventos = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }
}

$conn->close();
echo json_encode($eventos, JSON_UNESCAPED_UNICODE);
?>
