<?php
$servername = "localhost";
$username = "root";
$password = "FORMULA1";
$dbname = "proyecto3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $evento = $_POST['evento'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    $sql = "INSERT INTO fotos (evento, ruta) VALUES ('$evento', '$target_file')";
    if ($conn->query($sql) === TRUE) {
        echo "Foto subida exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
