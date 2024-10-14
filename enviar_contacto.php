<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $mensaje = mysqli_real_escape_string($conexion, $_POST['mensaje']);

    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if (mysqli_query($conexion, $sql)) {
        echo "Mensaje enviado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
