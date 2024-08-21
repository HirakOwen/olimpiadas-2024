<?php
session_start();
if ($_SESSION['permisos'] === "admin") {
  header("Location: index.php");
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
  <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet">
  <!-- CSS Links-->
  <link rel="stylesheet" href="index_css/menu.css">
  <link rel="stylesheet" href="index_css/header.css" />
  <link rel="stylesheet" href="index_css/style.css">

  <title>Inicio</title>
</head>

<body id="body" class="h-100 d-flex flex-column">
  <script src="script.js"></script>
  <!--Header-->
  <?php
  include("../header.php");
  ?>
  <div class="header-separacion">
    .
  </div>
  <?php
  include("conexion.php");
  $buscar = trim($_POST['buscar']);
  $sql = "SELECT * FROM productos WHERE nombre_producto LIKE '%$buscar%' OR descripcion LIKE '%$buscar%'";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
  ?>
    <div class="content d-flex flex-column">
      <h2 class="container mb-5 h2-resultados">Resultados de la busqueda: <?php echo "<b>" . $buscar . "</b>"; ?> </h2>
      <div class="container d-flex justify-content-center align-items-center flex-wrap gap-3">
        <?php
        while ($row = $resultado->fetch_assoc()) {
          $id_producto = $row['id_productos'];
          $producto = $row['nombre_producto'];
          $precio = $row['precio'];
          $descripcion = $row['descripcion'];
          $categoria = $row['categoria'];
        ?>
          <div class="d-flex justify-content-around align-items-center flex-column rounded-1 p-3 tarjeta-busqueda">
            <h2 class="text-start w-100 pb-2"><?php echo $producto; ?></h2>
            <p class="w-100 text-start"><?php echo $descripcion; ?></p>
            <div class="d-flex justify-content-center align-items-center flex-row w-100">
              <h6 class="w-75 fw-bold">Envio gratis</h6>
              <h4 class="w-25 text-end"><?php echo "$" . $precio; ?></h4>
            </div>
            <div class="d-flex justify-content-end w-100">
              <a href="#?id=<?php echo $id_producto; ?>" class="btn btn-primary d-flex justify-content-center align-content-center">
                <img src="imgs/carrito-de-compras.png" alt="carrito.png">
              </a>
            </div>
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

</body>

</html>