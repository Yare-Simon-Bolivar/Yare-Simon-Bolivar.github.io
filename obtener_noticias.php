<?php
include 'db.php';

$sql = "SELECT id, titulo, resumen, imagen1 FROM noticias ORDER BY fecha_publicacion DESC";
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
