<?php 
include 'access_control.php';
include 'variables-ajax.php';

if (qtrans_getLanguage() == 'en') {
	$idioma = '/en';
} else {
	$idioma = '';
}


if ($post_type == 'post' && !$navegar) {
	include 'post.php';
	
} else if ($cat) {
	include 'cat.php';
	
} else if ($post_type == 'page') {
	
//	$pagina = 'artista' .$_GET['artistas'] . '.php';
//	$pagina = 'artista.php';
	include 'pags.php';
	
} else if ($_GET['s']) {
	include 'busq.php';
	
} else {
	

	$pag = get_page_by_path('inicio');
	// $content = $pag->post_content;
	$content = qtrans_use(qtrans_getLanguage(), $pag->post_content,false);
	$content = preg_replace( '/(width|height)="\d*"\s/', "", $content );
	$content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
	echo '<div class="home">'.$content.'</div>';
	

}

?>	