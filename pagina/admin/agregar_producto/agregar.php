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
    <link rel="stylesheet" href="../admin.css" />
    <link rel="stylesheet" href="agregar.css">
    <title>Agregar producto</title>
</head>
<body class="d-flex justify-content-center align-items-center flex-column h-100 w-100">

<form action="crear.php" method="POST" class="d-flex justify-content-center align-items-center flex-column p-4 bg-dark gap-3">
  <h3 class="text-white">Crear producto</h3>
    <input type="text" name="producto" id="producto" placeholder="Nombre del producto..." required>
    <input type="number" name="precio" id="precio" placeholder="Precio del producto..." required>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripcion..." required></textarea>
    <select name="categoria" required>
     <option value="Ropa Deportiva" selected>Ropa Deportiva</option>
     <option value="Calzado Deportivo">Calzado Deportivo</option>
     <option value="Equipamiento Deportivo">Equipamiento Deportivo</option>
     <option value="Nutricion y Suplementos">Nutricion y Suplementos</option>
     <option value="Fitness y entrenamiento">Fitness y entrenamiento</option>
    </select>
    <button class="btn btn-primary">Crear noticia</button>
</form>



</body>
</html>