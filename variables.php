<?php
$c_url = 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
$url =  str_replace(get_bloginfo('url'), '', $c_url);
//echo $url;
//$urlCat = explode('/seccion/', $url);
//print_r($urlCat);
$urlPost = explode('/', $url);
$urlPost = array_filter($urlPost);
 // print_r($urlPost);
if($urlPost[1] == 'seccion') {
	$catSlug = trim($urlPost[2], '/');
//	echo $catSlug;
	$catArr = get_category_by_slug($catSlug);
//	print_r($catArr);
	$cat = $catArr->term_id;
	if ($urlPost[3]) $galSlug = trim($urlPost[3], '/');
	
//	echo $galSlug;
	
//	$galSlug = $gal;
	

} else if($url != '/') {
	
	$postSlug = trim($url, '/');

	$args=array(
		'name' => $postSlug,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 1
	);
	$my_posts = get_posts( $args );
	
	
	 if(!$my_posts) {
	 	
	 	$my_posts[0] = get_page_by_path($postSlug);
	 	$pType = 'page';
	 }
	 
	
	
	$pId = $my_posts[0]->ID;
	$post_type = get_post_type($pId);
	
//	echo $postSlug;
	
}
$lengua = qtrans_getLanguage();
//get_header('qtrans_header');

?>