<?php
include("conexion.php");

// Consulta para obtener los mensajes en orden de llegada
$sql = "SELECT nombre, email, mensaje, fecha FROM contactos ORDER BY fecha DESC";
$result = $conexion->query($sql);

$mensajes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convertir saltos de línea a <br> antes de enviar JSON
        $row['mensaje'] = nl2br($row['mensaje']);
        $mensajes[] = $row;
    }
}
echo json_encode($mensajes);
$conexion->close();
?>
