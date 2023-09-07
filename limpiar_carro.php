<?php
require_once('db_config.php');

$sql = "DELETE FROM carrito";

if ($conn->query($sql) === TRUE) {
    echo "Tabla limpiada exitosamente.";
    header("Location: carro.php");
} else {
    echo "Error al limpiar la tabla: " . $conn->error;
    header("Location: carro.php");
}
?>