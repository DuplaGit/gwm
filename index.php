<?php 
$seconds_to_cache = 30000;
$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
include 'access_control.php';
// header("Expires: $ts");
// header("Pragma: cache");
// header("Cache-Control: max-age=$seconds_to_cache");

// session_start();
// if ((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false)) {
// //	movil
// 	if((strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') != false)) {
// 		//  not inApp
// 		if($_GET['navegar']) $_SESSION['navegar'] = $_GET['navegar'];
// 		$navegar = $_SESSION['navegar'];
// 		if ($navegar == false) {
// 			header('Location: movil.php');
// 		}
// 	}
// }

include 'variables.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<html lang="es">
<link rel="icon" href="http://www.galleryweekendmexico.com/2014/wp-content/themes/gallery/images/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
<meta name="description" content="Gallery Weekend México es el fin de semana dedicado al arte contemporáneo. Un programa que se realiza anualmente, durante la última semana de septiembre, con el objetivo de reunir a la comunidad artística y al creciente número de seguidores del arte más reciente. " />
<meta name="keywords" content="arte, weekend, gallery, contemporáneo, contemporary, art, kurimanzutto, omr, galería, condesa, roma, san miguel chapultepec, codigo, revista" />
<title>Gallery Weekend México</title>
<link href="<?php bloginfo('stylesheet_url')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
var themeurl, lang;
themeurl = '<?php echo get_stylesheet_directory_uri(); ?>';	
lang = '<?php echo qtrans_getLanguage(); ?>';
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/code.js"></script>
<!--Análisis de GWM-->
<script>
  var _gaq = _gaq || [];
	
  _gaq.push(['_setAccount', 'UA-42939259-1']);
  // _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageview', location.pathname + location.search + location.hash]);


  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!--Análisis de editorial código-->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-20733255-1']);
//_gaq.push(['_trackPageview']);
 _gaq.push(['_trackPageview', location.pathname + location.search + location.hash]);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</head>
<body>
<!-- <div class="overlay"><img src="http://www.galleryweekendmexico.com/2014/wp-content/themes/gallery/images/ruta.jpg" /></div> -->
<?php


// include'menu_r.php'; ?>
<?php include 'menu.php';?>
<div class="wrapper"> 
	<!-- RESPONSIVE -->
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
	<div id="wait"><img src="<?php echo  bloginfo('template_url'); ?>/images/ajax-loader.gif"></div>
	<div class="contenido">
		<?php 


if (qtrans_getLanguage() == 'en') {
	$idioma = '/en';
} else {
	$idioma = '';
}


if ($post_type == 'post' && !$navegar && !is_home() && !$_GET['s']) {
	include 'post.php';
	 // echo "post";
} else if ($cat) {
	include 'cat.php';
	 // echo "cat";
} else if ($post_type == 'page') {
	
//	$pagina = 'artista' .$_GET['artistas'] . '.php';
//	$pagina = 'artista.php';
	include 'pags.php';
	 // echo "page";
} else if ($_GET['s']) {
	include 'busq.php';
} else {

	$pag = get_page_by_path('inicio');
	$content = qtrans_use(qtrans_getLanguage(), $pag->post_content,false);
	// $content = $pag->post_content;
	$content = preg_replace( '/(width|height)="\d*"\s/', "", $content );
	$content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
	echo '<div class="home">'.$content.' </div>';
	// echo "default";
}

?>
	</div>
	<div class="clear"></div>
	
	<a href="http://fonca.conaculta.gob.mx/" target="_blank"><div class="responsivo logo-fonca"></div></a>
	<a href="http://revistacodigo.com/" target="_blank">
	<div class="responsivo logo_codigo"></div>
	</a>
	
	<div class="clear"></div>
</div>
<div class="clear"></div>
<!-- FOOTER -->
<div class="footer">
	<div class="footer_interior"> <a href="http://revistacodigo.com/" target="_blank">
		<div class="logo_codigo"></div>
		</a>
		<div class="logo-fonca"><a href="http://fonca.conaculta.gob.mx/" target="_blank"></a></div>
		<ul class="menu_ul">
			<li class="redes_li"><a class="tw" href="https://twitter.com/GalleryWeekendM/" target="_blank"></a></li>
			<li class="redes_li"><a class="fb" href="https://www.facebook.com/pages/Gallery-Weekend-Mexico/197607767068660?fref=ts" target="_blank"></a></li>
			<li class="redes_li"><a class="g_plus" href="http://instagram.com/galleryweekendm" target="_blank"></a></li>
			<li class="redes_li"><a class="mail" href="mailto:organizacion@galleryweekendmexico.com"></a></li>
		</ul>
		<div class= newletter>
			<form method="post" action="<?php echo plugins_url()?>/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
				<?php if($lengua == "en") {?>
				<span>Suscribe to our newsletter</span>
				<?php } else {?>
				<span>Subscríbete al newsletter</span>
				<?php } ?>
				<input style="" placeholder="<?php if($lengua == "en") { echo 'Your email here'; } else { echo 'Tu correo electrónico'; } ?>" class="campo_2" name="ne" type="email" required>
				<input style="margin:0 0 0 1px;" class="newsletter-submit boton" type="submit" value=">>">
			</form>
			
			<!--		<input type="text" placeholder="<?php if($lengua == "en") { echo 'Your email here'; } else { echo 'Tu correo electrónico'; } ?>">--> 
			<!--		<input type="submit" value=">>">--> 
		</div>
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
</body>
</html>
