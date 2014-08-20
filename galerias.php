
	<div class="content margen galerias">
	
	<?php 
	
	query_posts("posts_per_page=-1");
	
	while ( have_posts() ) : the_post();
	echo '<a href="?p=';
	the_ID();
	echo '">';
	the_title();
	echo '</a>';
	endwhile;
	
	wp_reset_query()
	
	?>
	
<!--		<a href="#">Altiplano</a> / <a href="#">Arroniz Arte Contemporáneo</a> / -->
<!--		<a href="#">EDS Galería</a> / <a href="#">Galeria de Arte Mexicano</a> /-->
<!--		<a href="#">Galería Hilario Galguera</a> / <a href="#">Galería Oscar Román</a> /-->
<!--		<a href="#">Kurimanzutto</a> / <a href="#">Labor</a> /-->
<!--		<a href="#">Le laboratoire</a> / <a href="#">Luis Adelantado México</a> /-->
<!--		<a href="#">Nina Menocal</a> / <a href="#">OMR</a> / -->
<!--		<a href="#">Patricia Conde Galería</a> / <a href="#">Proyecto Paralelo</a> /-->
<!--		<a href="#">Proyectos Monclova</a> / <a href="#">TalCual</a> /-->
	</div>