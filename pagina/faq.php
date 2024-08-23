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

    <!-- Codec Pro font-->
    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet">
    <!--Poppins Font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!--Inter Font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz@1,14..32&display=swap" rel="stylesheet">
    <!-- CSS Links-->
    <link rel="stylesheet" href="index_css/menu.css">
    <link rel="stylesheet" href="index_css/header.css" />
    <link rel="stylesheet" href="faq_sources/faq.css">


    <title>Preguntas Frecuentes (FAQ)</title>
    <link rel="icon" href="recursos/logosimple.png">

  </head>
  <body id="body">
    
  <?php include ('../header.php'); ?>

  <div class="espacio"></div>

    <!--titulo-->
    <div class="row mt-3">


     <section class="offset-1 col-4 pt-1 offset-md-2">

      <p aling="left" class="poppins-bold titulo">Preguntas <br> Frecuentes</p>

    </section>

    <!--icono globo Q&A-->

      <div class="icono offset-3 offset-sm-2" >

        <img class="img-fluid" src="faq_sources/globo.png" alt="globo.png">

  
      </div>
    </div>

    <!--recuadros de preguntas y respuestas-->

  <div class="faq-item row mt-3 d-flex justify-content-center">

    <!--Contenedor por columna-->

    <div class="containercolumna  col-sm-5 col-10">

      <!--Pregunta 1-->

    <div class="row col-sm-12 col-10 containerfaq">

    <div class="faq-header  col-12" onclick="toggleFaq(1)">

      <span id="symbol1" class="symbol">+</span>
      <span>¿Cuáles son los medios de pago?</span>
    </div>


    <!--Respuesta 1-->

    <div id="faq1" class="faq-body col-12">
      <span class="poppins-regular">Los medios de pago disponibles a tráves de la página web son tarjeta de crédito y tarjeta de débito, para abonar en efectivo debe comprar en la sucursal.</span>
    </div>

    </div>

      <!--Pregunta 2-->


   <div class="row col-sm-12 col-10 ">

    <div class="faq-header  col-12" onclick="toggleFaq(2)">

      <span id="symbol1" class="symbol">+</span>
      <span>¿Cuáles son las formas de envío?</span>

    </div>

    <!--Respuesta 2-->


    <div id="faq2" class="faq-body col-12">
      <span class="poppins-regular">Actualmente realizamos envíos a tráves de Correo Argentino y Vía Cargo. Al realizar la compra podrá seleccionar su preferencia.</span>
    </div>

    </div>
           
    <!--Pregunta 3-->

    <div class="row col-sm-12 col-10 containerfaq">

    <div class="faq-header  col-12" onclick="toggleFaq(3)">

      <span id="symbol3" class="symbol">+</span>
      <span>¿Cómo hago un reembolso?</span>

    </div>

    <!--Respuesta 3-->


    <div id="faq3" class="faq-body col-12">
      <span class="poppins-regular">Para efectuar su reembolso contactése vía email a info@horizon.com y nos comunicaremos con usted en brevedad. Para ver mas sobre la política de reembolso haga <a href="tyc.html" title="Ir a la Página de Términos y Condiciones">Click Aquí</a></span>
    </div>

    </div>

    <!--Pregunta 4-->

   <div class="row col-sm-12 col-10">

    <div class="faq-header  col-12" onclick="toggleFaq(4)">

      <span id="symbol4" class="symbol">+</span>
      <span>¿Cómo veo mi carrito?</span>

    </div>

    <!--Respuesta 4-->

    <div id="faq4" class="faq-body col-12">
      <span class="poppins-regular">Puede seleccionar el icono de arriba a la derecha si esta en escritorio o si se encuentra en móvil, seleccione el menu, y luego la opción "carrito". Ambas opciones le redirigiran a su carrito de compras</span>
    </div>

    </div>

</div>

    <!--Contenedor interno por columna-->
    
<div class="containercolumna col-sm-5 col-10">
           
    <!--Pregunta 5-->

    <div class="row col-sm-12 col-10 containerfaq">

    <div class="faq-header  col-12" onclick="toggleFaq(5)">

      <span id="symbol5" class="symbol">+</span>
      <span>¿Cómo agrego un producto al carrito?</span>

    </div>

    <!--Respuesta 5-->


    <div id="faq5" class="faq-body col-12">
      <span class="poppins-regular"> Busque la publicación del producto que desea en la tienda y seleccione el icono con la palabra "añadir al carrito" que esta en la esquina inferior derecha</span>
    </div>

    </div>

    <!--Pregunta 6-->


   <div class="row col-sm-12 col-10">

    <div class="faq-header  col-12" onclick="toggleFaq(6)">

      <span id="symbol6" class="symbol">+</span>
      <span>¿Cómo puedo hablar con servicio al cliente?</span>

    </div>

    <!--Respuesta 6-->


    <div id="faq6" class="faq-body col-12">
      <span class="poppins-regular">Puede llamar o enviar mensaje al +54 9 11 5016-1658 o enviarnos un email a info@horizon.com</span>
    </div>

    </div>
           
    <!--Pregunta 7-->

    <div class="row col-sm-12 col-10 containerfaq">

    <div class="faq-header  col-12" onclick="toggleFaq(7)">

      <span id="symbol7" class="symbol">+</span>
      <span>¿Como hago un pedido?</span>

    </div>

    <!--Respuesta 7-->


    <div id="faq7" class="faq-body col-12">
      <span class="poppins-regular">Añada productos a su carrito que desee comprar, vaya a la página de <a href="carro/carrito.html" title="Ir a la Página de Carrito">Carrito</a>, seleccione "Proceder con la compra", y siga los pasos</span>
    </div>

    </div>

    <!--Pregunta 8-->


   <div class="row col-sm-12 col-10">

    <div class="faq-header  col-12" onclick="toggleFaq(8)">

      <span id="symbol8" class="symbol">+</span>
      <span>¿Puedo guardar en favoritos un producto?</span>

    </div>

    <!--Respuesta 8-->


    <div id="faq8" class="faq-body col-12">
      <span class="poppins-regular">Si, seleccione en la esquina inferior derecha el icono de "Guardado", y podrá ver sus productos guardados en la página de <a href="favoritos.html" title="Ir a la Página de Favoritos">Favoritos</a></span>
    </div>

    </div>

</div>

</div>

<!--linea gris de separación-->

<div class="col-10 linea mt-5"></div>

<!--Texto aclaración-->

<div class="row d-flex justify-content-center mt-4">

  <div class="col-4 text-center">
    <b>Si tu duda no fue resuelta puedes <br> consultarnos por: <br><br>info@horizon.com<br>+54 9 11 5016-1658</b>
  </div>

</div>

<script>
  
  
//funcion para que la respuesta a la pregunta se despliegue

  function toggleFaq(faqNumber) {

  //seleccion de la pregunta clickeada y el simbolo de la pregunta

    var faqBody = document.getElementById('faq' + faqNumber);
    var symbol = document.getElementById('symbol' + faqNumber);


// cambio de clases segun el estado de la pregunta

    if (faqBody.style.display === "none" || faqBody.style.display === "") {
      faqBody.style.display = "block";
      symbol.textContent = "−";  // Cambia a "menos" cuando se alterna
    } else {
      faqBody.style.display = "none";
      symbol.textContent = "+";  // Cambia a "más" cuando vuelve a su estado normal
    }
    }


</script>
















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
