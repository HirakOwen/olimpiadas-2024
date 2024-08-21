<?php
session_start();
// Destruye todas las variables de sesión
$_SESSION = array();
session_destroy();
header("Location: index.php");
exit;
?>
