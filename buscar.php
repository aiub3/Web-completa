<?php 
require 'header.php';

if (isset($_POST['enviar_buscar'])) {
	$busqueda = $_POST['buscar'];
	$statement = $conexion->prepare('SELECT * FROM blog WHERE titulo LIKE 
	:busqueda or extracto LIKE :busqueda or texto LIKE :busqueda');
	$statement->execute(array(':busqueda'=>"%$busqueda%"));
	$articulos_encontrados = $statement->fetchAll();
	$statement2 = $conexion->prepare('SELECT * FROM productos WHERE titulo LIKE 
	:busqueda or resumen LIKE :busqueda or descripcion LIKE :busqueda');
	$statement2->execute(array(':busqueda'=>"%$busqueda%"));
	$productos_encontrados = $statement2->fetchAll();
}

require 'buscarhtml.php';
require 'footer.php';
?>