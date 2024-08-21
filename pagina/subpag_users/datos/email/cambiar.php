<?php
session_start();
// Verifica si existen los datos de sesion
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.php");
} elseif (isset($_SESSION['permisos'])) {
    // Verifica si el usuario es administrador
    if ($_SESSION['permisos'] === "admin") {
        header("Location: ../../index.php");
    }
}
// Verifica si existe la variable id atraves de la url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../../index.php");
}

include("../../../conexion.php");

//Obtiene las contraseñas ingresados en el formulario
$email = trim($_POST['email']);
$password = trim($_POST['password']);

//Consulta para obtener la contraseña de la db
$sql = "SELECT password FROM `usuarios` WHERE id_usuario = '$id'";
$resultado = $conn->query($sql);

//Verifica si el usuario existe en la db
if ($resultado->num_rows == 1) {
    while ($fila = $resultado->fetch_assoc()) {
        $password_db = $fila["password"];
    }
} else {
    header("Location: username.php");
}
//Si el usuario existe verifica si ingreso mal la contraseña
if ($password === $password_db) {
    $sql = "UPDATE `usuarios` SET `email`='$email' WHERE `id_usuario`='$id'";
    $resultado = $conn->query($sql);
    // Redirige al logout para que vuelva a iniciar sesion
    header("Location: ../../../logout.php");
} else {
    header("Location: ../../perfil.php");
}
