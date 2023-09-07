<?php
session_start();

// Establecer la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST["producto_id"];
    $nueva_cantidad = $_POST["cantidad"];

    // Obtener el precio unitario del producto
    $consulta_precio = "SELECT precio FROM productos WHERE id = ?";
    $stmt = $conn->prepare($consulta_precio);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $precio_unitario = $row["precio"];

    // Actualizar la cantidad y el precio total en la base de datos
    $actualizacion = "UPDATE carrito SET cantidad = ?, precio_total = ? WHERE usuario_id = ? AND producto_id = ?";
    $stmt = $conn->prepare($actualizacion);
    $stmt->bind_param("idii", $nueva_cantidad, $precio_unitario * $nueva_cantidad, $_SESSION["usuario_id"], $producto_id);
    $stmt->execute();

    echo "Actualización exitosa";
}
?>
