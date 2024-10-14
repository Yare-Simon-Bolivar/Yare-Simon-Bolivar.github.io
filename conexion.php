<?php
$servername = "localhost";
$username = "root";
$password = "FORMULA1";
$dbname = "proyecto3";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres a UTF-8
if (!$conexion->set_charset("utf8")) {
    die("Error cargando el conjunto de caracteres utf8: " . $conexion->error);
}
?>
