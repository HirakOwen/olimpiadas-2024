<?php
session_start();
if ($_SESSION['permisos'] != "admin") {
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
    <!-- Horizon font -->
    <link href="https://fonts.cdnfonts.com/css/horizon" rel="stylesheet" />
    <!-- Codec Pro font-->
    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet" />
    <!-- CSS Links-->
    <link rel="stylesheet" href="../admin.css" />
    <link rel="stylesheet" href="cuentas.css">
    <title>Ver estados de cuentas</title>
    <link rel="icon" href="../../recursos/logosimple.png">
</head>

<body>
    <!-- Header -->
    <header
        class="d-flex justify-content-center align-items-center flex-column w-100 bg-black p-3 flex-lg-row justify-content-lg-around">
        <img src="../../imgs/horizonsports.png" alt="horizonsports" />
        <form
            action="#"
            method="GET"
            class="d-flex justify-content-center align-items-center flex-row mb-2 rounded-1 w-100">
            <input type="search" name="buscar" placeholder="Buscar productos..." />
            <button class="rounded-5">
                <img src="../../imgs/lupa.png" alt="lupa.png" class="p-0 m-0" />
            </button>
        </form>
    </header>
    <!-- End Header-->

    <a
        href="../pagina_admin.php"
        class="regresar m-3 mt-4 ps-2 gap-2 d-flex justify-content-center"><img src="../../imgs/flecha-reversa.png" alt="flechita" />
        <p class="p-0 m-0 mb-1">Volver a la pagina de administrador</p>
    </a>

    <div class="container d-flex justify-content-center align-items-center mt-3 mb-3 gap-3 flex-column">
        <h1>Pedidos impagos</h1>
        <div class="d-flex justify-content-center align-items-center mt-3 mb-3 gap-3 flex-wrap">
            <?php
            include("../../conexion.php");
            // Consulta para solicitar los usuarios disponibles en la db
            $sql_usuario = "SELECT id_usuario, nombre FROM `usuarios`";
            $resultado_usuario = $conn->query($sql_usuario);
            if ($resultado_usuario->num_rows > 0) {
                while ($fila_usuario = $resultado_usuario->fetch_assoc()) {
                    // Guardamos el id y nombre en variables
                    $id_usuario = $fila_usuario['id_usuario'];
                    $nombre = $fila_usuario['nombre'];
                    // Consulta para obtener el estado de los pedidos
                    $sql_pedido = "SELECT id_pedido, total, pago, fecha FROM `pedidos` WHERE id_usuario = '$id_usuario'";
                    $resultado_pedido = $conn->query($sql_pedido);
                    // Muestra los pedidos que faltan pagar de cada usuario
                    if ($resultado_pedido->num_rows > 0) {
                        // Muestra todos los pedidos que no pago el usuario
                        while ($fila_pedido = $resultado_pedido->fetch_assoc()) {
                            $id_pedido = $fila_pedido['id_pedido'];
                            $total = $fila_pedido['total'];
                            $pago = $fila_pedido['pago'];
                            $fecha = $fila_pedido['fecha'];
                            if ($pago == "No") {
            ?>
                                <div class="d-flex justify-content-center align-content-center flex-column p-3 tarjeta-cuenta">
                                    <div class="div-cuenta-usuario">
                                        <h3>Id: #<?php echo htmlspecialchars($id_usuario); ?></h3>
                                        <h3>Nombre: <?php echo htmlspecialchars($nombre); ?></h3>
                                    </div>
                                    <h6>Id pedido: #<?php echo htmlspecialchars($id_pedido); ?></h6>
                                    <h6>Total a pagar: <?php echo htmlspecialchars($total); ?></h6>
                                    <h6>Fecha: <?php echo htmlspecialchars($fecha); ?></h6>
                                </div>
                        <?php
                            }
                        }
                        ?>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>