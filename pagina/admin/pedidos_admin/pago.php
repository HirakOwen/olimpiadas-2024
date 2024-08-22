<?php
session_start();
if ($_SESSION['permisos'] != "admin") {
    header("Location: ../../index.php");
}

// Si no existe la variable id_pedidos redirige a pedidos.php
if (!isset($_GET['id_pedido'])) {
    header("Location: pedidos_admin.php");
    exit;
}

// Obtiene si el pedido esta pago o no
include("../../conexion.php");
$id_pedido = $_GET['id_pedido'];
$pago = $_GET['pago'];

// Verifica si el pedido esta pago o no
if ($pago == "Si") {
    // Consulta para cambiar el pago
    $sql = "UPDATE `pedidos` SET `pago`= 'No' WHERE id_pedido = '$id_pedido'";
} elseif ($pago == "No") {
    $sql = "UPDATE `pedidos` SET `pago`= 'Si' WHERE id_pedido = '$id_pedido'";
}
$resultado = $conn->query($sql);
header("Location: pedidos_admin.php  ");
?>