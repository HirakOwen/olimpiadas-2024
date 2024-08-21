<?php
include("../../conexion.php");

$id = $_GET['id'];
$producto = $_POST['producto'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];

$sql = "UPDATE `productos` SET `nombre_producto`='$producto',`precio`='$precio',
`descripcion`='$descripcion',`categoria` = '$categoria'WHERE id_productos = '$id'";
$resultado = $conn->query($sql);

header("Location: ../pagina_admin.php");

?>