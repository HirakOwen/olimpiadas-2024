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
  <link rel="stylesheet" href="tienda/Lista_prod.css">
    <!--Poppins Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <title>Buscar producto</title>
  <link rel="shorcut icon" href="recursos/logosimple.png">
</head>

<body id="body" class="h-100 d-flex flex-column">
  <script src="script.js"></script>
  <!--Header-->
  <?php
  session_start();
  include("../header.php");
  $productMessageId = isset($_SESSION['message']['id']) ? intval($_SESSION['message']['id']) : 0;

  if(!isset($_SESSION['permisos'])){
    $_SESSION['permisos'] = 'invitado';
  }


  ?>
  <div class="espacio">
    
  </div>
  <?php
  include("conexion.php");
  //Verifica si el usuario entro a la pagina enviando el formulario de busqueda o si fue redirigido por anadircarrito.php
  if (isset($_GET['buscar'])) {
    // Redirigido
    $buscar = $_GET['buscar'];
  } elseif (isset($_POST['buscar'])) {
    // Formulario
    $buscar = trim($_POST['buscar']);
  }
  $sql = "SELECT * FROM productos WHERE nombre_producto LIKE '%$buscar%' OR descripcion LIKE '%$buscar%'";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
  ?>
    <div class="content d-flex flex-column">
      <h1 class="h1-resultados poppins-bold offset-1 mt-4">Productos Encontrados:</h1>
      <div class="container d-flex justify-content-center align-items-center flex-wrap gap-3">
        <?php
        while ($row = $resultado->fetch_assoc()) {
          $producto = $row['nombre_producto'];
          $precio = $row['precio'];
          $descripcion = $row['descripcion'];
          $categoria = $row['categoria'];
        ?>
          <!--Inicio Card Producto-->
                  <div class="tarjeta-busqueda p-4">
                    <h3 class="titproducto poppins-regular">
                    <!--Nombre del Producto-->
                    <?php echo htmlspecialchars($row["nombre_producto"]); ?>
                    </h3>
                    
                    <p class="poppins-regular">
                    
                    <!--Descripción  del producto-->
                    
                    <?php echo htmlspecialchars($row["descripcion"]); ?>
                    
                    </p>
                    
                    <h3 class="precio">$
                    
                    <!--Precio del Producto-->
                    
                    <?php echo htmlspecialchars($row["precio"]); ?>
                    
                    </h3>
                    
                    <!-- Botón de añadir al carrito -->
                    
                    
                    <?php

                    if ($row["id_productos"] == $productMessageId && isset($_SESSION['message'])) { ?>

                    
                        <h3 class="mensajecarrito"> <?php echo htmlspecialchars($_SESSION['message']['text']);

                        unset($_SESSION['message']);
                    
                    }   ?></h3>

                    <!--Boton e input para cambiar cantidad-->
                
                    <?php

                    if ($_SESSION['permisos'] != 'admin'){ ?>

                     <!--Input del carrito-->

                      <div class="d-flex align-items-center gap-1 mt-3">
                           <form method="get" action="anadircarrito.php" class="col-8 col-sm-6">
                            <input type="hidden" name="action" value="add">
                            <?php echo '<input type="hidden" name="id" value="' . $row["id_productos"] . '">'; ?>
                            <?php echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($row["nombre_producto"]) . '">'; ?>                        <input type="submit" class="btn btn-primary" value="Agregar al carrito">
                            <input type="number" name="cantidad" class="enviar" min="1" value="1">
                            <?php echo '<input type="hidden" name="precio" value="' . $row["precio"] . '">'; ?>
                            <input type="hidden" name="buscar" value="<?php echo $buscar; ?>">
                        </form>
                        <?php

                         //Boton de guardado
  
  
  
                         $id_productos = $row['id_productos'];
  
                         $id_usuario = isset($_SESSION['id_usuario']) ? intval($_SESSION['id_usuario']) : 0;
  
  
                         if($id_usuario > 0){
          
          
                        // Verificar si el producto está en la tabla 'guardados'
          
                         $sql_check = "SELECT * FROM guardados WHERE id_productos = $id_productos AND id_usuario = $id_usuario";
          

                         $result_check = $conn->query($sql_check);
          
          
              
                         $is_favorito = $result_check->num_rows > 0;
          
              
                         $icono_guardado = $is_favorito ? 'imgs/guardado_prod.png' : 'imgs/guardado.png';
          
          
                        ?>

                        <!--Container del icono-->
          
          
                        <div class="favorito-icono offset-2 offset-sm-4 imguardado">
          
                          <form method="get" action="favoritos_sources/agregar_favorito.php">
          
                            <input type="hidden" name="id_productos" value="<?php echo $id_productos; ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                            <input type="hidden" name="buscar" value="<?php echo $buscar; ?>">
                            <button type="submit" style="border:none; background:none; cursor:pointer;">
                              <img class="img-fluid" src="<?php echo $icono_guardado; ?>" alt="Agregar a Favoritos">
                            </button>
                          </form>
                        </div>
                      
                      

                       </div>

                       <?php } ?>
                      </div>


                   <?php } ?>
                </div><!--fin tarjeta-->
                
                 <?php } ?>
              </div>          


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
  }else {
  ?>
    <h1 class="text-center">No se encontraron productos.</h1>
    <!-- Footer si no hay resultados -->
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
  <?php
  }
  ?>

</body>

</html>