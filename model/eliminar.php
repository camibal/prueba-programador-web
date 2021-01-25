<?php  
	include './conexion.php';
	$sentencia = $bd->prepare("DELETE FROM autos");
	$resultado = $sentencia->execute([]);

	if ($resultado === TRUE) {
		header('Location: ../index.php');
	}else{
		echo "Error";
	}
