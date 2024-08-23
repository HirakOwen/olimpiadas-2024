<?php
session_start();
if ($_SESSION['permisos'] != "admin") {
  header("Location: ../../../index.php");
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
    crossorigin="anonymous" />
  <!-- Horizon font -->
  <link href="https://fonts.cdnfonts.com/css/horizon" rel="stylesheet" />
  <!-- Codec Pro font-->
  <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet" />
  <!-- CSS Links-->
  <link rel="stylesheet" href="../admin.css" />
  <link rel="stylesheet" href="editar.css">
  <title>Agregar producto</title>
</head>

<body class="d-flex justify-content-center align-items-center flex-column h-100 w-100">

  <?php
  include("../../conexion.php");
  $id = $_GET['id'];
  $sql = "SELECT * FROM `productos` WHERE id_productos = $id";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {

      $producto = $row['nombre_producto'];
      $precio = $row['precio'];
      $descripcion = $row['descripcion'];
      $categoria = $row['categoria'];
    }
  }
  ?>

  <form action="realizar_cambio.php?id=<?php echo $id; ?>" method="POST" class="d-flex justify-content-center align-items-center flex-column p-4 bg-dark gap-3">
    <h3 class="text-white">Actualizar producto</h3>
    <input type="text" name="producto" id="producto" placeholder="Nombre del producto..." value="<?php echo $producto ?>" required>
    <input type="number" name="precio" id="precio" placeholder="Precio del producto..." value="<?php echo $precio ?>" required>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripcion..." required><?php echo $descripcion ?></textarea>
    <select name="categoria" required>
      <option value="Ropa Deportiva" <?php echo ($categoria === 'Ropa Deportiva') ? 'selected' : ''; ?>>Ropa Deportiva</option>
      <option value="Calzado Deportivo" <?php echo ($categoria === 'Calzado Deportivo') ? 'selected' : ''; ?>>Calzado Deportivo</option>
      <option value="Equipamiento Deportivo" <?php echo ($categoria === 'Equipamiento Deportivo') ? 'selected' : ''; ?>>Equipamiento Deportivo</option>
      <option value="Nutricion y Suplementos" <?php echo ($categoria === 'Nutricion y Suplementos') ? 'selected' : ''; ?>>Nutricion y Suplementos</option>
      <option value="Fitness y entrenamiento" <?php echo ($categoria === 'Fitness y entrenamiento') ? 'selected' : ''; ?>>Fitness y entrenamiento</option>
    </select>
    <button class="btn btn-primary">Actualizar</button>
  </form>



</body>

</html>