<!DOCTYPE html>
<?php session_start(); ?>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- CSS Links-->
    <link rel="stylesheet" href="index_css/menu.css">
    <link rel="stylesheet" href="index_css/header.css" />
    <link rel="stylesheet" href="index_css/style.css">
    <link rel="stylesheet" href="tienda/Lista_prod.css">
    <title>Inicio</title>
</head>

<body>

    <!--Poppins Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <?php
    include("../header.php");
    include("conexion.php");
    $productMessageId = isset($_SESSION['message']['id']) ? intval($_SESSION['message']['id']) : 0;

    // Obtiene la categoria que indico el usuario
    $filtro = $_GET['filtro'];
    $sql = "SELECT * FROM productos WHERE categoria = '$filtro' ";
    $result = $conn->query($sql);
    ?>
    <!--Container Categoria-->
    <div class="containertienda">
        <div class="containercat" id="ropa">
            <h3 class="titcategoria poppins-bold"><?php echo $filtro; ?></h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->
    <?php
    //Calcular cantidad de productos para generar las cards
    if ($result->num_rows > 0) {
    ?>
        <!--Container Producto-->
        <div class="content d-flex flex-column mt-md-5 mt-n-1">
            <h1 class="h1-resultados d-md-none">productos encontrados</h1>
            <div class="container d-flex justify-content-center align-items-center flex-wrap gap-3">
                <?php
                while ($row = $result->fetch_assoc()) {
                    $producto = $row['nombre_producto'];
                    $precio = $row['precio'];
                    $descripcion = $row['descripcion'];
                    $categoria = $row['categoria'];
                ?>
                    <div class="tarjeta-busqueda p-4">
                        <h3 class="titproducto poppins-regular">
                            <!--Nombre del Producto-->
                            <?php echo htmlspecialchars($row["nombre_producto"]); ?>
                        </h3>
                        <p class="poppins-regular">
                            <!--Descripción  del producto-->
                            <?php echo htmlspecialchars($row["descripcion"]); ?>
                        </p>
                        <h3 class="precio">$
                            <!--Precio del Producto-->
                            <?php echo htmlspecialchars($row["precio"]); ?>
                        </h3>
                        <!-- Botón de añadir al carrito -->
                        <?php
                        if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>
                            <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);
                                                        unset($_SESSION['message']);
                                                    }   ?></h3>
                            <!--Boton e input para cambiar cantidad-->
                            <?php
                            if (!isset($_SESSION['permisos'])) {
                                // Si no existe la variable de sesion 'permisos' el boton de añadir redirige al formulario de registro
                            ?>
                                <form method="get" action="session/registro.html" class="d-flex flex-row align-items-center gap-1 mt-3">
                                    <input type="submit" class="btn btn-primary" value="Agregar al carrito">
                                    <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                </form>
                            <?php
                            } elseif ($_SESSION['permisos'] == "usuario") {
                                // Si la variable de sesion 'permisos' es igual a usuario muestra el boton para añadir al carro
                            ?>
                                <form method="get" action="anadircarrito.php" class="d-flex flex-row align-items-center gap-1 mt-3">
                                    <input type="hidden" name="action" value="add">
                                    <?php echo '<input type="hidden" name="id" value="' . $row["id_productos"] . '">'; ?>
                                    <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>
                                    <input type="submit" class="btn btn-primary" value="Agregar al carrito">
                                    <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                    <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                                    <input type="hidden" name="filtro" value="<?php echo $filtro; ?>">
                                </form>
                            <?php
                            }
                            // Si el usuario tiene permisos administrador no muestra el boton de añadir al carrito
                            ?>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- Footer si hay resultados -->
        <footer class="w-100 mt-5">
            <div class="footer-superior d-flex justify-content-around align-items-center flex-row">
                <div class="mt-3">
                    <ul class="d-md-flex justify-content-center align-items-center flex-column">
                        <li>
                            <h3><b>Ayuda</b></h3>
                        <li><a href="faq.php">Politicas de Reembolso</a></li>
                        <li><a href="tyc.php">Terminos y condiciones</a></li>
                        <li><a href="faq.php">Formas de envio</a></li>
                        <li><a href="faq.php">Medios de pago</a></li>
                    </ul>
                </div>
                <div class="text-end mt-3 me-4">
                    <ul class="d-md-flex justify-content-center align-items-center flex-column">
                        <li>
                            <h3><b>Contacto</b></h3>
                        </li>
                        <li><img src="imgs/footer/llamar.png" alt="telefono.png">+54 9 11 5016-1658</li>
                        <li><img src="imgs/footer/correo.png" alt="correo.png">info@horizon.com</li>
                        <li><img src="imgs/footer/pasador-de-ubicacion.png" alt="ubicacion.png">Av. Hipolito Yrigoyen 799 (1878)</li>
                    </ul>
                </div>
            </div>
            <div class="footer-inferior text-white text-center p-3">
                <b>Copyright © 2024 Horizon Sports. Todos los derechos reservados.</b>
                <p>El uso de este sitio web implica la aceptación de los Términos y Condiciones y de las Políticas de Privacidad de Horizon Sports.</p>
            </div>
        </footer>
    <?php
    } else {
    ?>
        <h1 class="text-center">No se encontraron productos.</h1>
        <!-- Footer si no hay resultados -->
        <footer class="w-100 mt-5 footer-busqueda">
            <div class="footer-superior d-flex justify-content-around align-items-center flex-row">
                <div class="mt-3">
                    <ul class="d-md-flex justify-content-center align-items-center flex-column">
                        <li>
                            <h3><b>Ayuda</b></h3>
                        <li><a href="faq.php">Politicas de Reembolso</a></li>
                        <li><a href="tyc.php">Terminos y condiciones</a></li>
                        <li><a href="faq.php">Formas de envio</a></li>
                        <li><a href="faq.php">Medios de pago</a></li>
                    </ul>
                </div>
                <div class="text-end mt-3 me-4">
                    <ul class="d-md-flex justify-content-center align-items-center flex-column">
                        <li>
                            <h3><b>Contacto</b></h3>
                        </li>
                        <li><img src="imgs/footer/llamar.png" alt="telefono.png">+54 9 11 5016-1658</li>
                        <li><img src="imgs/footer/correo.png" alt="correo.png">info@horizon.com</li>
                        <li><img src="imgs/footer/pasador-de-ubicacion.png" alt="ubicacion.png">Av. Hipolito Yrigoyen 799 (1878)</li>
                    </ul>
                </div>
            </div>
            <div class="footer-inferior text-white text-center p-3">
                <b>Copyright © 2024 Horizon Sports. Todos los derechos reservados.</b>
                <p>El uso de este sitio web implica la aceptación de los Términos y Condiciones y de las Políticas de Privacidad de Horizon Sports.</p>
            </div>
        </footer>
    <?php
    }
    ?>
    <script src="script.js"></script>
</body>

</html>