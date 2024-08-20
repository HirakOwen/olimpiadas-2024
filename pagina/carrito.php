
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

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- CSS Links-->
    <link rel="stylesheet" href="index_css/menu.css">
    <link rel="stylesheet" href="index_css/header.css" />
    <link rel="stylesheet" href="index_css/style.css">
    <link rel="stylesheet" href="./assets/carro/carrito.css" />
    <style>
      p {
        margin: 0 !important;
      }
    </style>

    <title>Inicio</title>
  </head>
  <body id="body" style="max-width: 100vW">
    <!-- Header -->
    <header
      class="d-flex justify-content-center align-items-center flex-column p-0 position-fixed flex-md-row"
    >
    <!-- Mobile -->
      <div class="d-flex justify-content-between align-items-center w-100 d-md-none">
        <a href="index.php"><img src="imgs/icon.png" alt="icon.png" /></a>
        <img src="imgs/horizonsports.png" alt="horizonsport.png">
        <img src="imgs/menu.png" alt="menu.png" onclick="desplegar()" />
      </div>
    <!-- End Mobile -->
    <!-- Dekstop-->
      <div class="d-none justify-content-center align-items-center d-md-flex sm-horizon">
        <a href="index.php"><img src="imgs/desktop/Desktop.png" alt="icon.png" class="sm-icon"/></a>
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
            <li><a href="tienda.html">Ropa Deportiva</a></li>
            <li><a href="tienda.html">Calzado Deportivo</a></li>
            <li><a href="tienda.html">Equipamiento Deportivo</a></li>
            <li><a href="tienda.html">Nutricion y Suplementos</a></li>
            <li><a href="tienda.html">Fitness y Entrenamiento</a></li>
          </ul>
      </div>
        <div class="d-flex user-menu-desktop">
          <ul class="d-flex justify-content-center align-items-center">
            <li><a href="carrito.php"><img src="imgs/carrito-de-compras.png" alt="carrito.png"></a></li>
            <li><a href="#"><img src="imgs/guardado.png" alt="guardado.png"></a></li>
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
            <li><a href="tienda.html">Ropa Deportiva<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
            <li><a href="tienda.html">Calzado Deportivo<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
            <li><a href="tienda.html">Equipamiento Deportivo<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
            <li><a href="tienda.html">Nutricion y Suplementos<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
            <li><a href="tienda.html">Fitness y Entrenamiento<img src="imgs/flecha-derecha.png" alt="flecha"></a></li>
        </ul>

       <hr>

       <ul class="user_menu row d-flex gap-3 mt-2">
            <li><a href="index.php"><img src="imgs/casa.png" alt="inicio.png">Inicio</a></li>
            <li><a href="carrito.php"><img src="imgs/carrito-de-compras.png" alt="carrito.png">Carrito de compras</a></a></li>
            <li><a href="#"><img src="imgs/guardado.png" alt="guardado.png">Guardados</a></a></li>
            <li><a href="#"><img src="imgs/terminos-y-condiciones.png" alt="terminos.png">Terminos y Condiciones</a></a></li>
            <li><a href="#"><img src="imgs/informacion.png" alt="faq.png">Preguntas frecuentes</a></a></li>
        </ul>

        <hr>

        <div class="footer_menu text-center w-100 m-1">
            © 2024 Todos los derechos reservados.
        </div>
    </div>



    <main>
      <section class="cart-header">
        <img src="./assets/carro/titulocarrito.png" alt="Título Carrito" />
      </section>
      <section class="cart-body">
        <div class="cart-products-header">
          <p>Productos en el carrito:</p>
          <div class="cart-products-list">
            <div class="cart-item">
              <div class="cart-item-remove">
                <img src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
              </div>
              <p class="cart-item-name">Gorra SKIBIDI</p>
              <div class="cart-item-quantity">
                <p>Cantidad:</p>
                <input
                  type="text"
                  pattern="\d*"
                  inputmode="numeric"
                  class="cart-item-quantity-input"
                />
              </div>
              <p class="cart-item-total">Total: <span>$260.611</span></p>
            </div>
            <div class="cart-item">
              <div class="cart-item-remove">
                <img src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
              </div>
              <p class="cart-item-name">Gorra SKIBIDI</p>
              <div class="cart-item-quantity">
                <p>Cantidad:</p>
                <input
                  type="text"
                  pattern="\d*"
                  inputmode="numeric"
                  class="cart-item-quantity-input"
                />
              </div>
              <p class="cart-item-total">Total: <span>$260.611</span></p>
            </div>
            <div class="cart-item">
              <div class="cart-item-remove">
                <img src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
              </div>
              <p class="cart-item-name">Gorra SKIBIDI</p>
              <div class="cart-item-quantity">
                <p>Cantidad:</p>
                <input
                  type="text"
                  pattern="\d*"
                  inputmode="numeric"
                  class="cart-item-quantity-input"
                />
              </div>
              <p class="cart-item-total">Total: <span>$260.611</span></p>
            </div>
          </div>
          <button class="cart-clear-button">Vaciar carrito</button>
        </div>

        <div class="cart-summary">
          <p>Precios unitarios</p>
          <div class="cart-summary-price">
            <p>$260.611 Gorra SKIBIDI</p>
            <p>$260.611 Gorra SKIBIDI</p>
            <p>$260.611 Gorra SKIBIDI</p>
          </div>
          <div class="cart-summary-details">
            <p><span>Total a pagar: </span> <span> $34.800</span></p>
            <button>
              <p>Proceder con la compra</p>
              <div class="icon-button"><img src="./assets/carro/pagar.png" /></div>
            </button>
          </div>
        </div>
      </section>
    </main>
  </body>
  <script>
    document
      .querySelectorAll(".cart-item-quantity-input")
      .forEach(function (input) {
        input.addEventListener("input", function (event) {
          this.value = this.value.replace(/\D/g, "");
        });
      });   
        function adjustMainMargin() {
            const headerHeight = document.querySelector('header').offsetHeight;
            document.querySelector('main').style.paddingTop = headerHeight + 'px';
        }

        adjustMainMargin();

  
        const resizeObserver = new ResizeObserver(adjustMainMargin);

    
        resizeObserver.observe(header);
  </script>
</html>
