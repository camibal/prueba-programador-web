<?php
include './conexion.php';

$marca = $_POST['marca'];
$color = $_POST['color'];
$precio = $_POST['precio'];
$anio = $_POST['anio'];

$sentencia = $bd->prepare("INSERT INTO autos(marca,color,precio,anio) VALUES (?,?,?,?);");
$resultado = $sentencia->execute([$marca, $color, $precio, $anio]);

if ($resultado === true) {
	header('Location: ../index.php');
} else {
	echo "Error";
}
