
<?php 
session_start();
if ($_SESSION['permisos'] != "admin") {
    header("Location: ../index.php");
  } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet" />
    <!-- CSS Links-->
    <link rel="stylesheet" href="admin.css" />
    <title>Pagina Administrador</title>
</head>
<body class="w-100 h-100 d-flex justify-content-center align-items-center flex-column">
    <!-- Header -->
    <header
      class="d-flex justify-content-center align-items-center flex-column w-100 bg-black p-3 flex-lg-row justify-content-lg-around"
    >
      <img src="../imgs/horizonsports.png" alt="horizonsports" />
      <form
        action="#"
        method="GET"
        class="d-flex justify-content-center align-items-center flex-row mb-2 rounded-1 w-100"
      >
        <input type="search" name="buscar" placeholder="Buscar productos..." />
        <button class="rounded-5">
          <img src="../imgs/lupa.png" alt="lupa.png" class="p-0 m-0" />
        </button>
      </form>
    </header>
    <!-- End Header-->

    <a
      href="../index.php"
      class="regresar m-3 mt-4 ps-2 gap-2 d-flex justify-content-center"
      ><img src="../imgs/flecha-reversa.png" alt="flechita" />
      <p class="p-0 m-0 mb-1">Volver al inicio</p></a
    >

    <div class="w-100 h-100 d-flex justify-content-center align-items-center flex-wrap mt-5 p-2 gap-3 div-admin">
        <a href="agregar_producto/agregar.php" class="btn btn-success">Agregar Producto</a>
        <a href="cuentas_estado/cuentas_estado.php" class="btn btn-secondary">Estados y Cuentas</a>
        <a href="pedidos_admin/pedidos_admin.php" class="btn btn-warning">Pedidos</a>
    </div>

    <div class="w-100 h-100 d-flex justify-content-center align-items-center flex-wrap p-4  mt-5 pb-5 mb-5 gap-3">
    <?php
     include("../conexion.php");
     $sql = "SELECT * FROM productos";
     $resultado = $conn->query($sql);

     if ($resultado->num_rows > 0) {
       while ($row = $resultado->fetch_assoc()) {
        $id_producto = $row['id_productos'];
        $producto = $row['nombre_producto'];
        $precio = $row['precio'];
        $descripcion = $row['descripcion'];
        $categoria = $row['categoria'];
        ?>
        <div class="d-flex justify-content-center align-items-center flex-column producto-div p-2 rounded-1">
            <div class="d-flex flex-column w-100">
                <h4>ID: <?php echo $id_producto; ?></h4>
                <h1><?php echo $producto; ?></h1>
            </div>
            <p class="w-100 text-start"><?php echo $descripcion; ?></p>
            <div class="d-flex justify-content-center align-items-center flex-row w-100">
                <h4 class="w-75"><?php echo $categoria; ?></h4>
                <h4 class="w-25 text-end"><?php echo "$" . $precio; ?></h4>
            </div>
            <div class="d-flex flex-row w-100 gap-3">
                <a href="borrar.php?id=<?php echo $id_producto; ?>" class="btn btn-danger">Borrar</a>
                <a href="editar/editar.php?id=<?php echo $id_producto; ?>" class="btn btn-success">Editar</a>
            </div>
        </div>
        <?php
       }
     } else {
      echo "No se encontraron productos.";
     }
?>
    </div>
</body>
</html>