<?php 
//$cat = $_GET['cat'];



	$args=array(
		'name' => $galSlug,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 1
	);
	$my_posts = get_posts( $args );
	
	$gal = $my_posts[0]->ID;

   if($_GET['gal'])	$gal = $_GET['gal'];
// 	echo $gal;
	$query = new WP_Query("cat=$cat&posts_per_page=-1");
	
//echo $query->post_count;

	$categoria = get_category($cat);
	$mapa = get_category_by_slug('mapa');
//	print_r($categoria);
	
 $i = 0;
 

if ($categoria->slug == 'patrocinadores') {

	 $content_post = get_page_by_path('sponsors');
	$content = $content_post->post_content;

    $content = qtrans_use(qtrans_getLanguage(), $content,false);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);

		echo $content;
// 	echo '<div class="margen patrocinadores">';
// $the_cat = $cat;
// 	$subcats = get_categories('child_of='.$the_cat);
	
// 	if ($subcats) {
// 		foreach ($subcats as $subcat) {
// 			if($subcat->slug == 'main-sponsors') {
// 				//echo $subcat->name;
// 				echo '<div class="logos">';
// 					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
// 					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
// 						echo '<div class="'.$subcat->slug.'">';
// 						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'aside-thumb');
// 						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
// 						echo '</div>';
// 					endwhile;
// 				echo '</div>';
// 			}
// 		}
// 		foreach ($subcats as $subcat) {
// 			if($subcat->slug == 'premium-sponsors') {
// 				//echo $subcat->name;
// 				echo '<div class="logos">';
// 					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
// 					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
// 						echo '<div class="'.$subcat->slug.'">';
// 						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'aside-thumb');
// 						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
// 						echo '</div>';
// 					endwhile;
// 				echo '</div>';
// 			}
// 		}
// 		foreach ($subcats as $subcat) {
// 			if($subcat->slug == 'premium-sponsors-2') {
// 				//echo $subcat->name;
// 				echo '<div class="logos">';
// 					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
// 					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
// 						echo '<div class="'.$subcat->slug.'">';
// 						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'aside-thumb');
// 						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
// 						echo '</div>';
// 					endwhile;
// 				echo '</div>';
// 			}
// 		}
// 		foreach ($subcats as $subcat) {
// 			if($subcat->slug == 'supporting-sponsors') {
// 				//echo $subcat->name;
// 				echo '<div class="logos">';
// 					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
// 					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
// 						echo '<div class="'.$subcat->slug.'">';
// 						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
// 						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
// 						echo '</div>';
// 					endwhile;
// 				echo '</div>';
// 			}
// 		}
// 		foreach ($subcats as $subcat) {
// 			if($subcat->slug == 'media-sponsors') {
// 				//echo $subcat->name;
// 				echo '<div class="logos">';
// 					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
// 					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
// 						echo '<div class="'.$subcat->slug.'">';
// 						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
// 						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
// 						echo '</div>';
// 					endwhile;
// 				echo '</div>';
// 			}
// 		}
// 	} 
// 	echo '</div>';
	
} else if ($categoria->slug == 'galerias') { 

	
//	print_r($mapa);
	$the_cat = $mapa->term_id;
	$subcats = get_categories('child_of='.$the_cat);
	echo '<div class="margen galerias">';
	
	
	if ($subcats) {
		foreach ($subcats as $subcat) {
			echo '<div class="galerias"><span class="morado">';
			echo '<a ';
			if ($subcat->term_id == $cat) echo 'class="activo_m"';
			echo ' href="#!/seccion/'.$subcat->slug.'/">'.$subcat->name.'</a>';
			echo '</span>';
	 
			
			$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
			if($queryMaps->have_posts()){
				echo '<ul class="galerias_ul">';
				$i = 0;
			while ( $queryMaps->have_posts() ) : $queryMaps->the_post(); 
//				print_r(get_post()); 
				$i++;
				
				echo '<li class="galerias_li"><a href="#!/'.$post->post_name.'">';
				echo get_the_title();
				// if($i > 1) 
					echo ' / ';
				echo '</a></li>';
			
			endwhile;
			echo '</ul>';
			}
			echo '</div>';
		}
	}
	echo '</div>';
	$coords = $categoria->description;
	$coords = explode(',',$coords);
	

} else if ($categoria->slug == 'galerias') {
	
	
echo '<div class="margen galerias">';
while (  $query->have_posts() ) :  $query->the_post();
	
	$i++;
	if ( $query->post_count != $i) {
		echo '<a href="#!/';
				// the_permalink();
				$post->post_name;
				echo '">';
	the_title();
	echo ' / </a> ';
	} else {
		echo '<a href="#!/';
				// the_permalink();
				$post->post_name;
				echo '">';
	the_title();
	echo '</a>';
	}
endwhile;
echo '</div>';

} else if ($categoria->slug == 'artistas') { ?>
	<ul class="morado az">
	<li><a class="letterLink" href="#A">a</a></li>
	<li><a class="letterLink" href="#B">b</a></li>
	<li><a class="letterLink" href="#C">c</a></li>
	<li><a class="letterLink" href="#D">d</a></li>
	<li><a class="letterLink" href="#E">e</a></li>
	<li><a class="letterLink" href="#F">f</a></li>
	<li><a class="letterLink" href="#G">g</a></li>
	<li><a class="letterLink" href="#H">h</a></li>
	<li><a class="letterLink" href="#I">i</a></li>
	<li><a class="letterLink" href="#J">j</a></li>
	<li><a class="letterLink" href="#K">k</a></li>
	<li><a class="letterLink" href="#L">l</a></li>
	<li><a class="letterLink" href="#M">m</a></li>
	<li><a class="letterLink" href="#N">n</a></li>
	<li><a class="letterLink" href="#O">o</a></li>
	<li><a class="letterLink" href="#P">p</a></li>
	<li><a class="letterLink" href="#Q">q</a></li>
	<li><a class="letterLink" href="#R">r</a></li>
	<li><a class="letterLink" href="#S">s</a></li>
	<li><a class="letterLink" href="#T">t</a></li>
	<li><a class="letterLink" href="#U">u</a></li>
	<li><a class="letterLink" href="#V">v</a></li>
	<li><a class="letterLink" href="#W">w</a></li>
	<li><a class="letterLink" href="#X">x</a></li>
	<li><a class="letterLink" href="#Y">y</a></li>
	<li><a class="letterLink" href="#Z">z</a></li>

</ul>
<script type="text/javascript">

$(document).ready(function(){
	$(".letterLink").click(function(index) {
		index.preventDefault();
		scrollToAnchor($(this).attr('href'));
	});
	function scrollToAnchor(aid){
	    // var aTag = $("a[id='"+ aid +"']");
	    var aTag = $(aid);
	      // 
	      headerHeight = $('.header').height();
	      aOffset = aTag.offset().top - headerHeight;
 
	      $('html,body').animate({scrollTop: aOffset},'fast');
}
});
</script>
<?PHP	
// echo $lang.'+'.qtrans_getLanguage(); 
echo '<div class="clear"></div> ';
$taxs = get_terms('artistas','hide_empty=0');
$lastLetter = '';
echo '<div><ul>';
$site_url = site_url();
if($lang == 'en' && qtrans_getLanguage() == 'es') $site_url .= '/en' ;
foreach ($taxs as $tax) {
	// print_r($tax);
	$newargs = array(
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'artistas',
                'field' => 'slug',
                'terms' => $tax->slug
            )
    ) );


		   $myposts = get_posts( $newargs );
		   // print_r($myposts[0]);

		  	$newlastLetter = strtoupper(substr($tax->name, 0,1));
		  	// $newlastLetter = strtoupper(substr($tax->name, 0,1));

	  	    if($lastLetter!=$newlastLetter) {
		        echo '</ul></div>';
		        echo '<a id="'.$newlastLetter.'">';
		        echo '<div class="galerias"><span class="morado">'.$newlastLetter.'</span><ul class="galerias_ul">';  
	      	}
	 		
	 		$lastLetter = $newlastLetter;	
	 		$nombre = $tax->name;
	      	$the_slug = $tax->slug;
	      	echo '<li class="galerias_li"><a href="#!/'.$myposts[0]->post_name.'">'.$nombre.' / </a></li>';
	     }
	      echo '</ul></div>';

echo '</div>';

} else {
	///////////////////////////////// MAPA /////////////////////////////////
	echo '<div class="margen">';
	$curr_cat = get_category($cat);
//	print_r($curr_cat);
	
	if ($curr_cat->parent == 0) {
		$the_cat = $cat;
	} else {
		$the_cat = $curr_cat->parent;
	}
	$subcats = get_categories('child_of='.$the_cat	);
		if($lengua == "en") {
		$ruta = 'see route';
	} else {
		$ruta = 'ver ruta';
	}
	?>
<?php
	echo '<div class="ruta_r '.$lengua.'" onClick="toggleLayer(ctaLayer);">'.$ruta.'</div>';
	echo '<div class="submenu">';
	echo '<a ';
	if ($the_cat == $cat) echo 'class="activo_m"';
	$the_catArr = get_category($the_cat);
	$the_catSlug = 'seccion/'.$the_catArr->slug.'/';
	if ($lengua == 'en') {
		echo '  href="#!/'.$the_catSlug.'">See All</a>';
	} else {
		echo '  href="#!/'.$the_catSlug.'">Ver Todo</a>';
	}
//	print_r($subcats); 
	if ($subcats) {
		foreach ($subcats as $subcat) {
			echo '<a ';
			if ($subcat->term_id == $cat) echo 'class="activo_m"';
			// echo ' href="#!/'.get_bloginfo('url').$idioma.'/seccion/'.$subcat->slug.'/">'.$subcat->name.'</a>';
			echo ' href="#!/seccion/'.$subcat->slug.'/">'.$subcat->name.'</a>';
		}
	}
	echo '</div>';
	$coords = $categoria->description;
	$coords = explode(',',$coords);
//	echo $coords[0];
	
	
	
	
	
	$subResponsivo = '<div class="submenu_responsive">';
	if($lengua == "en") {
		$subResponsivo .='<h1>ZONAS</h1>';
	} else {
		$subResponsivo .= '<h1>AREAS</h1>';
	}
	$subResponsivo .= '<a ';
	if ($the_cat == $cat) $subResponsivo .= 'class="activo_m"';
	$subResponsivo .= '  href="#!/'.$the_catSlug.'">';
	if($lengua == "en") {
		$subResponsivo .= 'see all';
	} else {
		$subResponsivo .= 'ver todo';
	}
	$subResponsivo .='</a>';
//	print_r($subcats); 
	if ($subcats) {
		foreach ($subcats as $subcat) {
			$subResponsivo .= '<a ';
			if ($subcat->term_id == $cat) $subResponsivo .=  'class="activo_m"';
			$subResponsivo .= ' href="#!/seccion/'.$subcat->slug.'/">'.$subcat->name.'</a>';
		}
	}
	$subResponsivo .= '</div>';
//	      print_r(get_taxonomies());
	
	
	
	
	?>

<script type="text/javascript">


function toggleLayer(this_layer)
{
   if( this_layer.getMap() ){
        this_layer.setMap(null);
		$(".prueba").hide(100);
		if($(".ruta_r").hasClass('es')) {
			$(".ruta_r").html('ver ruta');
		} else {
			$(".ruta_r").html('see route');
		}
   }else{
        this_layer.setMap(map);
		$(".prueba").show(100);
		
		if($(".ruta_r").hasClass('es')) {
			$(".ruta_r").html('ocultar');
		} else {
			$(".ruta_r").html('hide');
		}
		
   }
}


var ctaLayer;
var estaLayer;

var map;
var markerLoc;
// $(document).ready(function() {
	//initialize();
function initialize() {
	

	var tagLoc = new google.maps.LatLng(0,0);
	
//	var imageLoc = '<?php echo get_bloginfo('template_url')?>/images/tags/tagLoc.png';

	var imageLoc = new google.maps.MarkerImage("<?php echo get_bloginfo('template_url')?>/images/tags/tagLoc.png", null, null, null, new google.maps.Size(15,15));

	var marks = new Array();
	<?php
	
	$e = 0; 
	
	$the_cat = $cat;
	$subcats = get_categories('child_of='.$the_cat);
	
	if ($subcats) {
		foreach ($subcats as $subcat) {
	 
			$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
			while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
				$p = get_the_ID();
				$taxs = get_the_terms($p, 'latlong');
				
	      sort($taxs);
	      echo '/*';
//	      print_r($subcat);
		  echo '*/';
	$e++;
	echo 'var tag'.$e.' = new google.maps.LatLng('.$taxs[0]->name.','.$taxs[1]->name.');'.PHP_EOL;
	echo 'var image'.$e.' = "'.get_bloginfo('template_url').'/images/tags/tag'.$e.'.png";'.PHP_EOL;
	

	
	
	echo 'marks['.$e.'] = new google.maps.Marker({
		        position: tag'.$e.',
		        icon: image'.$e.',
		    });'.PHP_EOL;
	
				
			
			endwhile;
		}
	} else {
		
	
	while (  $query->have_posts() ) :  $query->the_post();

	      $taxs = get_the_terms($p, 'latlong');
	      sort($taxs);
//	      print_r($taxs);
	
	$e++;
	echo 'var tag'.$e.' = new google.maps.LatLng('.$taxs[0]->name.','.$taxs[1]->name.');'.PHP_EOL;
	echo 'var image'.$e.' = "'.get_bloginfo('template_url').'/images/tags/tag'.$e.'.png";'.PHP_EOL;
	
	
	
	
	echo 'marks['.$e.'] = new google.maps.Marker({
		        position: tag'.$e.',
		        icon: image'.$e.',
		    });'.PHP_EOL;
	
	
	endwhile;
	
	}
	
	
	?>
	markerLoc = new google.maps.Marker({
        position: tagLoc,
        icon: imageLoc,
    });
	
	
    
    var styles = [
                  
                  {
                      featureType: "landscape",
                      stylers: [
                        //{ lightness: 80 },
      					//{ hue: "#000000" },
                        { saturation: -100 },
                        {lightness: -12},
                        { visibility: "on" }
                      ]
                  },{
                	 
                	  featureType: "road.arterial",
                      stylers: [
                        { lightness: 0 },
                        { saturation: -100 },
                        { visibility: "on" }
                      ]
                  },{
                	 
                	  featureType: "road.highway",
                      stylers: [
                        { lightness: 0 },
                        { saturation: -100 },
                        { visibility: "on" }
                      ]
                  },{

            		featureType: "administrative",
          		    elementType: "labels.text",
          		    stylers: [
          		      { visibility: "off" }
                        
          		    ]
              	  },{
              		featureType: "poi",
            		    elementType: "geometry",
            		    stylers: [
                      	  { visibility: "off" }
                          
            		    ]
                  },{
              		featureType: "poi.park",
            		    elementType: "geometry",
            		    stylers: [
                      	  { visibility: "on" },
                      	  { color: "#d0d8ae" }
            		    ]
                  },{

              		featureType: "all",
            		elementType: "labels.text",
            		stylers: [
                  		      { visibility: "off" }
                                
                  		    ]
            		    
                  },{
            		featureType: "road",
          		    elementType: "labels.text",
          		    stylers: [
          		      { visibility: "on" }
                        
          		    ]
            	  },{
          		    featureType: "landscape",
        		    elementType: "all",
        		    stylers: [

                              { lightness:50 },
        		      { visibility: "on" }
                      
        		    ]
        	  }
                ];
    var styledMap = new google.maps.StyledMapType(styles,
    	    {name: "Paos"});
    var mapOptions = {
            center: new google.maps.LatLng(<?php echo $coords[0].','.$coords[1]?>),
            disableDefaultUI: true,
            overviewMapControl: true,
            zoom: <?php echo $coords[2] ?>,
            mapTypeId: google.maps.MapTypeId.SATELLITE
          };
          map = new google.maps.Map(document.getElementById("map_canvas"),
              mapOptions);

          map.mapTypes.set('map_style', styledMap);
          map.setMapTypeId('map_style');
          //map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
          
    var infoWindow = new google.maps.InfoWindow();



    

    markerLoc.setMap(map);
	
//	marcadores estacionamientos
	var imagePark = new google.maps.MarkerImage("<?php echo get_bloginfo('template_url')?>/images/estacionamientos.png", null, null, null, new google.maps.Size(15,15));
	var tagsPark = new Array();
	var markersPark = new Array();
	
	//Estacionamiento 
	tagsPark[0] = new google.maps.LatLng(19.443679605605947, -99.18324629999995);
	markersPark[0] = new google.maps.Marker({
        position: tagsPark[0],
        icon: imagePark,
    });
	markersPark[0].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[1] = new google.maps.LatLng(19.407972439907287, -99.18614364629514);
	markersPark[1] = new google.maps.Marker({
        position: tagsPark[1],
        icon: imagePark,
    });
	markersPark[1].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[2] = new google.maps.LatLng(19.40949130559529, -99.1880071);
	markersPark[2] = new google.maps.Marker({
        position: tagsPark[2],
        icon: imagePark,
    });
	markersPark[2].setMap(map);
	//e
//Estacionamiento 
	tagsPark[3] = new google.maps.LatLng(19.409812605595405, -99.19113000000004);
	markersPark[3] = new google.maps.Marker({
        position: tagsPark[3],
        icon: imagePark,
    });
	markersPark[3].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[4] = new google.maps.LatLng(19.412046204303145, -99.18529009577026);
	markersPark[4] = new google.maps.Marker({
        position: tagsPark[4],
        icon: imagePark,
    });
	markersPark[4].setMap(map);
	//e
	
//Estacionamiento 
	tagsPark[5] = new google.maps.LatLng(19.411394605595873, -99.19223455000002);
	markersPark[5] = new google.maps.Marker({
        position: tagsPark[5],
        icon: imagePark,
    });
	markersPark[5].setMap(map);
	//e


//Estacionamiento 
	tagsPark[6] = new google.maps.LatLng(19.411554105595954, -99.18056149999995);
	markersPark[6] = new google.maps.Marker({
        position: tagsPark[6],
        icon: imagePark,
    });
	markersPark[6].setMap(map);
	//e
	
//Estacionamiento 
	tagsPark[7] = new google.maps.LatLng(19.406892605594482, -99.1785658);
	markersPark[7] = new google.maps.Marker({
        position: tagsPark[7],
        icon: imagePark,
    });
	markersPark[7].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[8] = new google.maps.LatLng(19.406892605594482, -99.1785658);
	markersPark[8] = new google.maps.Marker({
        position: tagsPark[8],
        icon: imagePark,
    });
	markersPark[8].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[9] = new google.maps.LatLng(19.414829818437276, -99.17065866322933);
	markersPark[9] = new google.maps.Marker({
        position: tagsPark[9],
        icon: imagePark,
    });
	markersPark[9].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[10] = new google.maps.LatLng(19.41442155559684, -99.17252295000003);
	markersPark[10] = new google.maps.Marker({
        position: tagsPark[10],
        icon: imagePark,
    });
	markersPark[10].setMap(map);
	//e
		//Estacionamiento 
	tagsPark[11] = new google.maps.LatLng(19.41577385559728, -99.16028715000004);
	markersPark[11] = new google.maps.Marker({
        position: tagsPark[11],
        icon: imagePark,
    });
	markersPark[11].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[12] = new google.maps.LatLng(19.413730805596618, -99.15555959999995);
	markersPark[12] = new google.maps.Marker({
        position: tagsPark[12],
        icon: imagePark,
    });
	markersPark[12].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[13] = new google.maps.LatLng(19.413469705596516, -99.15692274999998);
	markersPark[13] = new google.maps.Marker({
        position: tagsPark[13],
        icon: imagePark,
    });
	markersPark[13].setMap(map);
	//e
	


//Estacionamiento 
	tagsPark[14] = new google.maps.LatLng(19.419955754685578, -99.1599697394409);
	markersPark[14] = new google.maps.Marker({
        position: tagsPark[14],
        icon: imagePark,
    });
	markersPark[14].setMap(map);
	//e
//Estacionamiento 
	tagsPark[15] = new google.maps.LatLng(19.419884925594147, -99.1603667063751);
	markersPark[15] = new google.maps.Marker({
        position: tagsPark[15],
        icon: imagePark,
    });
	markersPark[15].setMap(map);
	//e
	
	//Estacionamiento 
	tagsPark[16] = new google.maps.LatLng(19.420850305598815, -99.15576535000002);
	markersPark[16] = new google.maps.Marker({
        position: tagsPark[16],
        icon: imagePark,
    });
	markersPark[16].setMap(map);
	//e
//Estacionamiento 
	tagsPark[17] = new google.maps.LatLng(19.42084570559884, -99.15578745000005);
	markersPark[17] = new google.maps.Marker({
        position: tagsPark[17],
        icon: imagePark,
    });
	markersPark[17].setMap(map);
	//e
	//Estacionamiento 
	tagsPark[18] = new google.maps.LatLng(19.42087300559885, -99.15565485000002);
	markersPark[18] = new google.maps.Marker({
        position: tagsPark[18],
        icon: imagePark,
    });
	markersPark[18].setMap(map);
	//e

//Estacionamiento 
	tagsPark[19] = new google.maps.LatLng(19.42818325560112, -99.15824979999996);
	markersPark[19] = new google.maps.Marker({
        position: tagsPark[19],
        icon: imagePark,
    });
	markersPark[19].setMap(map);
	//e
//Estacionamiento 
	tagsPark[20] = new google.maps.LatLng(19.426615805600647, -99.15990895000004);
	markersPark[20] = new google.maps.Marker({
        position: tagsPark[20],
        icon: imagePark,
    });
	markersPark[20].setMap(map);
	//e
		//Estacionamiento 
	tagsPark[21] = new google.maps.LatLng(19.42848082203211, -99.16011238564454);
	markersPark[21] = new google.maps.Marker({
        position: tagsPark[21],
        icon: imagePark,
    });
	markersPark[21].setMap(map);
	//e
		//Estacionamiento 
	tagsPark[22] = new google.maps.LatLng(19.42521920560019, -99.16840079999997);
	markersPark[22] = new google.maps.Marker({
        position: tagsPark[22],
        icon: imagePark,
    });
	markersPark[22].setMap(map);
	//e



	
	
  
//  fin marcadores estacionamientos
    
    <?php
        $e = 0; 
        
        
        
        while (  $query->have_posts() ) :  $query->the_post();
        $e++;
        echo 'marks['.$e.'].setMap(map);';

        $foto = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($foto, 'thumbnail');
        echo '
				
				google.maps.event.addListener(marks['.$e.'], \'click\', function() {
				 	infoWindow.open(map,marks['.$e.']);
				 	infoWindow.setContent($("#marker'.$e.'").html());
				 });
				 ';
        endwhile;
       
		?>

    	$('.newspaper .conjunto .tag').click(function(e) {
    		showPosition($(this).attr('lat'),$(this).attr('long'));
    		markerClicked = "marker" + ($(this).attr('id'));
//    		alert(markerClicked);
				 	infoWindow.open(map,marks[$(this).attr('id')]);
				 	infoWindow.setContent($("#" + markerClicked).html());
				 	$("html, body").animate({ scrollTop: 0 }, "fast");
    	});

    <?php
    if($gal) {
    ?>
            var p_id = "<?php echo $gal?>";
            var m_id = null;
            $("#marks div").each(function() {
	            if(p_id == $(this).attr("p_id")) {
	            	m_id = $(this).attr("m_id");
	        	 	// infoWindow.setContent($("#marker" + m_id).html());
	        	 	// infoWindow.open(map,marks[m_id]);
	        	    map.setZoom(14);
//	        	 	showPosition($(".newspaper ol li").eq(m_id-1).attr('lat'),$(".newspaper ol li").eq(m_id-1).attr('long'));
	            }
            });
   	<?php 
    }	
   	?>
	

	$(".locate_me").click(getLocation);
	 
  }

// });



function showPosition(lat,longitud) {
	map.panTo(new google.maps.LatLng(lat,longitud));
    map.setZoom(14);
}

var x= $(".works");
var imageLoc = "<?php echo get_bloginfo('template_url')?>/images/tags/tag.png";

function getLocation() {
  if (navigator.geolocation) {
  	// alert('getLocation');
    navigator.geolocation.getCurrentPosition(showPositionLoc);
   }
  else{ x.innerHTML="Tu navegador no soporta Geo localizacion";}
}
function showPositionLoc(position) {
	// alert('showPositionLoc');
	map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
    map.setZoom(16);
	changeMarkerPosition(markerLoc, position.coords.latitude, position.coords.longitude);
}
function changeMarkerPosition(marker, lat, longitud) {
	// alert('changeMarkerPosition');
    var latlng = new google.maps.LatLng(lat, longitud);
    marker.setPosition(latlng);
}
// FOR INTERVAL
function getLocationWithoutPan() {
	// alert('getLocationWithoutPan');
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPositionLocWithoutPan);
   } else{
   	x.innerHTML="Tu navegador no soporta Geo localizacion";}
}
function showPositionLocWithoutPan(position) {
	// alert('showPositionLocWithoutPan');
	changeMarkerPosition(markerLoc, position.coords.latitude, position.coords.longitude);
}
// setInterval(function(){getLocationWithoutPan()}, 5000)


		

</script>

<div id="marks" style="display:none">
	<?php
        $e = 0;

$the_cat = $cat;
	$subcats = get_categories('child_of='.$the_cat);
	
		if ($subcats) {
			foreach ($subcats as $subcat) {
		 
				$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
				while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
					$e++;
        echo '<div id="marker'.$e.'" p_id="'.get_the_ID().'" m_id="'.$e.'">';

        $foto = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($foto, 'thumbnail');
        echo '<div class="ficha_mapa" style="width:270px;"><img style="float:left;" src="'.$img[0].'" width="110">
        <div style="float:right; width:150px;"><a href="#!/'; 
        // the_permalink(); 
        echo $post->post_name;
        echo'">'.get_the_title().'</a><br />'.get_excerpt_h1().'</div></div>';
        
        echo '</div>';
		
					
				
				endwhile;
			}
		} else {
        
        
        while (  $query->have_posts() ) :  $query->the_post();
        $e++;
        echo '<div id="marker'.$e.'" p_id="'.get_the_ID().'" m_id="'.$e.'">';

        $foto = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($foto, 'thumbnail');
        echo '<div class="ficha_mapa" style="width:270px;"><img style="float:left;" src="'.$img[0].'" width="110"><div style="float:right; width:150px;"><a href="#!/'; 
        // the_permalink(); 
        echo $post->post_name;
        echo'">'.get_the_title().'</a><br />'.get_excerpt_h1().'</div></div>';
     
        
        echo '</div>';
        endwhile;
		}
        ?>
</div>
<div class="locate_me"></div>
<div id="map_canvas" class="googlemaps"></div>
	
	<div class="prueba">
	<?php 
	$ruta_page = get_page_by_path( 'route' );
	$ruta_content = qtrans_use($lang, $ruta_page->post_content,false);
	$ruta_content = apply_filters('the_content', $ruta_content);
	echo $ruta_content;
	// if ($lengua == 'en') {
	// 	echo '<p>Gallery Weekend will provide a free transport system. The vans will stop at each gallery every fifteen minutes, following the route illustrated in the image below. No previous inscription is needed.</p>';
	// } else {
	// 	echo '  <p>Gallery Weekend proporcionará un sistema de transporte gratuito. Las camionetas pasarán cada media hora por las galerías, siguiendo la ruta que se indica en la imagen.</p>';
	// }
	?>
	
	</div>
	
<?php 
	

echo $subResponsivo;
//
//	echo '<div class="submenu_responsive"><h1>ZONAS</h1>';
//	echo '<a ';
//	if ($the_cat == $cat) echo 'class="activo_m"';
//	echo '  href="'.$the_cat.$idioma.'">';
//	if($lengua == "en") {
//		echo 'see all';
//	} else {
//		echo 'ver todo';
//	}
//	echo'</a>';
////	print_r($subcats); 
//	if ($subcats) {
//		foreach ($subcats as $subcat) {
//			echo '<a ';
//			if ($subcat->term_id == $cat) echo 'class="activo_m"';
//			echo ' href="'.$subcat->term_id.'">'.$subcat->name.'</a>';
//		}
//	}
//	echo '</div>';
////	      print_r(get_taxonomies());
	
	
	
	?>
<?php
		
		echo '<div class="newspaper">';
	if($lengua == "en") {
		echo '<h1>Galleries</h1>';
	} else {
		echo '<h1>Galerias</h1>';
	}
		
		echo '<ol>';
		
		
		
	$the_cat = $cat;
	$subcats = get_categories('child_of='.$the_cat);
	$i = 0; 
	$f = 0;
	if ($subcats) {
		echo '<div>';
		foreach ($subcats as $subcat) {
			$i++;
			if($i % 2) echo '</div><div class="conjunto">';
			
			echo '<a href="#!/seccion/'.$subcat->slug.'">'.$subcat->name.'</a>';

	 
			$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
			while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
			
				$f++;
				$p = get_the_ID();
				$taxs = get_the_terms($p, 'latlong');
				echo '<li class="tag" id="'.$f.'"  lat="'.$taxs[0]->name.'" long="'.$taxs[1]->name.'">';
				the_title();
				echo '</li>';
			
			endwhile;
			
		}
	} else {
		
			while (  $query->have_posts() ) :  $query->the_post();
			
			
			 $taxs = get_the_terms($p, 'latlong');
		      sort($taxs);
	//	      print_r($taxs);
			
				echo '<li lat="'.$taxs[0]->name.'" long="'.$taxs[1]->name.'">';
				the_title();
				echo '</li>';
			endwhile;
			
	}
		
		
	
		
		
		
			
			
		echo '</ol>';
		echo '<div style="clear:both;"></div>';
echo '</div>';
	
} 

?>
<!--		<a href="?#">01. Altiplano</a> 	--> 

