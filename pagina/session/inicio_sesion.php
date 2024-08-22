<?php

include("../conexion.php");

$nombre = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Consulta SQL
$sql = "SELECT id_usuario, permisos FROM usuarios 
WHERE nombre = '$nombre' AND email = '$email' AND password = '$password'";
$resultado = $conn->query($sql);
// Verifica si existen los datos en la db
if ($resultado->num_rows == 1) {
    $row = mysqli_fetch_assoc($resultado);
    $id_usuario = $row['id_usuario'];
    $permisos = $row['permisos'];
    // Inicia sesion para guardar las variables
    session_start();
    // Destruye las variables de sesion anteriores si es que las hay
    session_unset();
    // Guarda los datos en variables de sesion
    $_SESSION['nombre'] = $nombre;
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['permisos'] = $permisos;
    if ($_SESSION['desdecarrito']) {
        header("Location: ../carrito.php");
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: inicio_sesion.html");
}
