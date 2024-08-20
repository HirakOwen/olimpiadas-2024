<?php

include("../conexion.php");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password1 =$_POST['password1'];
$password2 = $_POST['password2'];

if ($password1 === $password2) {
    echo '<h1>Las 2 contraseñas son correctas</h1>';
} else {
    header("Location: registro.html");
}

// Verifica que no hayan usuario con el mismo mail y nombre
$sql_select = "SELECT nombre, email FROM usuarios WHERE nombre = '$nombre' OR email = '$email'";
$resultado_select = $conn->query($sql_select);
if ($resultado_select->num_rows > 0) {
    die("Ya hay un usuario con este mail y nombre");
} else {
    // Si no estan esos datos en la db los inserta
    echo "datos insertados correctamente";
    $sql_insert = "INSERT INTO usuarios(`nombre`, `email`, `password`) VALUES ('$nombre', '$email', '$password1')"; // Consulta SQL
    $resultado_insert = $conn->query($sql_insert); // Ejecuta la Consulta
}




?>