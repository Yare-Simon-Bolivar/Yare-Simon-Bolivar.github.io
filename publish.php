<?php
include 'db.php';

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$resumen = $_POST['resumen'];
$imagen1 = null;
$imagen2 = null;

if (isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen1"]["name"]);
    if (move_uploaded_file($_FILES["imagen1"]["tmp_name"], $target_file)) {
        $imagen1 = $target_file;
    }
}

if (isset($_FILES['imagen2']) && $_FILES['imagen2']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen2"]["name"]);
    if (move_uploaded_file($_FILES["imagen2"]["tmp_name"], $target_file)) {
        $imagen2 = $target_file;
    }
}

$sql = "INSERT INTO noticias (titulo, contenido, resumen, imagen1, imagen2) VALUES ('$titulo', '$contenido', '$resumen', '$imagen1', '$imagen2')";

if ($conn->query($sql) === TRUE) {
    echo "Noticia publicada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
