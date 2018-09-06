<section class="contenedor">
<h1>Resultados de la búsqueda:</h1>
<?php if (empty($articulos_encontrados) && empty($productos_encontrados)): ?>
	<h3 class="sin_coincidencia">
	No se han encontrado coincidencias con la búsqueda.</h3>
<?php endif; ?>
<?php if (!empty($articulos_encontrados)): ?>
<h2>Artículos:</h2>
<?php endif; ?>
<section class="articulos_encontrados">
	<?php foreach ($articulos_encontrados as $articulo_encontrado): ?>
	<article>
	<h3><?php echo $articulo_encontrado['titulo']; ?></h3>
	<p><?php echo $articulo_encontrado['extracto']; ?></p>
	<a href="articulo.php?id=<?php echo $articulo_encontrado['ID']; ?>" >
	Seguir leyendo.</a>
	</article>
	<?php endforeach; ?>
</section>
<?php if (!empty($productos_encontrados)): ?>
<h2>Productos:</h2>
<?php endif; ?>
<section class="productos_encontrados">
	<?php foreach ($productos_encontrados as $producto_encontrado): ?>
	<article>
	<h3><?php echo $producto_encontrado['titulo']; ?></h3>
	<p><?php echo $producto_encontrado['resumen']; ?></p>
	<a href="articulo.php?id=<?php echo $producto_encontrado['ID']; ?>" >
	Comprar.</a>
	</article>
	<?php endforeach; ?>
</section>
</section>