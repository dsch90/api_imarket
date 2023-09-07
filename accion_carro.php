<?php
// Conexión a la base de datos
require_once('db_config.php');
session_start();

$producto_id = $_GET["id"];
$accion = $_GET["accion"];

if($accion == 1){
$sql = "UPDATE carrito SET cantidad = cantidad + 1 WHERE producto_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $producto_id); // "i" indica que $producto_id es un entero
$stmt->execute();
header("Location: carro.php");
exit();
}elseif($accion == 2){
	$sql = "UPDATE carrito SET cantidad = cantidad - 1 WHERE producto_id = ?";	
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $producto_id); // "i" indica que $producto_id es un entero
	$stmt->execute();
	header("Location: carro.php");
	exit();
}elseif($accion == 3){	
	$sql = "DELETE FROM carrito WHERE producto_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $producto_id); // "i" indica que $producto_id es un entero
	$stmt->execute();
	header("Location: carro.php");
	exit();
}

  
?>