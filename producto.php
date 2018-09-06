<?php 
require 'header.php';

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;

$statement = $conexion->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM prductos');
$statement->execute();
$resultado = $statement->fetchAll();

$statement2 = $conexion->prepare('SELECT FOUND_ROWS() as total');
$statement2->execute();
$total_productos = $statement2->fetch()['total'];

$statement3 = $conexion->prepare('SELECT * FROM productos WHERE ID = :id');
$statement3->execute(array(':id' => $id));
$producto = $statement3->fetch();


require 'productohtml.php';
require 'footer.php';
?>