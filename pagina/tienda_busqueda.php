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

    <?php include("../header.php"); ?>

    <!--Container Categoria-->
    <div class="containertienda">
        <div class="containercat" id="ropa_categoria">
            <h3 class="titcategoria poppins-bold">Ropa Deportiva</h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->

    <!--Container Producto-->
    <div class="container mt-5">
        <div class="row">
            <?php 
        // Cargar los datos del archivo JSON
            $ropa = file_get_contents('./ropa.json');
            $ropa = json_decode($ropa, true);

        // Mostrar los artículos de ropa en formato de tarjeta
            foreach ($ropa as $indice => $item) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="titproducto poppins-regular">

                                <!--Nombre Producto-->
                                <?php echo htmlspecialchars($item['nombre']); ?></h3>
                                <h3 class="descproducto poppins-regular">
                                    <!--Descriopción producto Producto-->
                                    <?php echo htmlspecialchars($item['descripcion']); ?></h3>

                                    <h3 class="precio poppins-bold" align="center">$

                                        <!--Precio Producto-->
                                        <?php echo htmlspecialchars($item['precio']); ?></h3>
                                        <!-- Botón de añadir al carrito -->
                                        <button class="add-to-cart btn btn-primary mt-2" data-indice="<?php echo $indice; ?>">Añadir al carro</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <footer class="w-100 mt-5">
                    <div class="footer-superior d-flex justify-content-around align-items-center flex-row">
                        <div class="mt-3">
                            <ul class="d-md-flex justify-content-center align-items-center flex-column">
                                <li><h3><b>Ayuda</b></h3></li>
                                <li><a href="#">Políticas de Reembolso</a></li>
                                <li><a href="#">Términos y condiciones</a></li>
                                <li><a href="#">Formas de envío</a></li>
                                <li><a href="#">Medios de pago</a></li>
                            </ul>
                        </div>
                        <div class="text-end mt-3 me-4">
                            <ul class="d-md-flex justify-content-center align-items-center flex-column">
                                <li><h3><b>Contacto</b></h3></li>
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
                <script src="script.js"></script>

                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $(".add-to-cart").click(function(event) {
        event.preventDefault(); // Evitar el comportamiento predeterminado del botón
        
        var indice = $(this).data("indice");

        $.ajax({
            type: "POST",
            url: "carrito.php",
            data: { add_to_cart: true, indice: indice },
            success: function(data) {
             alert(data);
         },
         error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX: " + error);
            alert("Error al agregar al carrito.");
        }
    });
    });
                    });
                </script>

            </body>
            </html>