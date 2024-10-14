<?php
$servername = "localhost";
$username = "root";
$password = "FORMULA1";
$dbname = "proyecto3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$autor = $_POST['autor'];
$fecha_publicacion = date('Y-m-d');

$sql = "INSERT INTO noticias (titulo, contenido, fecha_publicacion, autor) VALUES ('$titulo', '$contenido', '$fecha_publicacion', '$autor')";

if ($conn->query($sql) === TRUE) {
    echo "Noticia publicada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
