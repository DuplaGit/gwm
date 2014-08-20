$(document).ajaxStart(function() {
		    $('#wait').fadeIn();
		}).ajaxComplete(function() {
		    $('#wait').fadeOut();
		    initGal();
			if(sec_hash == 'seccion' && post_hash != 'galerias' && post_hash != 'patrocinadores' ){

			$("#map_canvas").empty();
		    initialize();
		    
		     // $(".locate").click(getLocation());

				}
		});


$(document).ready(function(){
	$(".ruta").click(function(index) {
		$(".overlay").fadeIn(600);
	});
	$(".overlay").click(function(index) {
		$(".overlay").fadeOut(600);
	});
	
$('.qtrans_flag_en span').html('ENG/'); 
$('.qtrans_flag_es span').html('ESP');
//	$(window).resize(function() {
//			$(".wrapper").css({marginLeft:""});
//			$("body,html").css("overflow","auto");
//			menu_on=false;
//	})
	
//	$("a").click(function(e) {
//		e.preventDefault();
//		var targetTo = $(this).attr("target");
//	    var targetURL = $(this).attr("href");
//	    if(targetTo == "_blank") {
//			//alert(targetURL);
//		    window.open(targetURL, "_system");	
//	    }
//	    if(targetTo == "_system") {
//			alert(targetURL);
////		    window.open(targetURL, "_system");	
//	    }
//	})
	//tomar datos con ajax
	var idioma = null;
	sec_hash = window.location.hash.toString().split('/')[1];
	post_hash = window.location.hash.toString().split('/')[2];
	map_hash = window.location.hash.toString().split('/')[3];
	
		if (sec_hash) {
			secciones(sec_hash,post_hash,map_hash);
		}
		if($(".idioma").is(".es")) {
			idioma = 'es';
			// alert("s");
		} else {
			idioma = 'en';
		}

	// }
	$(window).bind('hashchange', function() {
		sec_hash = window.location.hash.toString().split('/')[1];
		post_hash = window.location.hash.toString().split('/')[2];
		map_hash = window.location.hash.toString().split('/')[3];
		
		if (sec_hash) {
			secciones(sec_hash,post_hash,map_hash);
		}
	
	});

	function secciones(sec_hash,post_hash,map_hash) {
		// console.log(sec_hash);
		
		var today = new Date();
		///////////////////////// ///////////////////////////////

 		$(".contenido").fadeOut(600,function(){
 			$(".contenido").html('');
 			// ?v='+today.getTime()

 			$(this).load(themeurl+'/pull.php',{sec_hash:sec_hash,post_hash:post_hash,lang:idioma,gal:map_hash},function(){
 				$(".contenido").fadeIn(600);
 			});
 		});
 	}

 	////////////////////////////////////////////////////////////////

var menu_on=false;
$(".responsivo_btn").click(function(){
		$(".wrapper, .menu_responsivo").animate({marginLeft:250},200);
		if (!menu_on){	
			$(".wrapper, .menu_responsivo").animate({marginLeft:250},200);
			$("body,html").css("overflow","hidden");
			menu_on=true;
		} else {	
			$(".wrapper, .menu_responsivo").animate({marginLeft:0},200);
			$("body,html").css("overflow","");
			menu_on=false;
		}
	});

	$(".responsive li a").click(function(){
		$(".wrapper, .menu_responsivo").animate({marginLeft:0},200);
		$("body,html").css("overflow","");
		menu_on=false;
	});
	
////	centrar imagenes
//	imagenes = $(".slides .slide img");
//	
//	
//	imagenes.load(function() {
//		imagenes.each(function() {
//			if($(this).height() < 450) {
//				alert($(this).height());
//				margen = 450/2 - $(this).height()/2;
//				$(this).css("margin-top", margen);
//			}
//		});		
//	});
 

 });
/// END READY
function initGal(){
	var imgGal = $(".slides .slide");
//	imgGal.hide();
	imgGal.eq(0).fadeIn(600);
	$(".puntos li").eq(0).addClass("puntos_activo");
	var iInt = 1;
   

	if (imgGal.length > 1) {
		imgGal.click(function() {
			fade(true,imgGal);
		});
		$(".flecha_der").click(function() {
			fade(true,imgGal);
		});
		$(".flecha_izq").click(function() {
			fade(false,imgGal);
		});
		$(".puntos li").click(function() {
			fadeAuto($(this).index(),imgGal);
		});
	} else {
		$(".flechas, .puntos").hide();
	}
}

	function fade(next, img) {
			if (next) {cond1 = iInt; cond2 = img.length; } else {cond1 = 1; cond2 = iInt; };
			if (cond1 < cond2) {
				img.fadeOut(600);
				if (next) {iInt++; } else { iInt-- }
				img.eq(iInt - 1).fadeIn(600);
				$(".puntos li").removeClass("puntos_activo");
				$(".puntos li").eq(iInt - 1).addClass("puntos_activo");
			} else {
				img.fadeOut(600);
				if (next) {iInt = 1 } else { iInt =  img.length };
				img.eq(iInt-1).fadeIn(600);
				$(".puntos li").removeClass("puntos_activo");
				$(".puntos li").eq(iInt - 1).addClass("puntos_activo");
				
			}
	}
	
	function fadeAuto(iInti,img) {
		img.fadeOut(600);
		img.eq(iInti).fadeIn(600);
		$(".puntos li").removeClass("puntos_activo");
		$(".puntos li").eq(iInti).addClass("puntos_activo");
		iInt = iInti + 1;
	};


var map;
var markerLoc;
 
	//initialize();

	
		

 
var x= $(".works");
var imageLoc = "<?php bloginfo('template_url')?>/images/tags/tag.png";

// function getLocation() {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//    }
//   else{ x.innerHTML="Tu navegador no soporta Geo localizacion";}
// }
// function showPosition(position) {
// 	map.panTo(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
//     map.setZoom(16);
// 	changeMarkerPosition(markerLoc,position.coords.latitude, position.coords.longitude);
// }
// function changeMarkerPosition(marker, lat, longitud) {
//     var latlng = new google.maps.LatLng(lat, longitud);
//     marker.setPosition(latlng);
// }
