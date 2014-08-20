<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galeria de México</title>

<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="code.js"></script>
</head>
<body>
<div class="menu_responsivo">
	<div class="wrapper_r">
			
	<ul class="links">
		<li class="busqueda"><a <?php if ($p == 'search') { echo 'class="activo"'; }?> href="?p=search"></a>
				<input type="text">
  				<input type="image" src="images/busqueda_r.png" width="30" height="30"><a href="?p=search"></a>
			</li>
	
		<li><a href="index2.php">HOME </a></li>
		<li><a href="info.php"> INFO </a></li>
		<li><a href="mapa.php"> MAPA </a></li>
		<li><a href="artistas.php"> ARTISTAS </a></li>
		<li><a href="galerias.php"> GALERIAS </a></li>
		<li><a href="patrocinadores.php"> PATROCINADORES </a></li>
		</ul>
		
		<ul class="redes_responsivo">
			<li class="mail"><a href="#"></a></li>
			<li class="tw"><a href="#"></a></li>
			<li class="fb"><a href="#"></a></li>
		</ul>
	</div>	
</div>


<div class="wrapper"><!--  
	<div class="anuncios">
		<div class="anuncios_gde"></div>
		<div class="anuncios_gde"></div>
		<div class="anuncios_gde"></div>
		<div class="anuncios_gde"></div>
		<div class="anuncios_gde"></div>
		<div class="anuncios_gde"></div>
		<div class="anuncios_ch"></div>
		<div class="anuncios_ch"></div>
		<div class="anuncios_ch"></div>
		<div class="anuncios_ch"></div>
	</div> -->
<?php include 'menu.php';?>
<div class="content">
<?php 
//echo '<pre>';
//print_r($_GET);
//echo '</pre>';
?>

	
	
<?php 
if ($_GET['p']) {
	$pagina = $_GET['p'] . '.php';
	include $pagina;
	
} else if ($_GET['artistas']) {
	
	$pagina = 'artista' .$_GET['artistas'] . '.php';
	include $pagina;
	
} else {
	?>

		<img class= "logo" src="images/GWM_logo_color.jpg" ></img>

	
	<?php
}

?>	
	
	
</div>
<div class="footer">
	<div class= newletter>
		<span>Subscríbete al newsletter</span>  <input type="text" placeholder="Escribe tu mail">
		<input type="submit" value=">>">
	</div>
	
	<div class="codigo"> 
		<a href="http://www.revistacodigo.com/"><img src="images/logo_codigo.png" /></a> 
	</div>
	
	<ul class="redes_foot">
			<li class="mail"><a href="#"></a></li>
			<li class="tw"><a href="#"></a></li>
			<li class="fb"><a href="#"></a></li>
	</ul>
	<div class="codigo_foot">
		<a href="http://www.revistacodigo.com/"><img src="images/logo_codigo.png" /></a> 
	</div>
	
	
</div>
</div>
</body>
</html>