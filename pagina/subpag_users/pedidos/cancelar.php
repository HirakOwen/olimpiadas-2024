<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.php");
} elseif (isset($_SESSION['permisos'])) {
    if ($_SESSION['permisos'] === "admin") {
        header("Location: ../../index.php");
    }
}

// Si no existe la variable id_pedidos redirige a pedidos.php
if (!isset($_GET['id_pedido'])) {
    header("Location: pedidos.php");
    exit;
}

include("../../conexion.php");
$id_pedido = $_GET['id_pedido'];

// Borra el pedido de la tabla 'detalles_pedido' en la db;
$sql = "DELETE FROM `detalles_pedido` WHERE id_pedido = '$id_pedido'";
$resultado = $conn->query($sql);
// Si la consulta fue exitosa continua con otra consulta
if ($resultado) {
    // Borra el pedido de la tabla 'pedidos' en la db
    $sql = "DELETE FROM `pedidos` WHERE id_pedido = '$id_pedido'";
    $resultado = $conn->query($sql);
    header("Location: pedidos.php");
}
header("Location: pedidos.php");
exit;
?>

