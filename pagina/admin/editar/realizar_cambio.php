<?php
include("../../conexion.php");

$id = $_GET['id'];
$producto = trim($_POST['producto']);
$precio = trim($_POST['precio']);
$descripcion = trim($_POST['descripcion']);
$categoria = trim($_POST['categoria']);

$sql = "UPDATE `productos` SET `nombre_producto`='$producto',`precio`='$precio',
`descripcion`='$descripcion',`categoria` = '$categoria'WHERE id_productos = '$id'";
$resultado = $conn->query($sql);

header("Location: ../pagina_admin.php");

?>