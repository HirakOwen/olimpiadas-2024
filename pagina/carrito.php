<?php
session_start();
/*
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
  header("Location: index.php");
}
*/if(isset($_POST["vaciarCarro"])){
  unset($_SESSION["carrito"]);}
// Verificar si se ha enviado una solicitud para añadir un artículo al carrito
if (isset($_POST['add_to_cart'])) {
    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Obtener el índice del artículo seleccionado
    $indice = $_POST['indice'];

    // Cargar los datos del archivo JSON
    $ropa = file_get_contents('./ropa.json');
    $ropa = json_decode($ropa, true);

    // Agregar el artículo al carrito
    $_SESSION['carrito'][$indice] = $ropa[$indice];

    echo "Artículo añadido al carro: " . htmlspecialchars($ropa[$indice]['nombre']);
    exit(); // Terminar el script aquí para evitar mostrar el contenido de la página
}

// Verificar si se ha enviado una solicitud para eliminar un artículo
if (isset($_POST['remove_from_cart'])) {
    $indice = $_POST['indice'];
    unset($_SESSION['carrito'][$indice]); // Eliminar el artículo del carrito
    // Reindexar el array para evitar huecos en los índices
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
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
    <?php include("../header.php"); ?>

    <main>
      <section class="cart-header">
        <img src="./assets/carro/titulocarrito.png" alt="Título Carrito" />
      </section>
      <section class="cart-body">
        <div class="cart-products-header">
          <p>Productos en el carrito:</p>
          <div class="cart-products-list">
            <?php
          if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    foreach ($_SESSION['carrito'] as $indice => $carrito_item) {
        ?>
        <div class="cart-item">
            <div class="cart-item-remove">
                <form method="post" style="display:inline;">
                    <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                    <button type="submit" name="remove_from_cart" style="border:none; background:none; cursor:pointer;">
                        <img class="imagen-borrar" src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
                    </button>
                </form>
            </div>
            <p class="cart-item-name"><?php echo htmlspecialchars($carrito_item['nombre']); ?></p>
         
            <p class="cart-item-total">Total: <span>$<?php echo htmlspecialchars($carrito_item['precio']); ?></span></p>
        </div>
        <?php
    }
} else {
    echo "El carrito está vacío.";
}
?>
            
            
          </div>
          <form method="POST"><button class="cart-clear-button"type="submit" name="vaciarCarro"> Vaciar carrito</button></form>
        
        </div>
<?php
        $total = 0; // Inicializar el total

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    echo '<div class="cart-summary">';
    echo '<p>Precios unitarios</p>';
    echo '<div class="cart-summary-price">';

    foreach ($_SESSION['carrito'] as $indice => $carrito_item) {
        $precio = $carrito_item['precio'];
        $total += $precio; // Sumar el precio al total
        echo "<p>\$$precio " . htmlspecialchars($carrito_item['nombre']) . "</p>";
    }

    echo '</div>';
    echo '<div class="cart-summary-details">';
    echo "<p><span>Total a pagar: </span> <span> \$$total</span></p>";
    echo '<button><p>Proceder con la compra</p><div class="icon-button"><img src="./assets/carro/pagar.png" /></div></button>';
    echo '</div>';
    echo '</div>';
} 
?>
      </section>
    </main>
  </body>
  <script src="script.js"></script>
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
