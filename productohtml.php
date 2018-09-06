<section class="contenedor">
<section class="producto">
<h2><?php echo $producto['titulo']; ?></h2>
<img alt="Imagen del producto" src="imagenes/<?php echo $producto['imagen']; ?>" />
<p>Precio: <?php echo $producto['precio']; ?>€.</p>
<p>Descripcion: <br/><?php echo $producto['descripcion']; ?></p>
<form action="comprar.php" method="post" >
	<input type="hidden" name="id" value="<?php echo $producto['ID']; ?>" />
	<input type="submit" class="comprar" name="comprar" value="Comprar" />
</form>
</section>
</section>