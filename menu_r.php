<?php 
$p = $_GET['p'];

$arr = $_GET;
sort($arr);
//print_r($arr);
 
if ($_GET['artistas']) {
	$p = 'artistas';
}

$curr_cat = get_category($arr[0]);
if ($curr_cat->parent == 0) {
	$the_cat = $arr[0];
} else {
	$the_cat = $curr_cat->parent;
}
		$menu = wp_get_nav_menu_items('menu');
//		echo '<pre>';
//		print_r($menu);

?>

<div class="menu_responsivo">
	<div class="wrapper_r">
			
	<ul class="links">
	
	
				<form  class="busqueda" action="<?php bloginfo('url')?>">
						<input type="text" value="" name="s" id="s">
						<?php 
						
						
							if ($lengua == 'en') {
								echo '<input type="hidden" value="en" name="lang" id="lang">';
							}
						
						?>
				        <input type="submit" class="lupa_r" value=" " width="15" height="15">
				</form>
			
	
			<a href="<?php bloginfo('url') ?>" <?php if(is_home()) echo 'class="activo_r"' ?>>
		<li> <?php if($lengua == "en") { echo 'HOME'; } else { echo 'INICIO'; } ?></li>
	</a>
		  <?php 
			
		
		foreach ($menu as $link) {
			
			echo '<a href="'.$link->url.$idioma.'" ';
			if ($the_cat == $link->object_id) echo 'class="activo_r"';
			echo '><li>'.$link->title.'</li></a>';
			
//s			echo $link->object_id;
		}
            ?>
		
		</ul>
		
		<ul class="redes_responsivo">
		
			<a href="https://twitter.com/GalleryWeekendM/" target="_blank"><li class="tw"></li></a>
			<a href="https://www.facebook.com/pages/Gallery-Weekend-Mexico/197607767068660?fref=ts" target="_blank"><li class="fb"></li></a>
			<a href="https://plus.google.com/101902969416562236336" target="_blank"><li class="g"></li></a>
			<a href="mailto:organizacion@galleryweekendmexico.com"><li class="mail"></li></a
		></ul>
	</div>	
</div>
