<section class="contenedor">
	<div class="contacto">
	<h2>Formulario de contacto.</h2>
	<p>Deja tus datos de contacto junto a tu mensaje y recibirás 
	una respuesta lo antes posible.</p>
		<form class="form_contacto" name="form_contacto" 
		action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
		<label for="nombre">Tu nombre: </label>
		<input type="text" class="nombre" name="nombre" />
		<label for="email">Tu email: </label>
		<input type="email" class="email" name="email" />
		<label for="mensaje">Tu mensaje: </label>
		<textarea name="mensaje" ></textarea>
		<?php if ($error === true): ?>
			<p class="error">Rellena todos los campos.</p>
		<?php elseif ($enviado === true): ?>
			<p class="enviado">Tu mensaje ha sido enviado correctamente.</p>
		<?php endif; ?>
		<input type="submit" class="enviar_contacto" name="enviar_contacto" 
		value="Enviar mensaje" />
		</form>
	</div>
</section>