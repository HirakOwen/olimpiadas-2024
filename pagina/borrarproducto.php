<?php
session_start();

// Obtener el ID del producto a eliminar
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0 && isset($_SESSION['cart'])) {
    // Recorrer el carrito y buscar el producto por su ID
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $id) {
            // Eliminar el producto del carrito
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

// Redirigir de vuelta a la página del carrito
header("Location: carrito.php");
exit;
?>
