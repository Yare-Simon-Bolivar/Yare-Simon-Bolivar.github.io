<?php
include("conexion.php");

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $descripcion = nl2br(mysqli_real_escape_string($conn, $_POST['descripcion']));
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);

    $sql = "INSERT INTO eventos (nombre, tipo, descripcion, ubicacion) VALUES ('$nombre', '$tipo', '$descripcion', '$ubicacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo evento subido exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
