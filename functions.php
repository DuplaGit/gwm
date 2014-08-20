<?php

/** Tell WordPress to dupla_setup mmx_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'dupla_setup' );

if ( ! function_exists( 'dupla_setup' ) ):
/**
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */
function dupla_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	
	add_theme_support( 'menus' );
  
}
endif;

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'normal-thumb', 9999, 215); 
	add_image_size( 'aside-thumb', 9999, 430 );
}

function get_excerpt($count){
  $excerpt = get_the_content('');
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = apply_filters('the_content', $excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$len = strlen($excerpt);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	if ($len < $count) {
		$excerpt = $excerpt;
	} else {
		$excerpt = $excerpt.'...';
	}
  return $excerpt;
}


function get_excerpt_h1(){
	global $post;
    $content = $post->post_content;//get_the_content();

 
	 $content = preg_replace('/\[([^_]+)\]/', '', $content);
	 $content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	$content = preg_replace('/<a/', '<!--bloque--><a', $content);	

	$bloques = explode('<!--more-->', $content);
	
	
	// $bloques[1] = trim(preg_replace( '/\s+/', ' ', $bloques[1]));
	$trimed_content =  substr($bloques[1], 0, strpos($bloques[1], '</a>'));
	
  return $content;
}




add_action( 'init', 'build_taxonomies', 0 );

function args($label) {
	return array( 'hierarchical' => false, 'label' => $label, 'query_var' => 'custom_tag', 'rewrite' => true );
    
}

function build_taxonomies() {

	register_taxonomy( 
    	'artistas', 
    	'post', 
    	args('Artistas'));
    register_taxonomy( 
    	'latlong', 
    	'post', 
    	args('Lat, Long'));
    
}


function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_category_base( 'seccion/' );
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

//remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );
global $route_info ;
$route_info = array();
function kml_func( $atts ) {
	
	$ruta = $atts['ruta'];
	$parks = $atts['e'];

	$ruta = str_replace('&amp;', '&', $ruta);
	$parks = str_replace('&amp;', '&', $parks);
     // $route_info[] = $ruta;
     // $route_info[] = $parks;
     // print_r( $route_info );
     $ruta_code = '<script type="text/javascript">
	ctaLayer = new google.maps.KmlLayer({
	    url: "https://mapsengine.google.com/map/kml?mid='.$ruta.'"
	  });

	estaLayer = new google.maps.KmlLayer({
	    url: "https://mapsengine.google.com/map/kml?mid='.$parks.'"
	  });
	
	</script>';
	return $ruta_code;
}
add_shortcode('kml', 'kml_func');
