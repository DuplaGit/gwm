<?php

global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$query = new WP_Query($search_query);
$lengua = $_GET['lang'];
?>

<div class="content">



<div class="margen galerias">

<?php 
// echo qtrans_getLanguage();
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post(); ?>

			<?php if ($lengua == "en") { 
				echo '<a href="'.get_bloginfo('url').'/en/#!/'.$post->post_name.$lang.'">' . get_the_title() . '</a> / ';
					} else {	
				echo '<a href="'.get_bloginfo('url').'/#!/'.$post->post_name.$lang.'">' . get_the_title() . '</a> / ';
	
				 }	
		
		
//		echo get_permalink();
	}
} else {
	
if ($_GET['lang'] == 'en') {
		echo '<div class="contenedor vacio">no results
			</div>';
} else {
		echo '<div class="contenedor vacio">sin resultados
			</div>';
}
	
		
	// no posts found
}

?>

	
	
	
</div>
</div>
