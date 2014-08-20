<?php
define('WP_USE_THEMES', false);
require('../../../wp-load.php');
// print_r($_POST);

$sec_hash = $_POST['sec_hash'];
$post_hash = $_POST['post_hash'];
$lang =  $_POST['lang'];
// echo $url;
//$urlCat = explode('/seccion/', $url);
//print_r($urlCat);

// print_r($urlPost);
if($sec_hash == 'seccion') {
	// $catSlug = trim($urlPost[2], '/');
//	echo $catSlug;
	$catArr = get_category_by_slug($post_hash);
//	print_r($catArr);
	$cat = $catArr->term_id;
	// if ($urlPost[3]) $galSlug = trim($urlPost[3], '/');
	
//	echo $galSlug;
	
//	$galSlug = $gal;
	

} else if($sec_hash != '' && !$_GET['s']) {
	
	// $postSlug = trim($url, '/');
	
	$args=array(
		'name' => $sec_hash,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 1
	);
	$my_posts = get_posts( $args );
	
	// print_r($my_posts);
	 if(!$my_posts) {
	 	
	 	$my_posts[0] = get_page_by_path($sec_hash);
	 	$pType = 'page';
	 }
	 
	
	
	$pId = $my_posts[0]->ID;
	$post_type = get_post_type($pId);
	
//	echo $postSlug;
	
}
$lengua = $lang;
//get_header('qtrans_header');

?>
<!--</div>-->