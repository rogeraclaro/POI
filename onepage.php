<?php
/**
 * Template Name: Home
 * @package persons-of-interest
 **/

get_header();
?>

<style type="text/css" media="screen">
body {
	background-color: #e4e1ce;
}
</style>
<div id="fullpage">
		<div class="section inici" data-anchor="planainici">
		<div id="cords"></div>
		<div id="menuburger">
		<a href="#menu" id="toggle"><span></span></a>
		<div id="menu">
		  <ul>
			<?php if(ICL_LANGUAGE_CODE=='es'): ?>
				<li><a href="#planasegona" class="mnu">PROYECTO</a></li>
			    <li><a href="#planaquarta" class="mnu">PERSONAJES</a></li>
			    <li><a href="#planasetena" class="mnu">CONTACTO</a></li>
			<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>
				<li><a href="#planasegona" class="mnu">PROJECT</a></li>
		    	<li><a href="#planaquarta" class="mnu">PERSONS</a></li>
		    	<li><a href="#planasetena" class="mnu">CONTACT</a></li>
			<?php endif;?>
		  </ul>
		</div>
		</div>
			<div class="row">
				<div class="col-md-3 col-md-offset-1"></div>
		    </div>
		    <div id="fletxafixe01">
		        <a href="#planasegona"><div class="flinici"></div></a>
		    </div>
		<div class="idiomes"><?php echo iso_list_menu('strtoupper'); ?></div>
		</div>
		<div class="section segona" data-anchor="planasegona">
			<div class="row">
				<a name="segona"></a>
				<div class="col-md-8 col-md-offset-2 text_segona">
					<?php if (have_posts()) while ( have_posts() ): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div> 
			</div>
			<div id="fletxafixe02">
		    	<a href="#planatercera"><div class="fl"></div></a>
			</div>
		</div>
		<div class="section tercera" data-anchor="planatercera">
			<div class="row">
				<!-- <div class="col-md-3 col-md-offset-3 text_tercera"><?php the_field('columna_1'); ?></div> -->
				<div class="col-md-8 col-md-offset-2 text_tercera"><?php the_field('columna_2'); ?></div> 
			</div>
			<!--fletxa-->
			<div id="fletxafixe03">
				<a href="#planaquarta"><div class="fl"></div></a>
		    </div>
		    <!--fletxa-->
		</div>
		<div class="section quarta" data-anchor="planaquarta">
			<div id="fletxafixe_amunt01">
		        <a href="#planatercera"><div class="flamunt"></div></a>
		    </div>
		    <div id="botohide">
		        <div class="botohi"></div><div class="text_b"><?php if(ICL_LANGUAGE_CODE=='es'): ?>Esconder marcadores<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>Hide markers<?php endif;?></div>
		    </div>
		    <div id="botoshow">
		        <div class="botolo"></div><div class="text_b"><?php if(ICL_LANGUAGE_CODE=='es'): ?>Mostrar marcadores<?php elseif(ICL_LANGUAGE_CODE=='en'): ?>Show markers<?php endif;?></div>
		    </div>
			<!--<div class="row">
				<div class="col-md-12">	-->		
					<?php if( have_rows('locations') ): ?>
						<div class="acf-map google-maps">
							<?php while ( have_rows('locations') ) : the_row(); 
								$location = get_sub_field('location');
								?>
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-numero="<?php the_sub_field('numero'); ?>">
									<a href="#planacinquena" onClick="obreVideo(<?php the_sub_field('numero'); ?>)" class="wpgmza_markerbox scrollFix hover_titol"><p class="wpgmza_infowindow_title"><?php the_sub_field('title'); ?></p></a>									
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				<!--</div>
			</div>-->
		</div>
		<div class="section cinquena" data-anchor="planacinquena">
			<div id="fletxafixe_amunt03">
		        <a href="#planaquarta"><div class="flamunt"></div></a>
		    </div>

		    <!-- Capa de text -->
		    <div class="cinquena-text-layer">
				<div class="row">
					<?php if( have_rows('locations') ): ?>
						<?php while ( have_rows('locations') ) : the_row(); ?>
							<div class="container_video<?php the_sub_field('numero'); ?>">
								<div class="col-md-1"></div>
								<div class="col-md-1">
									<div class="text_titol"><p><?php the_sub_field('title'); ?></p></div>
									<div class="text_num"><p><?php the_sub_field('numero'); ?></p></div>
									<div class="text_adresa"><?php the_sub_field('direccion'); ?></div>
								</div>
								<div class="col-md-9">
									<div class="text_resum"><?php the_sub_field('description'); ?></div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-12 text-center">
									<div class="play-cinquena"><i class="fa fa-play-circle-o"></i></div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>

			<!-- Capa de vídeo -->
			<div class="cinquena-video-layer">
				<div class="detector"></div>
				<?php if( have_rows('locations') ): ?>
					<?php while ( have_rows('locations') ) : the_row(); ?>
						<div id="video<?php the_sub_field('numero'); ?>" class="container_video<?php the_sub_field('numero'); ?>">
							<?php
							$video_file = get_sub_field('video');
							if ( $video_file ) :
								$upload_dir = wp_upload_dir();
								$video_url  = $upload_dir['baseurl'] . '/video/' . rawurlencode( $video_file );
							?>
							<video class="poi-video" playsinline controls>
								<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
							</video>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<div id="fletxafixe04">
				<a href="#planasetena" onclick="pauseAll();"><div class="fl"></div></a>
			</div>
		</div>
		<div class="section setena" data-anchor="planasetena">
			<div id="fletxafixe_amunt04">
		        <a href="#planacinquena"><div class="flamunt"></div></a>
		    </div>
			<div class="row">
				<div class="col-md-3 col-md-offset-3 text_tercera"><?php the_field('creditos_columna_1'); ?></div> 
				<div class="col-md-3 text_tercera"><?php the_field('creditos_columna_2'); ?></div> 
			</div>
		</div>
</div>

<script type="text/javascript">

(function($) {

function new_map( $el ) {
	// var
	var $markers = $el.find('.marker');
	// vars
	var args = {
		zoom		: 6,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	var styles = [ { "featureType": "landscape", "stylers": [ { "color": "#31312c" } ] },{ "featureType": "poi", "stylers": [ { "color": "#31312c" } ] },{ "featureType": "road.highway", "stylers": [ { "color": "#252421" } ] },{ "featureType": "road.arterial", "stylers": [ { "color": "#2b2a27" } ] },{ "featureType": "road.local", "stylers": [ { "color": "#252421" } ] },{ "featureType": "transit", "stylers": [ { "visibility": "off" } ] },{ "featureType": "water", "stylers": [ { "color": "#808080" } ] },{ "featureType": "administrative", "stylers": [ { "visibility": "simplified" }, { "color": "#6a6960" } ] },{ "elementType": "labels.text.fill", "stylers": [ { "visibility": "on" }, { "color": "#6a6960" } ] },{ "featureType": "poi", "stylers": [ { "visibility": "off" } ] },{ "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] } ];
	// add a markers reference
	map.markers = [];
	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	// center map
	center_map( map );
	map.setOptions({
		styles: styles,
		mapTypeControl: false,
		scrollwheel: true,
		streetViewControl: false,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE
		},
		minZoom: 2,
		maxZoom: 18
	});
	// Resize
	window.addEventListener('resize', function() {
		var center = map.getCenter();
		google.maps.event.trigger(map, 'resize');
		map.setCenter(center);
	});

	return map;
}

function add_marker( $marker, map ) {
	var ButtonOpen = document.getElementById('botoshow');
	var ButtonClose = document.getElementById('botohide');
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon		: '<?php echo esc_url(get_template_directory_uri()); ?>/images/marker.png'
	});
	// add to array
	map.markers.push( marker );
	// if marker contains HTML, add it to an infoWindow

	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html(),
			pixelOffset	: new google.maps.Size(0, 40)
		});
		
		// Hover sobre el marcador: mostrar/amagar infowindow quan estan tots amagats
		var hoverCloseTimer = null;
		google.maps.event.addListener(marker, 'mouseover', function() {
			clearTimeout(hoverCloseTimer);
			// Si hi ha un infowindow persistent (tornat del vídeo), tancar-lo
			if (persistedAfterClick && lastClickedInfowindow) {
				lastClickedInfowindow.close();
				lastClickedInfowindow = null;
				lastClickedMarker = null;
				persistedAfterClick = false;
			}
			if (allIwHidden) {
				infowindow.setOptions({ disableAutoPan: true });
				infowindow.open(map, marker);
				setTimeout(function() {
					$('.gm-style-iw-c').css('opacity', '1');
				}, 50);
			}
		});
		google.maps.event.addListener(marker, 'mouseout', function() {
			if (allIwHidden && !persistedAfterClick) {
				hoverCloseTimer = setTimeout(function() {
					infowindow.close();
				}, 300);
			}
		});

		// Click al marcador → comportament diferent en mobile i desktop
		google.maps.event.addListener(marker, 'click', function() {
			var n = $marker.attr('data-numero');
			var title = $marker.find('.wpgmza_infowindow_title').text().trim();
			activeIwTitle = title;
			$('.gm-style-iw-c').removeClass('iw-active');

			// Mobile amb tots els infowindows amagats: mostrar l'infowindow del marcador
			if (isMobile && allIwHidden) {
				allInfoWindowsData.forEach(function(item) { item.iw.close(); });
				persistedAfterClick = false;
				infowindow.setOptions({ disableAutoPan: false });
				infowindow.open(map, marker);
				setTimeout(function() {
					$('.gm-style-iw-c').css('opacity', '1');
				}, 50);
				lastClickedInfowindow = infowindow;
				lastClickedMarker = marker;
				return;
			}

			// Desktop (o mobile amb infowindows visibles): navegar al vídeo
			if (allIwHidden) {
				lastClickedInfowindow = infowindow;
				lastClickedMarker = marker;
			}
			obreVideo(n);
			location.hash = '#planacinquena';
		});

		ButtonOpen.addEventListener('click', function() {
			if (infowindow) {
				allIwHidden = false;
				infowindow.setOptions({ disableAutoPan: true });
				infowindow.open(map, marker);
				setTimeout(function() {
					$('.gm-style-iw-c').css('opacity', '1');
				}, 50);
			}
		});

		ButtonClose.addEventListener('click', function() {
			allIwHidden = true;
			persistedAfterClick = false;
			lastClickedInfowindow = null;
			lastClickedMarker = null;
			if (infowindow) { infowindow.close(); }
		});

		// Guardar per obrir-les seqüencialment amb fade
		allInfoWindowsData.push({ iw: infowindow, marker: marker });
	}
}

function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
		bounds.extend( marker.position );
	});
	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 6 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
		map.setCenter( bounds.getCenter() );
		map.setZoom( 6 );
	}
}

// global vars
var map = null;
var allInfoWindowsData = [];
var infoWindowsAnimated = false;
var allIwHidden = true;
var activeIwTitle = null;
var lastClickedInfowindow = null;
var lastClickedMarker = null;
var persistedAfterClick = false;
var isMobile = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);

function openAllInfoWindows() {
	if (infoWindowsAnimated) return;
	infoWindowsAnimated = true;
	allIwHidden = false;
	allInfoWindowsData.forEach(function(item, index) {
		setTimeout(function() {
			item.iw.setOptions({ disableAutoPan: true });
			item.iw.open(map, item.marker);
			setTimeout(function() {
				$('.gm-style-iw-c').css('opacity', '1');
			}, 50);
		}, index * 150);
	});
}

$(document).ready(function(){
	$('.acf-map').each(function(){
		map = new_map( $(this) );
	});

	// Obrir infowindows quan s'arriba a la secció del mapa (només primera vegada)
	// i gestionar la seqüència text → vídeo a la secció cinquena
	var videoSequenceTimer = null;
	var textFadeTimer = null;

	function triggerVideoTransition() {
		clearTimeout(videoSequenceTimer);
		clearTimeout(textFadeTimer);
		var $visibleVideo = $('.cinquena-video-layer [id^="video"]:visible .poi-video').first();
		if ($visibleVideo.length && typeof poiPlayers !== 'undefined') {
			poiPlayers.forEach(function(player) {
				if (player.media === $visibleVideo[0]) { player.play(); }
			});
		}
		// Crossfade: vídeo apareix, textos queden per sobre 2s més
		$('.cinquena-video-layer').css({ opacity: 1, 'pointer-events': 'auto' });
		textFadeTimer = setTimeout(function() {
			$('.cinquena-text-layer').css({ opacity: 0, 'pointer-events': 'none' });
		}, 2000);
	}

	function startVideoSequence() {
		clearTimeout(videoSequenceTimer);
		clearTimeout(textFadeTimer);
		$('.cinquena-video-layer').css({ opacity: 0, 'pointer-events': 'none' });
		$('.cinquena-text-layer').css({ opacity: 1, 'pointer-events': 'auto' });
		triggerVideoTransition();
	}

	function resetVideoSequence() {
		clearTimeout(videoSequenceTimer);
		clearTimeout(textFadeTimer);
		$('.cinquena-video-layer').css({ opacity: 0, 'pointer-events': 'none' });
		$('.cinquena-text-layer').css('opacity', 1);
		if (typeof pauseAll === 'function') { pauseAll(); }
	}

	function reapplyActiveIw() {
		if (!activeIwTitle) return;
		setTimeout(function() {
			$('.gm-style-iw-c').each(function() {
				if ($(this).find('.wpgmza_infowindow_title').text().trim() === activeIwTitle) {
					$(this).addClass('iw-active');
				}
			});
		}, 100);
	}

	$(window).on('hashchange', function() {
		if (location.hash === '#planaquarta') {
			openAllInfoWindows();
			reapplyActiveIw();
			// Si tots estan amagats i venim d'un click a marcador, mostrar l'últim
			if (allIwHidden && lastClickedInfowindow && lastClickedMarker) {
				persistedAfterClick = true;
				var _iw = lastClickedInfowindow;
				var _mk = lastClickedMarker;
				setTimeout(function() {
					_iw.setOptions({ disableAutoPan: true });
					_iw.open(map, _mk);
					setTimeout(function() {
						$('.gm-style-iw-c').css('opacity', '1');
					}, 50);
				}, 150);
			}
		}
		if (location.hash === '#planacinquena') {
			startVideoSequence();
		} else {
			resetVideoSequence();
		}
	});

	// Click al botó play → transició immediata a vídeo
	$(document).on('click', '.play-cinquena', function() {
		triggerVideoTransition();
	});

	// Click a qualsevol lloc del vídeo (fora dels controls) → pausa/reprèn
	$(document).on('click', '.cinquena-video-layer', function(e) {
		if (!$(e.target).closest('.plyr__controls, button, a').length) {
			if (typeof poiPlayers !== 'undefined') {
				var $visibleVideo = $('.cinquena-video-layer [id^="video"]:visible .poi-video').first()[0];
				poiPlayers.forEach(function(player) {
					if (player.media === $visibleVideo) {
						if (player.paused) { player.play(); } else { player.pause(); }
					}
				});
			}
		}
	});

	// Click sobre el text de l'infowindow → marcar com a actiu (text vermell)
	$(document).on('click', '.wpgmza_markerbox', function() {
		activeIwTitle = $(this).find('.wpgmza_infowindow_title').text().trim();
		$('.gm-style-iw-c').removeClass('iw-active');
		$(this).closest('.gm-style-iw-c').addClass('iw-active');
	});

	// Hover: portar l'infowindow al davant
	$(document).on('mouseenter', '.gm-style-iw-c', function() {
		var $el = $(this);
		var $parent = $el.parents().filter(function() {
			return $(this).css('z-index') !== 'auto' && $(this).css('z-index') !== '';
		}).first();
		$parent.data('orig-z', $parent.css('z-index'));
		$parent.css('z-index', '9999');
	}).on('mouseleave', '.gm-style-iw-c', function() {
		var $el = $(this);
		var $parent = $el.parents().filter(function() {
			return $(this).data('orig-z') !== undefined;
		}).first();
		$parent.css('z-index', $parent.data('orig-z') || '');
	});
});
})(jQuery);
</script>




<?php get_footer(); ?>