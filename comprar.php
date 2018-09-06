<?php 
require 'header.php';

if (isset($_POST['comprar'])) {
	$id = $_POST['id'];
	$statement = $conexion->prepare('SELECT * FROM productos WHERE ID = :id');
	$statement->execute(array(':id' => $id));
	$producto = $statement->fetch();
} else {
	header ('Location: productos.php');
}
$error = false;
if (isset($_POST['confirmar_compra'])) {
		$nombre = limpiardatos($_POST['nombre']);
		$apellidos = limpiardatos($_POST['apellidos']);
		$direccion = limpiardatos($_POST['direccion']);
		$precio = $_POST['precio'];
		$forma_pago = $_POST['forma_pago'];
		if ($forma_pago == 'paypal') {
			$cuenta_paypal = $_POST['cuenta_paypal'];
			$numero_tarjeta = '';
			$cuenta_bancaria = '';
			if (empty($cuenta_paypal)) {
				$error = true;
			}
		} else if ($forma_pago == 'tarjeta_credito') {
			$cuenta_paypal = '';
			$numero_tarjeta = $_POST['numero_tarjeta'];
			$cuenta_bancaria = '';
			if (empty($numero_tarjeta)) {
				$error = true;
			}
		} else if ($forma_pago == 'transferencia_bancaria') {
			$cuenta_paypal = '';
			$numero_tarjeta = '';
			$cuenta_bancaria = $_POST['cuenta_bancaria'];
			if (empty($cuenta_bancaria)) {
				$error = true;
			}
		}
		if (empty($nombre) or empty($apellidos) or empty($direccion)) {
			$error = true;
		}
		if ($error === false) {
		$statement = $conexion->prepare('INSERT INTO compras (ID, nombre, apellidos,
		direccion, forma_pago, cuenta_paypal, numero_tarjeta, cuenta_bancaria, precio) 
		VALUES (null, :nombre, :apellidos, :direccion, :forma_pago, :cuenta_paypal, 
		:numero_tarjeta, :cuenta_bancaria, :precio)');
		$statement->execute(array(':nombre' => $nombre, ':apellidos' => $apellidos, 
		':direccion' => $direccion, ':forma_pago' => $forma_pago, ':cuenta_paypal' => 
		$cuenta_paypal, ':numero_tarjeta' => $numero_tarjeta, ':cuenta_bancaria' => 
		$cuenta_bancaria, ':precio' => $precio));
		echo $nombre . $apellidos . $direccion . $forma_pago . $cuenta_paypal 
		. $numero_tarjeta . $cuenta_bancaria;
		} 
		header ('Location: comprar.php');
	}










require 'comprarhtml.php';
require 'footer.php';
?>