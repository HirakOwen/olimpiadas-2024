<!-- Header -->
<header
  class="d-flex justify-content-center align-items-center flex-column p-0 position-fixed flex-md-row">
  <!-- Mobile -->
  <div class="d-flex justify-content-between align-items-center w-100 d-md-none">
    <a href="index.php"><img src="imgs/icon.png" alt="icon.png" /></a>
    <img src="imgs/horizonsports.png" alt="horizonsport.png">
    <img src="imgs/menu.png" alt="menu.png" onclick="desplegar()" />
  </div>
  <!-- End Mobile -->
  <!-- Dekstop-->
  <div class="d-none justify-content-center align-items-center d-md-flex sm-horizon">
    <a href="index.php"><img src="imgs/desktop/Desktop.png" alt="icon.png" class="sm-icon" /></a>
  </div>
  <!-- End Dekstop-->
  <form
    action="busqueda.php"
    method="POST"
    class="d-flex justify-content-center align-items-center flex-row mb-3 p-0 rounded-1">
    <input
      type="search"
      name="buscar"
      placeholder="Buscar productos..."
      class="ps-2 m-0"
      required />
    <button class="rounded-5">
      <img src="imgs/lupa.png" alt="lupa.png" class="p-0 m-0" />
    </button>
  </form>
  <!-- Dekstop Menu-->
  <div class="d-none d-md-flex dekstop-menu">
    <p onclick="desplegarDesktop()"><img src="imgs/flecha-derecha.png" alt="flecha">Tienda</p>
    <div id="productos-sm">
      <ul class="productos-sm d-none d-md-flex flex-column justify-content-center align-items-center p-3 gap-3">
        <li><a href="tienda_busqueda.php?filtro=ropa">Ropa Deportiva</a></li>
        <li><a href="tienda_busqueda.php?filtro=calzado">Calzado Deportivo</a></li>
        <li><a href="tienda_busqueda.php?filtro=equipo">Equipamiento Deportivo</a></li>
        <li><a href="tienda_busqueda.php?filtro=nutricion">Nutricion y Suplementos</a></li>
        <li><a href="tienda_busqueda.php?filtro=fitness">Fitness y Entrenamiento</a></li>
      </ul>
    </div>
    <div class="d-flex user-menu-desktop">
      <ul class="d-flex justify-content-center align-items-center">
        <li><a href="carrito.php"><img src="imgs/carrito-de-compras.png" alt="carrito.png"></a></li>
        <li><a href="#"><img src="imgs/guardado.png" alt="guardado.png"></a></li>
        <li onclick="desplegarPerfil()"><img src="imgs/user.png" alt="inicio.png"></li>
      </ul>
    </div>
    <!-- Codigo para las sesiones Desktop -->
    <?php
    if (isset($_SESSION['nombre']) && isset($_SESSION['id_usuario'])) {
      if ($_SESSION['permisos'] === "admin") {
       ?>
        <div id="perfil-desktop" class="links-perfil justify-content-center align-items-center flex-column">
          <img src="imgs/user.png" alt="user.png" style="width: 70px;">
          <?php echo "<h3>" . $_SESSION['nombre'] . "</h3>"; ?>
          <a href="admin/pagina_admin.php">Pagina Administrador</a>
          <a href="logout.php" class="btn btn-danger">Cerrar Sesion</a>
        </div>
      <?php
      } else {
      ?>
        <div id="perfil-desktop" class="links-perfil justify-content-center align-items-center flex-column">
          <img src="imgs/user.png" alt="user.png" style="width: 70px;">
          <?php echo "<h3>" . $_SESSION['nombre'] . "</h3>"; ?>
          <a href="subpag_users/perfil.php">Mi Perfil</a>
          <a href="logout.php" class="btn btn-danger">Cerrar Sesion</a>
        </div>
      <?php
      }
    } else {
      ?>
      <div id="perfil-desktop" class="links-perfil justify-content-center align-items-center flex-row">
        <a href="session/inicio_sesion.html">Iniciar Sesion</a><a href="session/registro.html">Registrarse</a>
      </div>
    <?php
    }
    ?>
    <!-- Fin del codigo para las sesiones Desktop -->
  </div>
  <!-- End Dekstop Menu-->
</header>
<!-- End Header -->
<!-- Menu Screen -->
<div id="menu_screen"></div>

<!-- Menu -->
<div id="menu" class="menu d-flex align-items-center flex-column text-white position-fixed h-100">
  <img src="imgs/x.png" alt="x.png" onclick="desplegar()">
  <!-- Codigo para las sesiones Mobile -->
  <?php
  if (isset($_SESSION['nombre']) && isset($_SESSION['id_usuario'])) {
    if ($_SESSION['permisos'] === "admin") {
  ?>
      <div class="d-flex flex-column w-100">
        <div class="d-flex flex-row m-4 mb-3 links">
          <img src="imgs/user.png" alt="user.png" class="bg-light" />
          <a href="admin/pagina_admin.php" class="m-3">Pagina Administrador</a>
        </div>
        <?php echo '<h3 class="text-center">' . $_SESSION['nombre'] . '</h3>'; ?>
        <div class="links d-flex justify-content-center align-items-center flex-row gap-3">
          <a href="logout.php" class="btn btn-danger p-2 mb-1">Cerrar Sesion</a>
        </div>
      </div>
    <?php
    } else {
    ?>
      <div class="d-flex flex-column w-100">
        <div class="d-flex flex-row m-4 mb-3 links">
          <img src="imgs/user.png" alt="user.png" class="bg-light" />
          <a href="subpag_users/perfil.php" class="m-3">Mi Perfil</a>
        </div>
        <?php echo '<h3 class="text-center">' . $_SESSION['nombre'] . '</h3>'; ?>
        <div class="links d-flex justify-content-center align-items-center flex-row gap-3">
          <a href="logout.php" class="btn btn-danger p-2 mb-1">Cerrar Sesion</a>
        </div>
      </div>
    <?php
    }
  } else {
    ?>
    <div class="d-flex flex-column w-100">
      <div class="d-flex flex-row m-4 mb-3">
        <img src="imgs/user.png" alt="user.png" class="bg-light" />
        <h3 class="ms-3 mt-3 text-center fw-bold">Bienvenido</h3>
      </div>
      <p class="text-center ps-3 pe-3">Ingresa a tu cuenta para ver tus datos, compras y mas.</p>
      <div class="links d-flex justify-content-center align-items-center flex-row gap-3">
        <a href="session/inicio_sesion.html">Iniciar Sesion</a>
        <p>|</p><a href="session/registro.html">Registrarse</a>
      </div>
    </div>
  <?php
  }
  ?>
  <!-- Aca termina el codigo para las sesiones Mobile -->

  <hr>

  <h3 class="text-center fw-bold ">Productos</h3>
  <ul class="d-flex flex-column gap-3 w-100 mt-2">
    <li><a href="tienda_busqueda.php?filtro=ropa">Ropa Deportiva<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
    <li><a href="tienda_busqueda.php?filtro=calzado">Calzado Deportivo<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
    <li><a href="tienda_busqueda.php?filtro=equipo">Equipamiento Deportivo<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
    <li><a href="tienda_busqueda.php?filtro=nutricion">Nutricion y Suplementos<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
    <li><a href="tienda_busqueda.php?filtro=fitness">Fitness y Entrenamiento<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
  </ul>

  <hr>

  <ul class="user_menu row d-flex gap-3 mt-2">
    <li><a href="index.php"><img src="imgs/casa.png" alt="inicio.png">Inicio</a></li>
    <li><a href="carrito.php"><img src="imgs/carrito-de-compras.png" alt="carrito.png">Carrito de compras</a></a></li>
    <li><a href="../pagina/tyc.php"><img src="imgs/terminos-y-condiciones.png" alt="terminos.png">Terminos y Condiciones</a></a></li>
    <li><a href="faq.php"><img src="imgs/informacion.png" alt="faq.png">Preguntas frecuentes</a></a></li>
  </ul>

  <hr>

  <div class="footer_menu text-center w-100 m-1">
    © 2024 Todos los derechos reservados.
  </div>
</div>
<!-- Fin Menu -->