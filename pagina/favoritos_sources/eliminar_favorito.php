<?php
session_start();
include('../conexion.php');

// Obtener datos del formulario
$id_productos = isset($_POST['id_productos']) ? intval($_POST['id_productos']) : 0;
$id_usuario = isset($_POST['id_usuario']) ? intval($_POST['id_usuario']) : 0;

// Verificar que los valores son válidos
if ($id_productos > 0 && $id_usuario > 0) {
    // Eliminar el producto de la tabla 'guardados'
    $sql = "DELETE FROM guardados WHERE id_productos = $id_productos AND id_usuario = $id_usuario";
    $result = $conn->query($sql);

    if ($result) {
        // Redirigir a la página de favoritos con un mensaje de éxito
        $_SESSION['mensaje'] = 'Producto eliminado exitosamente.';
    } else {
        // Mostrar error en la base de datos
        $_SESSION['mensaje'] = 'Error al eliminar el producto: ' . $conn->error;
    }
} else {
    $_SESSION['mensaje'] = 'Datos inválidos.';
}
header('Location: ../favoritos.php');
exit;
?>
