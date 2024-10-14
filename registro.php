<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['Nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['Apellido']);
    $edad = mysqli_real_escape_string($conexion, $_POST['Edad']);
    $email = mysqli_real_escape_string($conexion, $_POST['Email']);
    $password = mysqli_real_escape_string($conexion, $_POST['Contraseña']);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (username, nombre, apellido, edad, email, password_hash) VALUES ('$username', '$nombre', '$apellido', '$edad', '$email', '$password_hash')";

    if (mysqli_query($conexion, $sql)) {
        echo "Registro exitoso.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
