<?php
include 'db.php';

$sql = "SELECT titulo, contenido, resumen, imagen1, imagen2, fecha_publicacion FROM noticias ORDER BY fecha_publicacion DESC";
$result = $conn->query($sql);

$noticias = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

echo json_encode($noticias);

$conn->close();
?>
