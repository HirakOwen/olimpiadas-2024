<?php

include("../conexion.php");

$nombre = $_POST['name'];
$email = $_POST['email'];
$password =$_POST['password'];

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
    $_SESSION['nombre'] = $nombre;
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['permisos'] = $permisos;
    header("Location: ../index.php");
} else {
    header("Location: inicio_sesion.html");
}

?>