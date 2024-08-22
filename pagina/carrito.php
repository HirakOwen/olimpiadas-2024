<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
  header("Location: index.php");
} elseif (isset($_SESSION['permisos'])) {
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


  <title>Inicio</title>
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
      <p class="responsive-text poppins-bold">Productos en el carrito:</p>

      <div class="col-12">

        <?php // Verificar si el carrito está vacío
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
          echo "<p>El carrito está vacío.</p>";
          echo $_SESSION['pedidoenviado'];
          unset($_SESSION['pedidoenviado']);
          exit;
        } else {


          foreach ($_SESSION['cart'] as $index => $item) {
        ?>


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
                <div class="nombre-prod offset-1 poppins-bold"><?php echo htmlspecialchars($item['nombre']); ?></div>

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


          <?php } ?>


      </div>

      <div class="row">

        <!--Recuadro azul con la lista de precios unitarios-->

        <div class="listaprecios col-md-3 mb-3">
          <h6 class="poppins-bold responsive-text">Precios Unitarios:</h6>
          <br><br>
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
          <h6 class="poppins-bold responsive-text">Total a pagar: $<?php echo number_format($total, 2);
                                                                  } ?></h6>
        </div>


        <div class="offset-1 col-2">

          <!--Botón para vaciar el carrito-->

          <a href="vaciarcarrito.php"><button class="cart-clear-button"> Vaciar carrito</button></a>

        </div>

        <div class="offset-1 col-2">

          <!--Botón para subir el pedido-->

          <a href="cargarpedido.php"><button class="cart-clear-button">Proceder con el Pago</button></a>

        </div>

      </div>
    </div>

</div>

</section>
</div>

</body>

</html>