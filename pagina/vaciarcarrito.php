<?php
session_start();
unset($_SESSION['cart']); //reinicio del carrito
header("Location: carrito.php"); // Redirige a la página del carrito
exit;
?>