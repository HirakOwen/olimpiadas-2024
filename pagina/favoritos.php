<?php
    session_start();
    include ('conexion.php');
    if (isset($_SESSION['permisos'])) {
      if ($_SESSION['permisos'] === "admin") {
        header("Location: index.php");
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
      crossorigin="anonymous"
    />
    <!-- Horizon font -->
    <link href="https://fonts.cdnfonts.com/css/horizon" rel="stylesheet" />
    <!-- Codec Pro font-->
    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet">
    <!-- CSS Links-->
    <link rel="stylesheet" href="index_css/menu.css">
    <link rel="stylesheet" href="index_css/header.css" />
    <link rel="stylesheet" href="favoritos_sources/favoritos.css">

      <!--Poppins Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <title>Favoritos</title>
    <link rel="shorcut icon" href="recursos/logosimple.png">
  </head>
  <body id="body" style="max-width: 100vW">

  <?php include('../header.php'); ?>

  <div class="espacio"></div>

  <!--icono simbologuardado-->
  <div class="row mb-3 mb-sm-5">
    <div class="icono offset-1 offset-sm-1 pt-3">
      <img class="img-fluid" src="favoritos_sources/simbologuardados.png" alt="simbologuardados.png">
    </div>

    <!--titulo-->
    <section class="col-6 d-flex align-items-center">
      <p align="left" class="poppins-bold titulo">Productos Favoritos</p>
    </section>
  </div>

  <!--Lista de Productos Favoritos-->
  <?php

    if (!isset($_SESSION['id_usuario'])) { ?>
    <h1 class="text-center poppins-bold" style="color:#ddd;margin-top:150px;margin-bottom:400px;">
        <?php echo 'Necesitas iniciar sesión para ver tus productos favoritos'; ?>
      </h1>
  <?php } else {
    
    $id_usuario = $_SESSION['id_usuario'];

// Consulta para obtener los productos guardados del usuario

$sql = "SELECT p.nombre_producto, p.precio, p.id_productos 
        FROM guardados g 
        JOIN productos p ON g.id_productos = p.id_productos 
        WHERE g.id_usuario = $id_usuario";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los productos guardados
  while ($row = $result->fetch_assoc()) {
    $producto_id = $row['id_productos'];
    $nombre_producto = $row['nombre_producto'];
    $precio = $row['precio'];
    ?>

    <!--Recuadro Producto-->
    <div class="row offset-1 col-10 col-sm-10 producto ">
      <!--Icono de cruz-->

      <div class="align-items-center d-flex cruz">
      <form method="post" action="favoritos_sources/eliminar_favorito.php">
        <input type="hidden" name="id_productos" value="<?php echo $producto_id ?>">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
        <button type="submit" style="border:none; background:none; cursor:pointer;">
          <img class="img-fluid" src="favoritos_sources/cruz.png" alt="Eliminar Producto">
          <form method="post" action="eliminar_favorito.php" style="display:inline;">
        </button>
      </form>
    </div>
    <!--Nombre producto-->
    <div class="col-4 col-sm-5 d-flex align-items-center offset-1">
      <h5 align="left" class="poppins-regular nombreprod"><?php echo htmlspecialchars($nombre_producto); ?></h5>
    </div>
    <!--Precio producto-->
      <div class="col-5 col-sm-4 d-flex align-items-center precio">
        <h5 align="left" class="poppins-regular nombreprod">Precio: <b>$<?php echo number_format($precio); ?> ARS</b></h5>
      </div>
    </div>
         <!-- Fin recuadro Producto -->
         <?php
    }
} else { ?>
    <h1 class="text-center poppins-bold" style="color:#ddd;margin-top:150px;margin-bottom:300px;">
    <?php echo 'No tienes productos guardados'; ?>
  </h1> <?php
}
  } ?>

  <!--Footer-->
  <footer class="w-100 mt-5">
      <div class="footer-superior d-flex justify-content-around align-items-center flex-row">
        <div class="mt-3">
          <ul class="d-md-flex justify-content-center align-items-center flex-column">
            <li><h3><b>Ayuda</b></h3>
            <li><a href="faq.php">Politicas de Reembolso</a></li>
            <li><a href="tyc.php">Terminos y condiciones</a></li>
            <li><a href="faq.php">Formas de envio</a></li>
            <li><a href="faq.php">Medios de pago</a></li>
            <li><a href="faq.php">Preguntas Frecuentes</a></li>

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
  </body>
</html>
