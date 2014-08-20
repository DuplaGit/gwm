<!--Este archivo no funciona pero no borrar-->
<?php 
define('WP_USE_THEMES', false);
require('../../../wp-load.php');

$p = $pId;

//$arr = $_GET;
//sort($arr);
//print_r($arr);
 
//if ($_GET['artistas']) {
//	$p = 'artistas';
//}
$the_cat = $p;
$curr_cat = get_category($cat);
if ($cat) {
	if ($curr_cat->parent == 0) {
		$the_cat = $cat;
	} else {
		$the_cat = $curr_cat->parent;
	}
}
		$menu = wp_get_nav_menu_items('menu');
		// echo '<pre>';
		// print_r($menu);
		// echo $lengua;
?>
<link href="<?php bloginfo('stylesheet_url')?>" rel="stylesheet" type="text/css">
<div class="responsivo menu_responsivo">
	<ul class="responsivo redes_ul">
		<li class="idioma">
			<?php if (qtrans_getLanguage() != 'en') { ?>
					<a href="<?php echo get_bloginfo('url'); ?>/en">Eng/Esp</a>
			<?php 	} else {	?>
					<a href="<?php echo get_bloginfo('url'); ?>">Esp/Eng</a>
			<?php }	?>
		
	</ul>
	<div class="responsivo_btn"></div>
</div>
<div class="header">
	<div class="header_interior">
		<ul class="menu_ul">
			<li class="menu_li"> 
					<?php if (qtrans_getLanguage() != 'es') { ?>
						<a href="<?php echo get_bloginfo('url'); ?>/en">gwm </a>
				<?php 	} else {	?>
						<a href="<?php echo get_bloginfo('url'); ?>">gwm </a>
				<?php }	?>

				<ul class="submenu_ul">
					<li class="submenu_li"><a href="http://www.galleryweekendmexico.com/2013">2013</a></li>
				</ul>
			</li>
			<?php
			$the_url = get_bloginfo( 'url' );
			foreach ($menu as $link) {
				echo '<li class="menu_li">';

				
				// echo qtrans_getLanguage();
				if(qtrans_getLanguage() == 'es') {
					$hash_link = str_replace($the_url, "", $link->url);
				} else {
					$hash_link = str_replace($the_url, "", $link->url);
				}
			
				// if ($the_cat == $link->object_id) echo '<div class="activo"></div>'
				if($lengua == 'en'){
					echo '<a href="'.$siteurl.'/en/#!'.$hash_link.'" ';
				} else {
					echo '<a href="'.$siteurl.'/#!'.$hash_link.'" ';
				}
				
				// if ($the_cat == $link->object_id) echo 'class="activo_m"';
				echo '>'.$link->title.'</a></li>';
			}
            ?>
			<!-- <li class="menu_li"><a href="#!/info" >Info</a></li>
			<li class="menu_li"><a href="#!/galerias" >Galerias</a></li>
			<li class="menu_li"><a href="#!/artistas" >Artistas</a></li>
			<li class="menu_li"><a href="#!/mapa" >Mapa</a></li>
			<li class="menu_li"><a href="#!/platicas" >Pláticas</a></li>
			<li class="menu_li"><a href="#!/patrocinadores" >Patrocinadores</a></li> -->
		</ul>
		<ul class="redes_ul">

			<?php // qtrans_generateLanguageSelectCode('both'); ?>
				<?php if ($lengua == "en") { ?>
						<a href="<?php echo get_bloginfo('url'); ?>">	<li class="idioma en">Esp/Eng</li>	</a>
				<?php 	} else {	?>
						<a href="<?php echo get_bloginfo('url'); ?>/en/">	<li class="idioma es">Eng/Esp</li>	</a>
				<?php }	?>
					
			

			<li class="busqueda">
				<form class="busqueda" action="<?php echo get_bloginfo('url')?>">
					<input type="text" value="" name="s" id="s">
						<?php 
							if ($lengua == 'en') {
								echo '<input type="hidden" value="en" name="lang" id="lang">';
							}
						?>
					<input type="submit" class="lupa" value=" " width="15" height="15">
				</form>
			</li>
		</ul>
	</div>
</div>
<!-- RESPONSIVE -->
<div class="responsive">
	<?php // print_r($menu) ; ?>
	<ul class="menu_ul">
		<li class="menu_li">
			<form class="busqueda" action="<?php echo get_bloginfo('url'); ?>">
				<input type="text" value="" name="s" id="s">
				<input type="submit" class="lupa" value=" " width="15" height="15">
			</form>
		</li>
		<li class="menu_li"> <a href="./" class="activo_m"> gwm </a></li>
		<?php
			//echo qtrans_getLanguage() ;

				$the_url = get_bloginfo('url');

			foreach ($menu as $link) {
				echo '<li class="menu_li">';
				// if ($the_cat == $link->object_id) echo '<div class="activo"></div>';
				if(qtrans_getLanguage() == 'es') {
					$hash_link = str_replace($the_url, "", $link->url);
				} else {
					$hash_link = str_replace($the_url, "", $link->url);
				}
			
				
				echo '<a href="#!'.$hash_link.'" ';
				// if ($the_cat == $link->object_id) echo 'class="activo_m"';
				echo '>'.$link->title.'</a></li>';
			}
            ?>
	</ul>
</div>
<!-- OLD VERSION -->
