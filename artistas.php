
	<div class="content margen galerias">
	
	<?php 
	
	
      $taxs = get_taxonomies();
      foreach ($taxs as $tax) {
      	$the_tax = get_taxonomy($tax);
      	if($the_tax->query_var == "custom_tag" && $the_tax->name == "artistas") {
	      	$lables = $the_tax->labels;
      		$tagArr = get_terms($the_tax->name);
      		if($tagArr) {
	      		foreach ($tagArr as $k => $subTag) {
	      			echo '<a href="?artistas='.$subTag->term_id.'">'.$subTag->name.'</a>';
	      			
	      			if (end($tagArr) != $subTag) { echo '/'; }
	      		}
      		}
	      	
//	      	print_r($lables);
      	}
      }	
	
	?>
	
<!--		<a href="?artistas=2">Daniela Rossell</a> / 	-->
<!--		<a href="?artistas=2">Damián Ortega</a> / -->
<!--		<a href="?artistas=2">Carlos Amorales</a> / -->
<!--		<a href="?artistas=2">Minerva Cuevas</a> / -->
<!--		<a href="?artistas=2">Gabriel Orozco</a> / -->
<!--		<a href="?artistas=2">Pedro Reyes</a> / -->
<!--		<a href="?artistas=2">Julieta Aranda</a> / -->
<!--		<a href="?artistas=2">Yoshua Okon</a> / -->
<!--		<a href="?artistas=2">Gabriel Kuri</a> / -->
<!--		<a href="?artistas=2">Rafael Lozano-Hemmer</a> / -->
<!--		<a href="?artistas=2">Eddie Hazard</a> / -->
		 
	</div>
	