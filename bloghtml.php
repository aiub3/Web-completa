<section class="contenedor">
<section class="articulos">
<?php foreach($posts as $post): ?>
<article>
<h3><?php echo $post['titulo']; ?></h3>
<p><?php echo $post['extracto']; ?>.</p>
<a href="articulo.php?id=<?php echo $post['ID']; ?>" >Seguir leyendo</a>
<hr/>
</article>
<?php endforeach; ?>
</section>
<section class="paginacion">
	<ul>
	<?php if ($pagina_actual == 1): ?>
		<li class="desactivo" ><a><<</a></li>
	<?php else: ?>
		<li class="li"><a href="blog.php?p=<?php echo $pagina_actual - 1 ?>">
		<<</a></li>
	<?php endif; ?>
		<?php for ($i = 1; $i <= $numero_paginas; $i ++): ?>
			<li class="li" ><a href="blog.php?p=<?php echo $i; ?>">
			<?php echo $i; ?></a></li>
		<?php endfor; ?>
	<?php if ($pagina_actual == $numero_paginas): ?>
		<li class="desactivo" ><a>>></a></li>
	<?php else: ?>
		<li class="li"><a href="blog.php?p=<?php echo $pagina_actual +1 ?>">
		>></a></li>
	<?php endif; ?>
	</ul>
</section>
</section>