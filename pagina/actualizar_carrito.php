<?php
session_start();

// Verificar que el carrito existe
if (!isset($_SESSION['cart'])) {
    header("Location: carrito.php");
    exit;
}

// Obtener las cantidades del formulario
if (isset($_POST['cantidad'])) {
    foreach ($_POST['cantidad'] as $index => $newQuantity) {
        // Asegurarse de que la cantidad sea un número entero positivo
        $newQuantity = intval($newQuantity);
        if ($newQuantity > 0 && isset($_SESSION['cart'][$index])) {
            $_SESSION['cart'][$index]['cantidad'] = $newQuantity;
        }
    }
}

// Redirigir de vuelta al carrito
header("Location: carrito.php");
exit;
?>
