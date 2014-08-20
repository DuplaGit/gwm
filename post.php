	<?php 
	    
	$p = $pId;  
	$content_post = $my_posts[0];
	// $content = $content_post->post_content;
		$content = qtrans_use($lang, $content_post->post_content,false); 
		$title = qtrans_use($lang, $content_post->post_title,false); 
	preg_match('/\[gallery(.*)ids="([^_]+)"\]/', $content, $galeria);
	?>
	<div class="slider_artistas">
		<div class="slides"> 
		<?php       
	if ($galeria) {
		$fotos_gal = explode(",",$galeria[2]);
		foreach ($fotos_gal as $foto) {
			$link = wp_get_attachment_image_src($foto, 'large');
			$meta = get_post_meta($foto, '_wp_attachment_image_alt', true);
			echo '<div class="slide"><img class="imgs" src="'.$link[0].'" />
			<div class="pie_foto">';
			// print($meta);
			echo '</div></div>';
		}
	}
	
	?>
		    
		    
		</div>
		
	<div class="puntos">
	   <ul>
		<?php       
		if ($galeria) {
			$i = 1;
			foreach ($fotos_gal as $foto) {
				echo '<li>'.$i.'</li>';
				$i++;
			}
		} ?>
		</ul>
	</div>
	</div>
		
		<?php 
		
		
// 	      $taxs = get_the_terms($p, 'artistas');
// //	      print_r($taxs);
// 	      foreach ($taxs as $tax) {
// 	      	$nombre = $tax->name;
// 	      	$the_slug = $tax->slug;
// 	      }	
	      
// 	      if($the_slug) {
// 		       $args=array(
// 				  'name' => $the_slug,
// 				  'post_type' => 'post',
// 				  'post_status' => 'publish',
// 				  'posts_per_page' => 1
// 				);
// 				$my_posts = get_posts($args);
// 				if( $my_posts ) {
// 				// echo '<a href="?p='.$my_posts[0]->ID.$idioma.'">'.$nombre.'</a>';
// 				} else {
// 					echo $nombre;
// 				}
// 	      }
	      
	
//	$content = preg_replace('/<\/h1>/', '</h1></div><div class="texto">', $content);
//	$content = preg_replace('/<h1>/', '</div><div class="titulo"><h1>', $content);

	$content = preg_replace('/\[([^_]+)\]/', '', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
   // $content = preg_replace('/<h2>/', '<!--bloque--><h2>', $content);	

	
	  // echo $content;
	
	$bloques = explode('<!--more-->', $content);
//	array_filter($bloques);
	// print_r($bloques);
	// print_r( $route_info ) ;
		?>

		<div class="bloque1">
			<h2> <?php echo $title; ?></h2> <?php echo  strip_tags($bloques[2], '<p><a><h1><h2><h3><h6><br>'); ?> 
			<div class="link_mapa"><a href="<?php echo '#!/seccion/mapa/'.$content_post->post_name;?>"><?php if($lengua == "en") { echo '[see in map]'; } else { echo '[ver en mapa]'; }?></a></div>
		</div>
		<div class="bloque2">
		<?php echo strip_tags($bloques[0], '<p><a><h1><h2><h3><h6><br>'); ?>
		 <?php echo  strip_tags($bloques[1], '<p><a><h1><h2><h3><h6><br>'); ?>
		</div>
		<div class="clear"></div>

