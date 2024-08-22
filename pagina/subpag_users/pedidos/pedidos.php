<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.php");
} elseif (isset($_SESSION['permisos'])) {
    if ($_SESSION['permisos'] === "admin") {
        header("Location: ../../index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap 5.3.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <!-- Codec Pro font-->
    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet" />
    <!-- CSS Links-->
    <link rel="stylesheet" href="../perfil.css" />
    <link rel="stylesheet" href="pedidos.css">
    <title>Mis pedidos</title>
</head>

<body>
    <!-- Header -->
    <header
        class="d-flex justify-content-center align-items-center flex-column w-100 bg-black p-3 flex-lg-row justify-content-lg-around">
        <img src="../../imgs/horizonsports.png" alt="horizonsports" />
        <form
            action="../../busqueda.php"
            method="POST"
            class="d-flex justify-content-center align-items-center flex-row mb-2 rounded-1 w-100">
            <input type="search" name="buscar" placeholder="Buscar productos..." />
            <button class="rounded-5">
                <img src="../../imgs/lupa.png" alt="lupa.png" class="p-0 m-0" />
            </button>
        </form>
    </header>
    <!-- End Header-->

    <a
        href="../perfil.php"
        class="regresar m-3 mt-4 ps-2 gap-2 d-flex justify-content-center"><img src="../../imgs/flecha-reversa.png" alt="flechita" />
        <p class="p-0 m-0 mb-1">Volver a la pagina de perfil</p>
    </a>

    <?php
    include("../../conexion.php");
    $id_usuario = $_SESSION['id_usuario'];
    // Consulta para obtener los pedidos del usuario
    $sql = "SELECT id_pedido, total, estado, pago, fecha FROM `pedidos` WHERE id_usuario = '$id_usuario'";
    $resultado = $conn->query($sql);
    // Verifica si devolvio resultados
    if ($resultado->num_rows > 0) {
    ?> <!-- Contenedor de los pedidos del usuario -->
        <div class="container d-flex justify-content-center align-items-center mt-3 mb-3 gap-3 flex-wrap">
            <?php
            while ($fila = $resultado->fetch_assoc()) {
                $id_pedido = $fila["id_pedido"];
                $total = $fila["total"];
                $estado = $fila["estado"];
                $pago = $fila["pago"];
                $fecha = $fila["fecha"];

                // Consulta para obtener los detalles de los pedidos
                $sql_detalle = "SELECT id_productos, cantidad FROM `detalles_pedido` WHERE id_pedido = '$id_pedido'";
                $resultado_detalle = $conn->query($sql_detalle);
                if ($resultado_detalle->num_rows > 0) {
            ?>
                    <!-- Muestra los pedidos del usuario -->
                    <div class="pedido-card p-3">
                        <h2><?php echo htmlspecialchars("#" . $id_pedido); ?></h2>
                        <h5><?php echo htmlspecialchars("Total a pagar: $" . $total); ?></h5>
                        <h5><?php echo htmlspecialchars("Estado: " . $estado); ?></h5>
                        <h5><?php echo htmlspecialchars("Pago: " . $pago); ?></h5>
                        <h5><?php echo htmlspecialchars("Fecha y hora: " . $fecha); ?></h5>
                        <ul>
                            <?php
                            while ($fila_detalle = $resultado_detalle->fetch_assoc()) {
                                $id_productos = $fila_detalle['id_productos'];
                                $cantidad = $fila_detalle['cantidad'];
                                // Consulta para obtener los nombres de los productos
                                $sql_producto = "SELECT nombre_producto FROM `productos` WHERE id_productos = '$id_productos'";
                                $resultado_producto = $conn->query($sql_producto);
                                //Obtiene los nombres de los productos y los muestra
                                if ($resultado_producto->num_rows > 0) {
                                    while ($fila_producto = $resultado_producto->fetch_assoc()) {
                                        $nombre_producto = $fila_producto['nombre_producto'];
                            ?>
                                        <li><?php echo htmlspecialchars($nombre_producto) . " <b>(" . htmlspecialchars($cantidad) . ")</b>"; ?></li>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <div class="w-100 d-flex flex-row justify-content-center align-items-center mt-3">
                            <a href="cancelar.php?id_pedido=<?php echo $id_pedido ?>" class="btn btn-danger w-auto">Cancelar pedido</a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    <?php
    } else {
    ?>
        <h1 class="text-center">No tienes pedidos hechos :(</h1>
    <?php
    }
    ?>

</body>

</html>