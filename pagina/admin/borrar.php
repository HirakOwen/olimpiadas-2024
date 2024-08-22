<?php

include("../conexion.php");

$id = $_GET['id'];

// Primero, elimina los registros relacionados en detalles_pedido
$sql_detalles = "DELETE FROM `detalles_pedido` WHERE id_productos = '$id'";
$conn->query($sql_detalles);

// Luego, elimina el producto
$sql_producto = "DELETE FROM `productos` WHERE id_productos = '$id'";
$conn->query($sql_producto);

header("Location: pagina_admin.php");
?>