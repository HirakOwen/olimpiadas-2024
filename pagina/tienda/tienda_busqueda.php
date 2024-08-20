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
    <link rel="stylesheet" href="index_css/style.css">
    <link rel="stylesheet" href="tienda/Lista_prod.css">

    <title>Inicio</title>
  </head>
  <body>
    <!-- Header -->
    <header
      class="d-flex justify-content-center align-items-center flex-column p-0 position-fixed flex-md-row"
    >
    <!-- Mobile -->
      <div class="d-flex justify-content-between align-items-center w-100 d-md-none">
        <a href="index.html"><img src="imgs/icon.png" alt="icon.png" /></a>
        <img src="imgs/horizonsports.png" alt="horizonsport.png">
        <img src="imgs/menu.png" alt="menu.png" onclick="desplegar()" />
      </div>
    <!-- End Mobile -->
    <!-- Dekstop-->
      <div class="d-none justify-content-center align-items-center d-md-flex sm-horizon">
        <a href="index.html"><img src="imgs/desktop/Desktop.png" alt="icon.png" class="sm-icon"/></a>
      </div>
    <!-- End Dekstop-->
      <form
        action="#"
        method="GET"
        class="d-flex justify-content-center align-items-center flex-row mb-3 p-0 rounded-1"
      >
        <input
          type="search"
          name="buscar"
          placeholder="Buscar productos..."
          class="ps-2 m-0"
        />
        <button class="rounded-5">
          <img src="imgs/lupa.png" alt="lupa.png" class="p-0 m-0" />
        </button>
      </form>
      <!-- Dekstop Menu-->
       <div class="d-none d-md-flex dekstop-menu">
        <p onclick="desplegarDesktop()"><img src="imgs/flecha-derecha.png" alt="flecha">Tienda</p>
        <div id="productos-sm">
          <ul class="productos-sm d-none d-md-flex flex-column justify-content-center align-items-center p-3 gap-3">
            <li><a href="tienda_ropa.html">Ropa Deportiva</a></li>
            <li><a href="tienda_calzado.html">Calzado Deportivo</a></li>
            <li><a href="tienda_equipamiento.html">Equipamiento Deportivo</a></li>
            <li><a href="tienda_supl.html">Nutricion y Suplementos</a></li>
            <li><a href="tienda_fitness.html">Fitness y Entrenamiento</a></li>
          </ul>
      </div>
        <div class="d-flex user-menu-desktop">
          <ul class="d-flex justify-content-center align-items-center">
            <li><a href="#"><img src="imgs/carrito-de-compras.png" alt="carrito.png"></a></a></li>
            <li><a href="#"><img src="imgs/guardado.png" alt="guardado.png"></a></a></li>
            <li onclick="desplegarPerfil()"><img src="imgs/user.png" alt="inicio.png"></li>
        </ul>
        </div>
        <div id="perfil-desktop" class="links-perfil justify-content-center align-items-center flex-row">
            <a href="session/inicio_sesion.html">Iniciar Sesion</a><a href="session/registro.html">Registrarse</a>
        </div>
       </div>
      <!-- End Dekstop Menu-->
    </header>
    <!-- End Header -->
    <!-- Menu Screen -->
    <div id="menu_screen"></div>

    <!-- Menu -->
    <div id="menu" class="menu d-flex align-items-center flex-column text-white position-fixed h-100">
    <img src="imgs/x.png" alt="x.png" onclick="desplegar()">
      <div class="d-flex flex-column w-100">
        <div class="d-flex flex-row m-4 mb-3">
          <img src="imgs/user.png" alt="user.png" class="bg-light" />
          <h3 class="ms-3 mt-3 text-center fw-bold">Bienvenido</h3>
        </div>
        <p class="text-center ps-3 pe-3">Ingresa a tu cuenta para ver tus datos, compras y mas.</p>
        <div class="links d-flex justify-content-center align-items-center flex-row gap-3">
            <a href="session/inicio_sesion.html">Iniciar Sesion</a><p>|</p><a href="session/registro.html">Registrarse</a>
        </div>
      </div>

      <hr>

        <h3 class="text-center fw-bold ">Productos</h3>
        <ul class="d-flex flex-column gap-3 w-100 mt-2">
          <li><a href="tienda_ropa.html">Ropa Deportiva</a></li>
          <li><a href="tienda_calzado.html">Calzado Deportivo</a></li>
          <li><a href="tienda_equipamiento.html">Equipamiento Deportivo</a></li>
          <li><a href="tienda_supl.html">Nutricion y Suplementos</a></li>
          <li><a href="tienda_fitness.html">Fitness y Entrenamiento</a></li>
        </ul>

       <hr>

       <ul class="user_menu row d-flex gap-3 mt-2">
            <li><a href="index.html"><img src="imgs/casa.png" alt="inicio.png">Inicio</a></li>
            <li><a href="#"><img src="imgs/carrito-de-compras.png" alt="carrito.png">Carrito de compras</a></a></li>
            <li><a href="#"><img src="imgs/guardado.png" alt="guardado.png">Guardados</a></a></li>
            <li><a href="#"><img src="imgs/terminos-y-condiciones.png" alt="terminos.png">Terminos y Condiciones</a></a></li>
            <li><a href="#"><img src="imgs/informacion.png" alt="faq.png">Preguntas frecuentes</a></a></li>
        </ul>

        <hr>

        <div class="footer_menu text-center w-100 m-1">
            © 2024 Todos los derechos reservados.
        </div>
    </div>
    <!-- Fin Menu -->


<!--Header_Prod-->
 <div class="d-flex justify-content-between align-items-center filter-bar" style="background-color: #C2C2C2;">
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="ordenarBtn" data-bs-toggle="dropdown" aria-expanded="false">
          Ordenar
        </button>
        <ul class="dropdown-menu" aria-labelledby="ordenarBtn">
          <li><a class="dropdown-item" href="#" data-sort="menor">Menor precio</a></li>
          <li><a class="dropdown-item" href="#" data-sort="mayor">Mayor precio</a></li>
          <li><a class="dropdown-item" href="#" data-sort="original">Más vendidos</a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="filtrarBtn" data-bs-toggle="dropdown" aria-expanded="false">
          Filtrar
        </button>
        <ul class="dropdown-menu" aria-labelledby="filtrarBtn">
          <li><a class="dropdown-item" href="#" data-filter="all">Todos</a></li>
          <li><a class="dropdown-item" href="#" data-filter="Ropa Deportiva">Ropa Deportiva</a></li>
          <li><a class="dropdown-item" href="#" data-filter="Calzado Deportivo">Calzado Deportivo</a></li>
          <li><a class="dropdown-item" href="#" data-filter="Equipamiento Deportivo">Equipamiento Deportivo</a></li>
          <li><a class="dropdown-item" href="#" data-filter="Nutricion y Suplementos">Nutrición y Suplementos</a></li>
          <li><a class="dropdown-item" href="#" data-filter="Fitness y Entrenamiento">Fitness y Entrenamiento</a></li>
        </ul>
      </div>
    </div>
<!--End Header_Prod-->

    <!-- Product List -->
    <div class="container mt-4">
      <div class="row gx-4 gy-4" id="productList">
<?php ?>


    <footer class="w-100 mt-5">
      <div class="footer-superior d-flex justify-content-around align-items-center flex-row">
        <div class="mt-3">
          <ul class="d-md-flex justify-content-center align-items-center flex-column">
            <li><h3><b>Ayuda</b></h3>
            <li><a href="#">Politicas de Reembolso</a></li>
            <li><a href="#">Terminos y condiciones</a></li>
            <li><a href="#">Formas de envio</a></li>
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
    <script src="tienda/ordenar.js"></script>
  </body>
</html>
