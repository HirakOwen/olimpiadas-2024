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

include("../../conexion.php");

//Obtiene los datos ingresados en el formulario
$direccion = trim($_POST['direccion']);
$codigo_postal = trim($_POST['codigo']);
$recibe = trim($_POST['recibe']);

// Consulta para cambiar el domicilio
$sql = "UPDATE `usuarios` SET `domicilio`='$direccion',`codigo_postal`='$codigo_postal',`recibe`='$recibe' WHERE id_usuario = '$id'";
$resultado = $conn->query($sql);

header("Location: ../perfil.php");
?>