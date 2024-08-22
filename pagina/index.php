<?php
session_start();
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

<body id="body" style="max-width: 100vW">
  <!--Header-->
  <?php include("../header.php"); ?>

  <div class="primerbloque">
    <img src="imgs/primerbloque.png" alt="primerbloque.png">
  </div>
  <div class="center-slider ps-2 pe-2">
    <div class="slider d-flex justify-content-center align-items-center w-100 mt-2">
      <div class="slides">
        <div class="slide">
          <img src="imgs/slider/img-slider-1.png" alt="img-slider-1">
        </div>
        <div class="slide">
          <img src="imgs/slider/img-slider-2.png" alt="img-slider-2">
        </div>
        <div class="slide">
          <img src="imgs/slider/img-slider-3.png" alt="img-slider-3">
        </div>
      </div>
    </div>

  </div>


  <div class="post-slider d-flex flex-column w-100 gap-3">
    <h2 class="text-center mt-4 subtitle">¿Que ofrecemos?</h2>
    <div class="d-flex justify-content-center align-items-center text-center row gap-4">

      <div class="tarjeta col-auto d-flex justify-content-center align-items-center text-center flex-column p-2">
        <a href="tienda_busqueda.php?filtro=Ropa Deportiva"><img src="imgs/ofrecer-imgs/ropa-de-deporte.png" alt="ropa.png"></a>
        Ropa deportiva
      </div>


      <div class="tarjeta col-auto d-flex justify-content-center align-items-center text-center flex-column p-2">
        <a href="tienda_busqueda.php?filtro=Calzado Deportivo"><img src="imgs/ofrecer-imgs/zapatos.png" alt="zapatos.png"></a>
        Calzado deportivo
      </div>


      <div class="tarjeta col-auto d-flex justify-content-center align-items-center text-center flex-column p-2">
        <a href="tienda_busqueda.php?filtro=Equipamiento Deportivo"><img src="imgs/ofrecer-imgs/pesa.png" alt="Equipamiento.png"></a>
        Equipamiento deportivo
      </div>



      <div class="tarjeta col-auto d-flex justify-content-center align-items-center text-center flex-column p-2">
        <a href="tienda_busqueda.php?filtro=Nutricion y Suplementos"><img src="imgs/ofrecer-imgs/comida-suplementaria.png" alt="suplementos.png"></a>
        Nutricion y Suplementos
      </div>



      <div class="tarjeta col-auto d-flex justify-content-center align-items-center text-center flex-column p-2">
        <a href="tienda_busqueda.php?filtro=Fitness y Entrenamiento"><img src="imgs/ofrecer-imgs/levantamiento-de-pesas.png" alt="fitness.png"></a>
        Fitness y Entrenamiento
      </div>
    </div>

  </div>

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
  <script src="script.js"></script>
</body>

</html>