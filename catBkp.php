<?php 
$cat = $_GET['cat'];

 $gal = $_GET['gal'];
 
	$query = new WP_Query("cat=$cat&posts_per_page=-1");
	
//echo $query->post_count;

	$categoria = get_category($cat);
	$mapa = get_category_by_slug('mapa');
//	print_r($categoria);
	
 $i = 0;
 

if ($categoria->slug == 'patrocinadores') {
	echo '<div class="margen patrocinadores">';
$the_cat = $cat;
	$subcats = get_categories('child_of='.$the_cat);
	
	if ($subcats) {
		foreach ($subcats as $subcat) {
			if($subcat->slug == 'main-sponsors') {
				//echo $subcat->name;
				echo '<div class="logos">';
					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
						echo '<div class="'.$subcat->slug.'">';
						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'aside-thumb');
						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
						echo '</div>';
					endwhile;
				echo '</div>';
			}
		}
		foreach ($subcats as $subcat) {
			if($subcat->slug == 'premium-sponsors') {
				//echo $subcat->name;
				echo '<div class="logos">';
					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
						echo '<div class="'.$subcat->slug.'">';
						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'aside-thumb');
						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
						echo '</div>';
					endwhile;
				echo '</div>';
			}
		}
		foreach ($subcats as $subcat) {
			if($subcat->slug == 'premium-sponsors-2') {
				//echo $subcat->name;
				echo '<div class="logos">';
					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
						echo '<div class="'.$subcat->slug.'">';
						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'aside-thumb');
						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
						echo '</div>';
					endwhile;
				echo '</div>';
			}
		}
		foreach ($subcats as $subcat) {
			if($subcat->slug == 'supporting-sponsors') {
				//echo $subcat->name;
				echo '<div class="logos">';
					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
						echo '<div class="'.$subcat->slug.'">';
						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
						echo '</div>';
					endwhile;
				echo '</div>';
			}
		}
		foreach ($subcats as $subcat) {
			if($subcat->slug == 'media-sponsors') {
				//echo $subcat->name;
				echo '<div class="logos">';
					$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
					while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
						echo '<div class="'.$subcat->slug.'">';
						$url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
						echo '<img alt="'.get_the_title().'" src="'.$url[0].'" />';
						echo '</div>';
					endwhile;
				echo '</div>';
			}
		}
	} 
	echo '</div>';
	
} else if ($categoria->slug == 'galerias') { 

	
//	print_r($mapa);
	$the_cat = $mapa->term_id;
	$subcats = get_categories('child_of='.$the_cat);
	echo '<div class="margen galerias">';
	
	
	if ($subcats) {
		foreach ($subcats as $subcat) {
			echo '<div class="colonia"><a ';
			if ($subcat->term_id == $cat) echo 'class="activo_m"';
			echo ' href="?cat='.$subcat->term_id.$idioma.'">'.$subcat->name.'</a></div>';
	 
			
			$queryMaps = new WP_Query("cat=$subcat->term_id&posts_per_page=-1");
			while ( $queryMaps->have_posts() ) : $queryMaps->the_post();
				echo '<a href="?p='.get_the_ID().$idioma.'">';
	the_title();
	echo ' / </a> ';
			endwhile;
		}
	}
	echo '</div>';
	$coords = $categoria->description;
	$coords = explode(',',$coords);
	

} else if ($categoria->slug == 'galerias' || $categoria->slug == 'artistas') {
	
	
echo '<div class="margen galerias">';
while ( have_posts() ) : the_post();
	
	$i++;
	if ( $query->post_count != $i) {
		echo '<a href="?p='.get_the_ID().$idioma.'">';
	the_title();
	echo ' / </a> ';
	} else {
		echo '<a href="?p='.get_the_ID().$idioma.'">';
	the_title();
	echo '</a>';
	}
endwhile;
echo '</div>';
} else {
	echo '<div class="margen">';
	$curr_cat = get_category($cat);
//	print_r($curr_cat);
	
	if ($curr_cat->parent == 0) {
		$the_cat = $cat;
	} else {
		$the_cat = $curr_cat->parent;
	}
	$subcats = get_categories('child_of='.$the_cat	);
		if($_GET['lang'] == "en") {
		$ruta = 'see route';
	} else {
		$ruta = 'ver ruta';
	}
	?>


<?php
	echo '<div class="ruta_r" onClick="toggleLayer(ctaLayer);">'.$ruta.'</div>';
	echo '<div class="submenu">';
	echo '<a ';
	if ($the_cat == $cat) echo 'class="activo_m"';
	echo '  href="?cat='.$the_cat.$idioma.'">Ver Todo</a>';
//	print_r($subcats); 
	if ($subcats) {
		foreach ($subcats as $subcat) {
			echo '<a ';
			if ($subcat->term_id == $cat) echo 'class="activo_m"';
			echo ' href="?cat='.$subcat->term_id.$idioma.'">'.$subcat->name.'</a>';
		}
	}
	echo '</div>';
	$coords = $categoria->description;
	$coords = explode(',',$coords);
//	echo $coords[0];
	
	?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript">


function toggleLayer(this_layer)
{
   if( this_layer.getMap() ){
        this_layer.setMap(null);
   }else{
        this_layer.setMap(map);
   }
}


var ctaLayer;


var map;
var markerLoc;
$(document).ready(function() {
	initialize();
function initialize() {
	ctaLayer = new google.maps.KmlLayer({
	    url: "<?php bloginfo('template_url')  ?>/images/RutaGWMacw.kml"
	  });

	var tagLoc = new google.maps.LatLng(0,0);
	
//	var imageLoc = '<?php bloginfo('template_url')?>/images/tags/tagLoc.png';

	var imageLoc = new google.maps.MarkerImage("<?php bloginfo('template_url')?>/images/tags/tagLoc.png", null, null, null, new google.maps.Size(15,15));

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
	echo 'var image'.$e.' = "'.get_bloginfo('template_url').'/images/tags/'.$e.'.png";'.PHP_EOL;
	

	
	
	echo 'marks['.$e.'] = new google.maps.Marker({
		        position: tag'.$e.',
		        icon: image'.$e.',
		    });'.PHP_EOL;
	
				
			
			endwhile;
		}
	} else {
		
	
	while ( have_posts() ) : the_post();

	      $taxs = get_the_terms($p, 'latlong');
	      sort($taxs);
//	      print_r($taxs);
	
	$e++;
	echo 'var tag'.$e.' = new google.maps.LatLng('.$taxs[0]->name.','.$taxs[1]->name.');'.PHP_EOL;
	echo 'var image'.$e.' = "'.get_bloginfo('template_url').'/images/tags/'.$e.'.png";'.PHP_EOL;
	
	
	
	
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
	var imagePark = new google.maps.MarkerImage("<?php bloginfo('template_url')?>/images/estacionamientos.png", null, null, null, new google.maps.Size(15,15));
	var tagsPark = new Array();
	var markersPark = new Array();
	
	//Estacionamiento 
	tagsPark[0] = new google.maps.LatLng(0,0);
	markersPark[0] = new google.maps.Marker({
        position: tagsPark[0],
        icon: imagePark,
    });
	markersPark[0].setMap(map);
	
	
  
//  fin marcadores estacionamientos
    
    <?php
        $e = 0; 
        
        
        
        while ( have_posts() ) : the_post();
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
    	});

    <?php
    if($gal) {
    ?>
            var p_id = "<?php echo $gal ?>";
            var m_id = null;
            $("#marks div").each(function() {
	            if(p_id == $(this).attr("p_id")) {
	            	m_id = $(this).attr("m_id");
	        	 	infoWindow.setContent($("#marker" + m_id).html());
	        	 	infoWindow.open(map,marks[m_id]);
	        	    map.setZoom(16);
	        	 	showPosition($(".newspaper ol li").eq(m_id-1).attr('lat'),$(".newspaper ol li").eq(m_id-1).attr('long'));
	            }
            });
   	<?php 
    }	
   	?>
	
	 
  }


	$(".locate_me").click(getLocation);
});



function showPosition(lat,longitud) {
	map.panTo(new google.maps.LatLng(lat,longitud));
    map.setZoom(16);
}

var x= $(".works");
var imageLoc = "<?php bloginfo('template_url')?>/images/tags/tag.png";

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPositionLoc);
   }
  else{ x.innerHTML="Tu navegador no soporta Geo localizacion";}
}
function showPositionLoc(position) {
	map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
    map.setZoom(16);
	changeMarkerPosition(markerLoc, position.coords.latitude, position.coords.longitude);
}
function changeMarkerPosition(marker, lat, longitud) {
    var latlng = new google.maps.LatLng(lat, longitud);
    marker.setPosition(latlng);
}





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
        echo '<div class="ficha_mapa" style="width:270px;"><img style="float:left;" src="'.$img[0].'" width="110"><div style="float:right; width:150px;"><a href="?p='.get_the_ID().$idioma.'">'.get_the_title().'</a><br />'.get_excerpt_h1().'</div></div>';
        
        echo '</div>';
		
					
				
				endwhile;
			}
		} else {
        
        
        while ( have_posts() ) : the_post();
        $e++;
        echo '<div id="marker'.$e.'" p_id="'.get_the_ID().'" m_id="'.$e.'">';

        $foto = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($foto, 'thumbnail');
        echo '<div class="ficha_mapa" style="width:270px;"><img style="float:left;" src="'.$img[0].'" width="110"><div style="float:right; width:150px;"><a href="?p='.get_the_ID().$idioma.'">'.get_the_title().'</a><br />'.get_excerpt_h1().'</div></div>';
        
        echo '</div>';
        endwhile;
		}
        ?>
</div>
<div class="locate_me"></div>
<div id="map_canvas" class="googlemaps"></div>
<?php 
	
	echo '<div class="submenu_responsive"><h1>ZONAS</h1>';
	echo '<a ';
	if ($the_cat == $cat) echo 'class="activo_m"';
	echo '  href="?cat='.$the_cat.$idioma.'">';
	if($_GET['lang'] == "en") {
		echo 'see all';
	} else {
		echo 'ver todo';
	}
	echo'</a>';
//	print_r($subcats); 
	if ($subcats) {
		foreach ($subcats as $subcat) {
			echo '<a ';
			if ($subcat->term_id == $cat) echo 'class="activo_m"';
			echo ' href="?cat='.$subcat->term_id.'">'.$subcat->name.'</a>';
		}
	}
	echo '</div>';
//	      print_r(get_taxonomies());
	
	
	
	?>
<?php
		
		echo '<div class="newspaper">
					<h1>Galerias</h1>';
		
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
			
			echo '<a href="?cat='.$subcat->term_id.'">'.$subcat->name.'</a>';
	 
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
		
			while ( have_posts() ) : the_post();
			
			
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

