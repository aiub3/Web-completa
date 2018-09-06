<?php 
require 'header.php';

$error = false;
$enviado = false;
if (isset($_POST['enviar_contacto'])) {
	$nombre = limpiardatos($_POST['nombre']);
	$email = limpiardatos($_POST['email']);
	$mensaje = limpiardatos($_POST['mensaje']);
	if (empty($nombre) or empty($email) or empty($mensaje)) {
		$error = true;
	} else {
		$statement = $conexion->prepare('INSERT INTO mensajes (ID, nombre, email, 
		mensaje) VALUES (null, :nombre, :email, :mensaje)');
		$statement->execute(array(':nombre' => $nombre, ':email' => $email,
		':mensaje' => $mensaje));
		$enviado = true;
	}
}




require 'contactohtml.php';
require 'footer.php';
?>