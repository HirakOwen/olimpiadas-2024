<?php
session_start();
// Verificar si la sesión del usuario está activa
if (!isset($_SESSION['id_usuario'])) {
    // Si no está definida, redirigir a la página de inicio de sesión
    $_SESSION['desdecarrito'] = true;
    header("Location: session/inicio_sesion.html");
    exit;
}

include ('conexion.php');

$id_usuario = $_SESSION['id_usuario'];
$total = $_SESSION['total'];

// Verifica si el usuario tiene cargado el domicilio, dni, telefono, codigo postal y nombre en la base de datos
$sql_verify = "SELECT domicilio, codigo_postal, recibe, telefono, DNI FROM `usuarios` WHERE id_usuario = '$id_usuario'";
$resultado_verify = $conn->query($sql_verify);
// Verifica si el usuario tiene cargado el domicilio y los demas datos en la db
if ($resultado_verify->num_rows == 0) {
    // Si no tiene cargados los datos lo reedirige a la pagina de perfil
    header("Location: subpag_users/perfil.php?completar=completar_datos");
    exit;
} elseif ($resultado_verify->num_rows == 1) {
    // Si tiene cargados los datos verifica que esten todos en la db
    while ($fila = $resultado_verify->fetch_assoc()) {
        // Si alguno de los datos falta, redirige a perfil.php para agregarlos
        if (empty($fila['domicilio'])) {
            header("Location: subpag_users/perfil.php?completar=completar_datos");
            exit;
        }
        if (empty($fila['codigo_postal'])) {
            header("Location: subpag_users/perfil.php?completar=completar_datos");
            exit;
        }
        if (empty($fila['recibe'])) {
            header("Location: subpag_users/perfil.php?completar=completar_datos");
            exit;
        }
        if (empty($fila['telefono'])) {
            header("Location: subpag_users/perfil.php?completar=completar_datos");
            exit;
        }
        if (empty($fila['DNI'])) {
            header("Location: subpag_users/perfil.php?completar=completar_datos");
            exit;
        }
    }
}

// Generar un ID aleatorio de 11 dígitos 1410065408
$id_pedido = mt_rand(100000000, 999999999);

// Insertar datos en la tabla "pedidos"
$sql = "INSERT INTO pedidos (id_pedido, id_usuario, total, estado, pago, fecha) 
        VALUES ($id_pedido, $id_usuario, $total, 'Pendiente', 'No', NOW())";
if ($conn->query($sql) === TRUE) {
    // Obtener el ID del pedido recién insertado
    // En este caso, ya tenemos $id_pedido directamente
} else {
    echo "Error al insertar pedido: " . $conn->error;
}

// Insertar los productos en la tabla 'detalles_pedido'
foreach ($_SESSION['cart'] as $item) {
    $id_producto = $item['id'];
    $cantidad = $item['cantidad'];

    $sql = "INSERT INTO detalles_pedido (id_pedido, id_productos, cantidad) 
            VALUES ($id_pedido, $id_producto, $cantidad)";
    if ($conn->query($sql) === TRUE) {
        // La inserción fue exitosa
        $_SESSION['pedidoenviado'] = "Pedido Enviado Con Éxito";
    } else {
        echo "Error al insertar detalle del pedido: " . $conn->error;
    }
}

// Limpiar el carrito y establecer mensaje de éxito
unset($_SESSION['cart']);
unset($_SESSION['total']);

header('location:carrito.php')
?>
