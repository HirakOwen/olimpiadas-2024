<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
    header("Location: ../../../index.php");
} elseif (isset($_SESSION['permisos'])) {
    if ($_SESSION['permisos'] === "admin") {
        header("Location: ../../../index.php");
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../../../index.php");
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
    <link rel="stylesheet" href="../datos.css">
    <title>Nombre de usuario</title>
    <link rel="shorcut icon" href="../../../recursos/logosimple.png">

</head>

<body class="d-flex justify-content-center align-items-center flex-column h-100 w-100">

    <form action="cambiar.php?id=<?php echo $id; ?>" method="POST" class="d-flex justify-content-center align-items-center flex-column p-4 bg-dark gap-3">
        <h3 class="text-white">Nombre de usuario</h3>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre nuevo..." required>
        <input type="password" name="password" id="password" placeholder="Contraseña..." required>
        <button class="btn btn-primary">Confirmar</button>
    </form>



</body>

</html>