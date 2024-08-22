<?php
session_start();
if ($_SESSION['permisos'] != "admin") {
    header("Location: ../../index.php");
}

// Obtiene si el pedido esta pago o no
include("../../conexion.php");
$id_pedido = $_GET['id_pedido'];
$estado = $_POST['estado'];

// Consulta para cambiar el estado del pedido
$sql = "UPDATE `pedidos` SET `estado`= '$estado' WHERE id_pedido = '$id_pedido'";
$resultado = $conn->query($sql);
header("Location: pedidos_admin.php");
?>