<?php
include 'menu.php';
// Conexión a la base de datos
require_once('db_config.php');

// Obtener el ID del producto a editar


/// Procesar eliminación si se recibe un ID de producto
    if (isset($_GET['id'])) {
        $id_producto = $_GET['id'];
        $sql_eliminar = "DELETE FROM producto WHERE idproducto = $id_producto";

        if ($conn->query($sql_eliminar) === TRUE) {
            $mensaje = "Producto eliminado correctamente.";
            header("Location: productos_abm.php").urlencode($mensaje);
        } else {
            $mensaje ="Error al eliminar el producto";
            header("Location: productos_abm.php").urlencode($mensaje);
        }
}
include 'footer.php'; 
?>

