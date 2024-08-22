<?php
session_start();
if ($_SESSION['permisos'] != "admin") {
    header("Location: ../../index.php");
}

$id_pedido = $_GET['id_pedido'];
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
    <link rel="stylesheet" href="estado.css">
    <title>Cambiar domicilio</title>
</head>

<body>

    <form action="modificar_estado.php?id_pedido=<?php echo $id_pedido ?>" method="POST" class="d-flex justify-content-center align-items-center flex-column p-4 bg-dark gap-3">
        <h3 class="text-white">Modificar Estado</h3>
        <select name="estado" required>
            <option value="Pendiente" selected>Pendiente</option>
            <option value="Despachado">Despachado</option>
            <option value="Entregado en Domicilio">Entregado en Domicilio</option>
        </select>
        <button class="btn btn-primary mt-3">Modificar</button>
    </form>



</body>

</html>