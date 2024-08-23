<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.php");
} elseif (isset($_SESSION['permisos'])) {
    if ($_SESSION['permisos'] === "admin") {
        header("Location: ../../index.php");
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5.3.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!-- Codec Pro font-->
    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet" />
    <!-- CSS Links-->
    <link rel="stylesheet" href="datos.css">
    <title>Cuenta</title>
    <link rel="shorcut icon" href="../../recursos/logosimple.png">

</head>

<body class="d-flex justify-content-center align-items-center flex-column h-100 w-100">

    <div class="d-flex justify-content-center align-items-center flex-column p-4 bg-dark gap-3 div-datos">
        <h3 class="text-white">¿Que desea cambiar?</h3>
        <div class="d-flex flex-row gap-3">
            <a href="username/username.php?id=<?php echo $id; ?>" class="btn btn-primary">Username</a>
            <a href="password/cambiar_password.php?id=<?php echo $id; ?>" class="btn btn-primary">Contraseña</a>
            <a href="email/cambiar_email.php?id=<?php echo $id; ?>" class="btn btn-primary">Email</a>
        </div>
    </div>



</body>

</html>