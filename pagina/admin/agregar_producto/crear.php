<?php
include("../../conexion.php");

$producto = $_POST['producto'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];

$sql = "INSERT INTO productos(`nombre_producto`, `precio`, `descripcion`, `categoria`)
VALUES ('$producto','$precio','$descripcion','$categoria')";
$resultado = $conn->query($sql);

header("Location: ../pagina_admin.php");

?>