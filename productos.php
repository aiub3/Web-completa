<?php 
require 'header.php';

$productos_por_pagina = 4;
$pagina_actual = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;

$inicio = ($pagina_actual > 1) ? $pagina_actual * $productos_por_pagina - 
$productos_por_pagina : 0;

$statement = $conexion->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM productos');
$statement->execute();/*
$statement->fetchAll();*/

$statement2 = $conexion->prepare('SELECT FOUND_ROWS() as total');
$statement2->execute();
$total_productos = $statement2->fetch()['total'];

$numero_paginas = ceil($total_productos / $productos_por_pagina);

if ($pagina_actual > $numero_paginas) {
	header ('Location: blog.php');
}

$statement3 = $conexion->prepare("SELECT * FROM productos LIMIT $inicio, 
$productos_por_pagina");
$statement3->execute();
$productos = $statement3->fetchAll();


require 'productoshtml.php';
require 'footer.php';
?>