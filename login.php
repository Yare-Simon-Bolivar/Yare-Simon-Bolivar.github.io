<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conexion, $_POST['login-username']);
    $password = mysqli_real_escape_string($conexion, $_POST['loginPassword']);

    $sql = "SELECT id, password_hash FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;
            header("Location: https://yare-simon-bolivar.github.io./admin.html");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Nombre de usuario no encontrado.";
    }

    mysqli_close($conexion);
}
?>
