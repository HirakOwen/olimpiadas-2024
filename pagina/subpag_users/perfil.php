<?php
session_start();
if (!isset($_SESSION['nombre']) || !isset($_SESSION['id_usuario'])) {
  header("Location: ../index.php");
} elseif (isset($_SESSION['permisos'])) {
  if ($_SESSION['permisos'] === "admin") {
    header("Location: ../index.php");
  }
}

include("../conexion.php");
// Variables de sesion
$nombre = $_SESSION['nombre'];
$id_usuario = $_SESSION['id_usuario'];

//Ejecuta la consulta
$sql = "SELECT email, domicilio, codigo_postal, recibe, telefono, DNI FROM `usuarios` WHERE id_usuario = '$id_usuario'";
$resultado = $conn->query($sql);
// Verifica si devolvio resultados
if ($resultado->num_rows == 1) {
  while ($fila = $resultado->fetch_assoc()) {
    $email = $fila["email"];
    $domicilio = $fila["domicilio"];
    $codigo_postal = $fila["codigo_postal"];
    $recibe = $fila["recibe"];
    $telefono = $fila["telefono"];
    $dni = $fila["DNI"];
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
  <!-- Codec Pro font-->
  <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet" />
  <!-- CSS Links-->
  <link rel="stylesheet" href="perfil.css" />
  <title>Perfil</title>
</head>

<body>

  <!-- Header -->
  <header
    class="d-flex justify-content-center align-items-center flex-column w-100 bg-black p-3 flex-lg-row justify-content-lg-around">
    <img src="../imgs/horizonsports.png" alt="horizonsports" />
    <form
      action="../../busqueda.php"
      method="POST"
      class="d-flex justify-content-center align-items-center flex-row mb-2 rounded-1 w-100">
      <input type="search" name="buscar" placeholder="Buscar productos..." />
      <button class="rounded-5">
        <img src="imgs/lupa.png" alt="lupa.png" class="p-0 m-0" />
      </button>
    </form>
  </header>
  <!-- End Header-->

  <a
    href="../index.php"
    class="regresar m-3 mt-4 ps-2 gap-2 d-flex justify-content-center"><img src="../imgs/flecha-reversa.png" alt="flechita" />
    <p class="p-0 m-0 mb-1">Volver al inicio</p>
  </a>

  <div
    class="w-100 d-flex justify-content-center align-items-center flex-column mt-3 flex-md-row">
    <div
      class="d-flex align-items-center align-items-md-end flex-column">
      <div class="tarjeta-perfil bg-white m-3 p-3 rounded-1 w-md-50">
        <h3 class="d-flex align-items-start">
          <img src="../imgs/bolsa-de-compra.png" alt="ubi" />Mis pedidos
        </h3>
        <p>
          Podes ver los pedidos que tenes encargados haciendo click
          <a href="#">AQUI</a>
        </p>
      </div>

      <div class="tarjeta-perfil bg-white m-3 p-3 rounded-1">
        <h3 class="d-flex align-items-start">
          <img src="../imgs/favorito-amarillo.png" alt="ubi" />Mis guardados
        </h3>
        <p>
          Podes ver los productos que guardaste haciendo click <a href="#">ACA</a>
        </p>
      </div>
    </div>

    <div class="d-flex justify-content-center align-items-center align-items-md-start flex-column">
      <div class="tarjeta-perfil bg-white m-3 p-3 rounded-1">
        <h3 class="d-flex align-items-start">
          <img src="../imgs/ubicacion.png" alt="ubi" />Domicilio
        </h3>
        <ul class="w-100 rounded-1 mt-3 p-2">
          <li class="d-flex justify-content-between">
            Envio a domicilio <img src="../imgs/tilde-correcto.png" alt="" />
          </li>
          <li>
            <p>Domicilio:</p>
            <?php if (isset($domicilio)) {
              echo $domicilio;
            }
            ?>
          </li>
          <li>
            <p>Codigo Postal:</p>
            <?php if ($codigo_postal != 0) {
              echo $codigo_postal;
            }
            ?>
          </li>
          <li>
            <p>Recibe:</p>
            <?php if (isset($recibe)) {
              echo $recibe;
            }
            ?>
          </li>
        </ul>
        <div class="cambiar-link text-center">
          <a href="domicilio/cambiar_domicilio.php?id=<?php echo $id_usuario; ?>">Cambiar domicilio <img src="../imgs/lapiz.png" alt="lapiz" /></a>
        </div>
      </div>

      <div class="tarjeta-perfil bg-white m-3 p-3 rounded-1">
        <h3 class="d-flex align-items-start">
          <img src="../imgs/hoja-de-papel.png" alt="ubi" />Cuenta
        </h3>
        <ul class="w-100 rounded-1 mt-3 p-2">
          <li class="d-flex justify-content-between">
            Consumidor Final <img src="../imgs/tilde-correcto.png" alt="" />
          </li>
          <li>
            <p>Nombre Completo:</p>
            <?php if (isset($recibe)) {
              echo $recibe;
            }
            ?>
          </li>
          <li>
            <p>DNI:</p>
            <?php if ($dni != 0) {
              echo $dni;
            }
            ?>
          </li>
          <li>
            <p>Telefono:</p>
            <?php
            echo $telefono;
            ?>
          </li>
        </ul>
        <div class="cambiar-link text-center">
          <a href="cuenta/editar_cuenta.php?id=<?php echo $id_usuario; ?>">Cambiar cuenta <img src="../imgs/lapiz.png" alt="lapiz" /></a>
        </div>
      </div>

      <div class="tarjeta-perfil bg-white m-3 p-3 rounded-1">
        <h3 class="d-flex align-items-start">
          <img src="../imgs/user.png" alt="ubi" />Datos de la cuenta
        </h3>
        <ul class="w-100 rounded-1 mt-3 p-2">
          <li>
            <p>Username:</p>
            <?php
            echo $nombre;
            ?>
          </li>
          <li>
            <p>Email:</p>
            <?php
            echo $email;
            ?>
          </li>
          <li>
            <p>Contraseña:</p>
            ***********
          </li>
        </ul>
        <div class="cambiar-link text-center">
          <a href="datos/cambiar_datos.php?id=<?php echo $id_usuario; ?>">Cambiar datos <img src="../imgs/lapiz.png" alt="lapiz" /></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w-100 mt-3">
    <div
      class="footer-superior d-flex justify-content-around align-items-center flex-row">
      <div class="mt-3">
        <ul
          class="d-md-flex justify-content-center align-items-center flex-column">
          <li>
            <h3><b>Ayuda</b></h3>
          </li>
          <li><a href="../faq.php">Politicas de Reembolso</a></li>
          <li><a href="../tyc.php">Terminos y condiciones</a></li>
          <li><a href="../faq.php">Formas de envio</a></li>
          <li><a href="../faq.php">Medios de pago</a></li>
        </ul>
      </div>
      <div class="text-end mt-3 me-4">
        <ul
          class="d-md-flex justify-content-center align-items-center flex-column">
          <li>
            <h3><b>Contacto</b></h3>
          </li>
          <li>
            <img src="../imgs/footer/llamar.png" alt="telefono.png" />+54 9 11
            5016-1658
          </li>
          <li>
            <img
              src="../imgs/footer/correo.png"
              alt="correo.png" />info@horizon.com
          </li>
          <li>
            <img
              src="../imgs/footer/pasador-de-ubicacion.png"
              alt="ubicacion.png" />Av. Hipolito Yrigoyen 799 (1878)
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <script src="../script.js"></script>
</body>

</html>