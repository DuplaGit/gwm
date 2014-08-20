<?php
	$post = $pId;
?>


	<?php if($pId == 14){ ?>
	 <div class="margen info_text"> 
	<?php
}	
	    $content_post = get_post($post);
		$content = $content_post->post_content;

	    $content = qtrans_use($lang, $content,false);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
//		$content = preg_replace( '/(width|height)="\d*"\s/', "", $content );
//		$content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
		// echo $lang;
		echo $content;
		 
		// print_r( $route_info ) ;
		?>
		<?php if($pId == 14){ ?>
	</div>	 
	<?php } ?>
