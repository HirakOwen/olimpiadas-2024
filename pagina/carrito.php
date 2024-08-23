<?php
session_start();
if (isset($_SESSION['permisos'])) {
  if ($_SESSION['permisos'] === "admin") {
    header("Location: index.php");
  }
}
$msj="";
if (!isset($_SESSION['id_usuario'])) {
  $msj ="Debe iniciar sesion para realizar una compra!";
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

  <!--Poppins Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <script src="script.js"></script>


  <title>Carrito</title>
  <link rel="icon" href="recursos/logosimple.png">
</head>

<?php include("../header.php");
$total = 0;

//para reiniciar la variable que redirije en caso de no iniciar sesion y proceder la compra
if (!isset($_SESSION['desdecarrito'])) {
  $_SESSION['desdecarrito'] = false;
}
if ($_SESSION['desdecarrito']) {
  $_SESSION['desdecarrito'] = false;
}

if (!isset($_SESSION['pedidoenviado'])) {
  $_SESSION['pedidoenviado'] = "";
}

?>

<div class="containercarrito">

  <section class="cart-header">
    <img src="./assets/carro/titulocarrito.png" alt="Título Carrito" />
  </section>

  <section class="cart-body row col-11 offset-1 d-flex">

    <div class="cart-products-header">
      <p class="responsive-text poppins-bold">Productos en el carrito:</span></p>
      <p class="responsive-text poppins-bold"><?php echo $msj;?></span></p>


      <div class="col-12">

        <?php // Verificar si el carrito está vacío
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
          echo "<p class='responsive-text poppins-bold'>".$_SESSION['pedidoenviado']."</p>";
          echo "<h1 class='text-center poppins-bold' style='color:#ddd;margin-top:50px;margin-bottom:100px;'>El carrito está vacío.</p>";

          unset($_SESSION['pedidoenviado']);
          exit;
        } else {

          foreach ($_SESSION['cart'] as $index => $item) {?>

            <div class="row col-12 prodcontainer p-4 rounded">

              <div class="cart-item-remove col-2">
                <form method="get" action="borrarproducto.php" style="display:inline;">
                  <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                  <button type="submit" style="border:none; background:none; cursor:pointer;">
                    <img class="imagen-borrar" src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
                  </button>
                </form>
              </div>

              <div class="col-4 d-flex align-items-center">
                <div class="nombre-prod offset-1 poppins-bold text-truncate"><?php echo htmlspecialchars($item['nombre']); ?></div>

              </div>

              <form action="actualizar_carrito.php" class="d-flex col-1 align-items-center" method="post">

                <h6 class="poppins-regular textocant listaproductos">Cant:</h6>

                <div class="cantidad col-12">
                  <input type="number" name="cantidad[<?php echo $index; ?>]" min="1" value="<?php echo intval($item['cantidad']); ?>" class="input-cantidad">
                </div>
              </form>

              <div class="col-2 d-flex align-items-center offset-3">

                <div class="nombre-prod offset-1 poppins-bold">$<?php echo number_format(($item['precio'] * $item['cantidad'])); ?> ARS</div>

              </div>


            </div>


          <?php
          }
          ?>


      </div>

      <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center">

        <!--Recuadro azul con la lista de precios unitarios-->
        <div class="listaprecios w-100">
          <br>
          <h6 class="poppins-bold responsive-text">Precios Unitarios:</h6>
          <br>
          <?php
          foreach ($_SESSION['cart'] as $index => $item) {
            $itemTotal = $item['precio'] * $item['cantidad'];
            $total += $itemTotal;
          ?>
            <h6 class="poppins-regular nombre-prod">
              <?php echo htmlspecialchars($item['nombre']); ?>: <b>$<?php echo number_format($item['precio'], 2); ?><br><br></b>
            </h6>
          <?php
          }
          // Al finalizar el bucle, muestra el total
          $_SESSION['total'] = $total;
          ?>
          <h6 class="poppins-bold responsive-text">Total a pagar: $<?php echo number_format($total, 2);} ?></h6>
        </div>

        <div class="w-100 d-flex justify-content-center align-items-center gap-1 gap-lg-3 mt-4">
          <!--Botón para vaciar el carrito-->
          <div>
            <a href="vaciarcarrito.php" class="cart-clear-button">Vaciar carrito</a>
          </div>
          <!--Botón para subir el pedido-->
          <div>
            <a href="cargarpedido.php" class="cart-clear-button">Proceder con el Pago</a>
          </div>
        </div>

      </div>
    </div>

</div>

</section>
</div>

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

</body>

</html>