<?php 
require 'header.php';

$post_por_pagina = 4;
$pagina_actual = (isset($_GET['p'])) ? (int)$_GET['p'] : 1;

$inicio = ($pagina_actual > 1) ? $pagina_actual * $post_por_pagina - 
$post_por_pagina : 0;

$statement = $conexion->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM blog');
$statement->execute();/*
$statement->fetchAll();*/

$statement2 = $conexion->prepare('SELECT FOUND_ROWS() as total');
$statement2->execute();
$total_post = $statement2->fetch()['total'];

$numero_paginas = ceil($total_post / $post_por_pagina);

if ($pagina_actual > $numero_paginas) {
	header ('Location: blog.php');
}

$statement3 = $conexion->prepare("SELECT * FROM blog LIMIT $inicio, $post_por_pagina");
$statement3->execute();
$posts = $statement3->fetchAll();


require 'bloghtml.php';
require 'footer.php';
?>