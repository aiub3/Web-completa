<section class="contenedor">
<section class="productos">
<?php foreach ($productos as $producto): ?>
	<article>
	<h3><?php echo $producto['titulo']; ?></h3>
	<img alt="Imagen del producto" src="imagenes/<?php echo $producto['imagen']; ?>" />
	<p><?php echo $producto['resumen']; ?></p>
	<a href="producto.php?id=<?php echo $producto['ID']; ?>">Comprar</a>
	<hr/>
	</article>
<?php endforeach; ?>
</section>
<section class="paginacion">
	<ul>
		<?php if ($pagina_actual == 1): ?>
		<li class="desactivo" ><a><<</a></li>
	<?php else: ?>
		<li class="li"><a href="productos.php?p=<?php echo $pagina_actual - 1 ?>">
		<<</a></li>
	<?php endif; ?>
		<?php for ($i = 1; $i <= $numero_paginas; $i ++): ?>
			<li class="li" ><a href="productos.php?p=<?php echo $i; ?>">
			<?php echo $i; ?></a></li>
		<?php endfor; ?>
	<?php if ($pagina_actual == $numero_paginas): ?>
		<li class="desactivo" ><a>>></a></li>
	<?php else: ?>
		<li class="li"><a href="productos.php?p=<?php echo $pagina_actual +1 ?>">
		>></a></li>
	<?php endif; ?>
	</ul>
</section>
</section>