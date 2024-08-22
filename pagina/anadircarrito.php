<?php
session_start();
if (!isset($_SESSION['nombre']) && !isset($_SESSION['id_usuario'])) {
    header("Location: session/inicio_sesion.html");
} elseif (isset($_SESSION['permisos'])) {   
    if ($_SESSION['permisos'] === "admin") {
        header("Location: index.php");
    }
}

// Obtener los parámetros de la URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$precio = isset($_GET['precio']) ? floatval($_GET['precio']) : 0.0;
$cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 1;

if ($action === 'add' && $id > 0) {
    // Inicializar la variable de sesión del carrito si no existe
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Verificar si el producto ya está en el carrito

    //False funcionara como variable para guardar el dato si se encontro el producto

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {

    	    //Aca se verifica la id del producto actual con todas las del carrito
        if ($item['id'] == $id) {//De encontrarse una id con el mismo valor en el carrito, se incrementa su cantidad en el carrito
            $item['cantidad'] += $cantidad;
            $found = true;
            break; //este break es para salir de la estructura y deje de buscar en el carrito poruqe ya encontro la id
        }
    }
    
    // Si el producto no está en el carrito, añadirlo
    if (!$found) {
        $_SESSION['cart'][] = array('id' => $id, 'nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad);
    }

    // Establecer mensaje de confirmación en la sesión
    $_SESSION['message'] = array('text' => "¡Se ha añadido al carrito!", 'id' => $id);
}

// verifica si existe la variable buscar
if (isset($_GET['buscar'])) {
    // Si existe redirige a la pagina de busqueda
    $buscar = urlencode($_GET['buscar']);
    header("Location: busqueda.php?buscar=$buscar");
    exit;
} elseif (isset($_GET['filtro'])) {
    // Si no existe redirige a la pagina de tienda
    $filtro = urlencode($_GET['filtro']);
    header("Location: tienda_busqueda.php?filtro=$filtro");
    exit;
}

?>