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

    <?php include("../header.php");
 include("conexion.php");

$productMessageId = isset($_SESSION['message']['id']) ? intval($_SESSION['message']['id']) : 0;


?>

    <!--Container Categoria-->
    <div class="containertienda">
        <div class="containercat" id="ropa">
            <h3 class="titcategoria poppins-bold">Ropa Deportiva</h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->

    <!--Container Producto-->


     <?php $sql = "SELECT * FROM productos WHERE categoria = 'Ropa Deportiva' ";
$result = $conn->query($sql);




     //Calcular cantidad de productos para generar las cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    ?>
    <div class="container mt-5">
        <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="titproducto poppins-regular">

                                <!--Nombre Producto-->
                                <?php echo htmlspecialchars($row["nombre_producto"]); ?></h3>
                                <h3 class="descproducto poppins-regular">
                                    <!--Descriopción producto Producto-->
                                    <?php echo htmlspecialchars($row["descripcion"]); ?></h3>

                                    <h3 class="precio poppins-bold" align="center">$

                                        <!--Precio Producto-->
                                        <?php echo htmlspecialchars($row["precio"]); ?></h3>
                                        <!-- Botón de añadir al carrito -->


                                        <?php
                                                if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>
           <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);
            unset($_SESSION['message']);
        }   ?></h3>

                                        <form method="get" action="anadircarrito.php">
                                            <input type="hidden" name="action" value="add">
                                            <?php echo '<input type="hidden" name="id" value="'.$row["id_productos"].'">';?>
                                            <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>
                                            <h5 class="poppins-regular">Ingrese cantidad</h5>
                                            <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                            <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                                            <br>

                                            <input type="submit" class="añadir" value="Agregar al carrito">
                                        </form>
                                                
                                    </div>
                                </div>
                            </div>
                        
                </div>

<?php }}else {      ?>

    <h3 class="noproducto poppins-regular" align="center">No hay productos de ropa disponible </h3 ><?php } ?>

<!-- FIn conteneiner Producto-->
<div class="row" style="margin-top:60px;" id="calzado"></div>

    <!--Container Categoria-->
        <div class="containercat" >
            <h3 class="titcategoria poppins-bold">Calzado Deportivo</h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->


    <!--Container Producto-->


     <?php $sql = "SELECT * FROM productos WHERE categoria = 'Calzado Deportivo' ";
$result = $conn->query($sql);


     //Calcular cantidad de productos para generar las cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    ?>
    <div class="container mt-5">
        <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="titproducto poppins-regular">

                                <!--Nombre Producto-->
                                <?php echo htmlspecialchars($row["nombre_producto"]); ?></h3>
                                <h3 class="descproducto poppins-regular">
                                    <!--Descriopción producto Producto-->
                                    <?php echo htmlspecialchars($row["descripcion"]); ?></h3>

                                    <h3 class="precio poppins-bold" align="center">$

                                        <!--Precio Producto-->
                                        <?php echo htmlspecialchars($row["precio"]); ?></h3>
                                        <!-- Botón de añadir al carrito -->


                                        <?php
                                                if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>
           <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);
            unset($_SESSION['message']);
        }   ?></h3>

                                        <form method="get" action="anadircarrito.php">
                                            <input type="hidden" name="action" value="add">
                                            <?php echo '<input type="hidden" name="id" value="'.$row["id_productos"].'">';?>
                                            <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>
                                            <h5 class="poppins-regular">Ingrese cantidad</h5>
                                            <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                            <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                                            <br>

                                            <input type="submit" class="añadir" value="Agregar al carrito">
                                        </form>
                                                
                                    </div>
                                </div>
                            </div>
                        
                </div>

<?php }}else {      ?>

    <h3 class="noproducto poppins-regular" align="center">No hay productos de ropa disponible </h3 ><?php } ?>


<!-- FIn conteneiner Producto-->
<div class="row" style="margin-top:60px;" id="equipo"></div>
    <!--Container Categoria-->
        <div class="containercat">
            <h3 class="titcategoria poppins-bold">Equipamiento Deportivo</h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->

    <!--Container Producto-->


     <?php $sql = "SELECT * FROM productos WHERE categoria = 'Equipamiento Deportivo' ";
$result = $conn->query($sql);


     //Calcular cantidad de productos para generar las cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    ?>
    <div class="container mt-5">
        <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="titproducto poppins-regular">

                                <!--Nombre Producto-->
                                <?php echo htmlspecialchars($row["nombre_producto"]); ?></h3>
                                <h3 class="descproducto poppins-regular">
                                    <!--Descriopción producto Producto-->
                                    <?php echo htmlspecialchars($row["descripcion"]); ?></h3>

                                    <h3 class="precio poppins-bold" align="center">$

                                        <!--Precio Producto-->
                                        <?php echo htmlspecialchars($row["precio"]); ?></h3>
                                        <!-- Botón de añadir al carrito -->


                                        <?php
                                                if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>
           <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);
            unset($_SESSION['message']);
        }   ?></h3>

                                        <form method="get" action="anadircarrito.php">
                                            <input type="hidden" name="action" value="add">
                                            <?php echo '<input type="hidden" name="id" value="'.$row["id_productos"].'">';?>
                                            <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>
                                            <h5 class="poppins-regular">Ingrese cantidad</h5>
                                            <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                            <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                                            <br>

                                            <input type="submit" class="añadir" value="Agregar al carrito">
                                        </form>
                                                
                                    </div>
                                </div>
                            </div>
                        
                </div>

<?php }}else {      ?>

    <h3 class="noproducto poppins-regular" align="center">No hay productos de ropa disponible </h3 ><?php } ?>

<!-- FIn conteneiner Producto-->
<div class="row" style="margin-top:60px;" id="nutricion"></div>
    <!--Container Categoria-->
        <div class="containercat">
            <h3 class="titcategoria poppins-bold">Nutricion y Suplementos</h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->

   <!--Container Producto-->


     <?php $sql = "SELECT * FROM productos WHERE categoria = 'Nutricion y Suplementos' ";
$result = $conn->query($sql);


     //Calcular cantidad de productos para generar las cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    ?>
    <div class="container mt-5">
        <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="titproducto poppins-regular">

                                <!--Nombre Producto-->
                                <?php echo htmlspecialchars($row["nombre_producto"]); ?></h3>
                                <h3 class="descproducto poppins-regular">
                                    <!--Descriopción producto Producto-->
                                    <?php echo htmlspecialchars($row["descripcion"]); ?></h3>

                                    <h3 class="precio poppins-bold" align="center">$

                                        <!--Precio Producto-->
                                        <?php echo htmlspecialchars($row["precio"]); ?></h3>
                                        <!-- Botón de añadir al carrito -->


                                        <?php
                                                if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>
           <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);
            unset($_SESSION['message']);
        }   ?></h3>

                                        <form method="get" action="anadircarrito.php">
                                            <input type="hidden" name="action" value="add">
                                            <?php echo '<input type="hidden" name="id" value="'.$row["id_productos"].'">';?>
                                            <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>
                                            <h5 class="poppins-regular">Ingrese cantidad</h5>
                                            <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                            <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                                            <br>

                                            <input type="submit" class="añadir" value="Agregar al carrito">
                                        </form>
                                                
                                    </div>
                                </div>
                            </div>
                        
                </div>

<?php }}else {      ?>

    <h3 class="noproducto poppins-regular" align="center">No hay productos de ropa disponible </h3 ><?php } ?>

<!-- FIn conteneiner Producto-->

<div class="row" style="margin-top:60px;" id="fitness"></div>

    <!--Container Categoria-->
        <div class="containercat">
            <h3 class="titcategoria poppins-bold">Fitness y Entrenamiento</h3>
        </div>
    </div>
    <!--Fin conteiner Categoría-->

       <!--Container Producto-->


     <?php $sql = "SELECT * FROM productos WHERE categoria = 'Fitness y Entrenamiento' ";
$result = $conn->query($sql);


     //Calcular cantidad de productos para generar las cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    ?>
    <div class="container mt-5">
        <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="titproducto poppins-regular">

                                <!--Nombre Producto-->
                                <?php echo htmlspecialchars($row["nombre_producto"]); ?></h3>
                                <h3 class="descproducto poppins-regular">
                                    <!--Descriopción producto Producto-->
                                    <?php echo htmlspecialchars($row["descripcion"]); ?></h3>

                                    <h3 class="precio poppins-bold" align="center">$

                                        <!--Precio Producto-->
                                        <?php echo htmlspecialchars($row["precio"]); ?></h3>
                                        <!-- Botón de añadir al carrito -->


                                        <?php
                                                if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>
           <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);
            unset($_SESSION['message']);
        }   ?></h3>

                                        <form method="get" action="anadircarrito.php">
                                            <input type="hidden" name="action" value="add">
                                            <?php echo '<input type="hidden" name="id" value="'.$row["id_productos"].'">';?>
                                            <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>
                                            <h5 class="poppins-regular">Ingrese cantidad</h5>
                                            <input type="number" name="cantidad" class="enviar" min="1" value="1">
                                            <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                                            <br>

                                            <input type="submit" class="añadir" value="Agregar al carrito">
                                        </form>
                                                
                                    </div>
                                </div>
                            </div>
                        
                </div>

<?php }}else {      ?>

    <h3 class="noproducto poppins-regular" align="center">No hay productos de ropa disponible </h3 ><?php } ?>

<!-- FIn conteneiner Producto-->







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