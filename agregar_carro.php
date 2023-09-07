<?php
// Conexión a la base de datos
require_once('db_config.php');
session_start();
// Obtener el ID del producto a editar
$producto_id = $_GET["id"];
// Establecer la conexión a la base de datos
$usuario_id = $_SESSION["usuario_id"]; // Obtener el ID del usuario actual desde la sesión
$cantidad = 1; // Puedes permitir que el usuario elija la cantidad en la página de listado
    
    // Verificar si el producto ya está en el carrito del usuario
    $consulta = "SELECT * FROM carrito WHERE usuario_id = ? AND producto_id = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("ii", $usuario_id, $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Agregar el producto al carrito si no existe
        $insercion = "INSERT INTO carrito (usuario_id, producto_id, cantidad) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insercion);
        $stmt->bind_param("iii", $usuario_id, $producto_id, $cantidad);
        $stmt->execute();
        // Redirigir de vuelta a la página de productos
        header("Location: productos.php");
        exit();
    } else {
        $sql = "UPDATE carrito SET cantidad = cantidad + 1 WHERE producto_id = ?";  
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $producto_id); // "i" indica que $producto_id es un entero
        $stmt->execute();
        header("Location: productos.php");
        exit();
    }

?>
