<section class="contenedor">
<section class="productos">

<article>
	<h3><?php echo $producto['titulo']; ?></h3>
	<img alt="Imagen del producto" src="imagenes/<?php echo $producto['imagen']; ?>" />
	<p><?php echo $producto['resumen']; ?></p>
</article>

</section>
<p class="precio" >Precio: <?php echo $producto['precio']; ?>€</p>
<form class="form_compra" action="<?php echo $_SERVER ['PHP_SELF']; ?>" method="post" >
	<input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>" />
	<label for="forma_pago">Forma de pago: </label>
	<select name="forma_pago" id="forma_pago" onchange="comprobar_forma_pago()">
		<option value="paypal">Paypal</option>
		<option value="tarjeta_credito">Tarjeta de crédito</option>
		<option value="transferencia_bancaria">Transferencia bancaria</option>
	</select>
	<label class="visible" id="cuenta_paypal_label" for="cuenta_paypal">
	Tu cuenta Paypal: </label>
	<input type="text" class="cuenta_paypal" id="cuenta_paypal" 
	name="cuenta_paypal" /> 
	<label class="numero_tarjeta" id="numero_tarjeta_label" for="numero_tarjeta">
	Tu número tarjeta: </label>
	<input type="text" class="numero_tarjeta" id="numero_tarjeta" 
	name="numero_tarjeta" /> 
	<label class="cuenta_bancaria" id="cuenta_bancaria_label" for="cuenta_bancaria">
	Tu cuenta bancaria: </label>
	<input type="text" class="cuenta_bancaria" id="cuenta_bancaria" 
	name="cuenta_bancaria" /> 
	<label class="visible" for="nombre">Tu nombre: </label>
	<input type="text" name="nombre" /> 
	<label class="visible" for="apellidos">Tus apellidos: </label>
	<input type="text" name="apellidos" /> 
	<label class="visible" for="direccion">Tu dirección: </label>
	<input type="text" name="direccion" /> 
	<?php if ($error === true): ?>
		<p class="error">Rellena todos los campos.</p>
	<?php endif; ?>
	<input type="submit" name="confirmar_compra" value="Confirmar compra" />
</form>
	<script>
		var forma_pago = document.getElementById('forma_pago');
		var cuenta_paypal_label = document.getElementById('cuenta_paypal_label');
		var cuenta_paypal = document.getElementById('cuenta_paypal');
		var numero_tarjeta_label = document.getElementById('numero_tarjeta_label');
		var numero_tarjeta = document.getElementById('numero_tarjeta');
		var cuenta_bancaria_label = document.getElementById('cuenta_bancaria_label');
		var cuenta_bancaria = document.getElementById('cuenta_bancaria');
		function comprobar_forma_pago() {
		var indice = forma_pago.selectedIndex;
		var forma_pago_seleccionada = forma_pago.options[indice].value;
			if (forma_pago_seleccionada == 'paypal') {
				cuenta_paypal_label.style.display = "block";
				cuenta_paypal.style.display = "block";
				numero_tarjeta_label.style.display = "none";
				numero_tarjeta.style.display = "none";
				cuenta_bancaria_label.style.display = "none";
				cuenta_bancaria.style.display = "none";
			} else if (forma_pago_seleccionada == 'tarjeta_credito') {
				cuenta_paypal_label.style.display = "none";
				cuenta_paypal.style.display = "none";
				numero_tarjeta_label.style.display = "block";
				numero_tarjeta.style.display = "block";
				cuenta_bancaria_label.style.display = "none";
				cuenta_bancaria.style.display = "none";
			} else if (forma_pago_seleccionada == 'transferencia_bancaria') {
				cuenta_paypal_label.style.display = "none";
				cuenta_paypal.style.display = "none";
				numero_tarjeta_label.style.display = "none";
				numero_tarjeta.style.display = "none";
				cuenta_bancaria_label.style.display = "block";
				cuenta_bancaria.style.display = "block";
			}
		}
	</script>
</section>