<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT titulo, contenido, imagen1, imagen2, fecha_publicacion FROM noticias WHERE id = $id";
$result = $conn->query($sql);

$noticia = null;

if ($result->num_rows > 0) {
    $noticia = $result->fetch_assoc();
}

echo json_encode($noticia);

$conn->close();
?>
