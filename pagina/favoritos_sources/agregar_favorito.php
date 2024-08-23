<?php
session_start();
include('../conexion.php');

// Obtener el ID del producto desde el formulario
$id_productos = isset($_GET['id_productos']) ? intval($_GET['id_productos']) : 0;
$id_usuario = isset($_SESSION['id_usuario']) ? intval($_SESSION['id_usuario']) : 0;

// Verificar si el producto ya está en la tabla 'guardados'
$sql_check = "SELECT * FROM guardados WHERE id_productos = $id_productos AND id_usuario = $id_usuario";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // El producto ya está en favoritos, se debe eliminar
    $sql = "DELETE FROM guardados WHERE id_productos = $id_productos AND id_usuario = $id_usuario";
    $conn->query($sql);
    $response = 'Producto eliminado de favoritos.';
} else {
    // El producto no está en favoritos, se debe agregar
    $sql = "INSERT INTO guardados (id_productos, id_usuario) VALUES ($id_productos, $id_usuario)";
    $conn->query($sql);
    $response = 'Producto añadido a favoritos.';
}

// Para redirigir a la pagina en la q estaba antes

// verifica si existe la variable buscar
if (isset($_GET['buscar'])) {
    // Si existe redirige a la pagina de busqueda
    $buscar = urlencode($_GET['buscar']);
    header("Location: ../busqueda.php?buscar=".$buscar);
    exit;
} elseif (isset($_GET['filtro'])) {
    // Si no existe redirige a la pagina de tienda
    $filtro = urlencode($_GET['filtro']);
    header("Location: ../tienda_busqueda.php?filtro=".$filtro);
    exit;
}

?>
