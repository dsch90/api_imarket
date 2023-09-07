<?php
// Conexión a la base de datos
include 'menu.php';
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nueva_codigo = $_POST["nueva_codigo"];
    $nueva_descripcion = $_POST["nueva_descripcion"];
    $nueva_categoria = $_POST["nueva_categoria"];
    $nuevo_precio_venta = $_POST["nuevo_precio_venta"];
    $nuevo_estado = $_POST["nuevo_estado"];
    $nuevo_stock = $_POST["nuevo_stock"];
    $nuevo_precio_venta = $_POST["nuevo_precio_venta"];
    $nuevo_precio_sug_venta = $_POST["nuevo_precio_sug_venta"];
    $nuevo_precio_may_cant = $_POST["nuevo_precio_may_cant"];
    $nuevo_precio_desc_venta = $_POST["nuevo_precio_desc_venta"];
    $nuevo_pre_may_unidad = $_POST["nuevo_pre_may_unidad"];
    $nuevo_comentario = $_POST["nuevo_comentario"];

    $sql = "INSERT INTO producto (descripcionproducto, codigoproducto, categoriaproducto, pre_venta, pre_sug_venta, pre_desc_may, pre_may_cant, pre_may_unidad, stock, estado, fecha_ult_act, comentario) VALUES ('$nueva_descripcion','$nueva_codigo','$nueva_categoria','$nuevo_precio_venta','$nuevo_precio_sug_venta','$nuevo_precio_desc_venta','$nuevo_precio_may_cant','$nuevo_pre_may_unidad','$nuevo_stock','$nuevo_estado',now(),'$nuevo_comentario')";

    if ($conn->query($sql) === TRUE) {
        $mensaje ="Agregado exitosamente";
        header("Location: productos_abm.php").urlencode($mensaje);
    } else {
        $mensaje ="Error al agregar el producto";
        header("Location: productos_abm.php").urlencode($mensaje);
    }
}
include 'footer.php'; 
?>