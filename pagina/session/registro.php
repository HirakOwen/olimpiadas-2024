<?php

include("../conexion.php");

$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$password1 = trim($_POST['password1']);
$password_db = trim($_POST['password2']);

if ($password1 === $password_db) {
    // Verifica que no hayan usuario con el mismo mail y nombre
    $sql_select = "SELECT nombre, email FROM usuarios WHERE nombre = '$nombre' OR email = '$email'";
    $resultado_select = $conn->query($sql_select);
    if ($resultado_select->num_rows > 0) {
        header("Location: registro.html");
    } else {
    // Consulta SQL
    $sql_insert = "INSERT INTO usuarios(`nombre`, `email`, `password`, `permisos`) 
    VALUES ('$nombre', '$email', '$password1', 'usuario')"; 
    $resultado_insert = $conn->query($sql_insert); // Ejecuta la Consulta
    // Realiza una consulta para obtener el id de usuario
    $sql_select = "SELECT id_usuario FROM usuarios WHERE nombre = '$nombre' AND email = '$email'";
    $resultado_select = $conn->query($sql_select);
    if ($resultado_select->num_rows > 0) {
        // Guarda el id en una variable
        $row = mysqli_fetch_assoc($resultado_select);
        $id_usuario = $row['id_usuario'];
    }
    //Inicia la sesion para guardar las variables
    session_start();
    $_SESSION['nombre'] = $nombre;
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['permisos'] = "usuario";
    header("Location: ../index.php");
}
} else {
    header("Location: registro.html");
}

?>