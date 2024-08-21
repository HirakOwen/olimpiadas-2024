<?php
include("../../conexion.php");

$producto = trim($_POST['producto']);
$precio = trim($_POST['precio']);
$descripcion = trim($_POST['descripcion']);
$categoria = trim($_POST['categoria']);

$sql = "INSERT INTO productos(`nombre_producto`, `precio`, `descripcion`, `categoria`)
VALUES ('$producto','$precio','$descripcion','$categoria')";
$resultado = $conn->query($sql);

header("Location: ../pagina_admin.php");

?>