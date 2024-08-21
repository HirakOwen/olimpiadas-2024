<?php

include("../conexion.php");
$id = $_GET['id'];
$sql = "DELETE FROM `productos` WHERE id_productos = '$id'";
$resultado = $conn->query($sql);
header("Location: pagina_admin.php")

?>