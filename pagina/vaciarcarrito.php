<?php
session_start();
unset($_SESSION['cart']);
header("Location: carrito.php"); // Redirigir a la página del carrito
exit;
?>