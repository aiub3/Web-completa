<?php 

try {
	$conexion = new PDO('mysql:host=localhost;dbname=practica;charset=utf8',
	'root','');
	return $conexion;
} catch (PDOException $e) {
	echo 'Error: ' . $e;
}

function limpiardatos($datos) {
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	$datos = htmlspecialchars($datos);
	$datos = strtolower($datos);
	return $datos;
}
	



?>