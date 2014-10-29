<?php
function get_video_id_from_url($url){
	if(strpos($url,'youtube') !== false || strpos($url,'youtu') !== false){	
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
			return array ($match[1],'youtube');
		}
	}else {
		$vimeoid =  explode( "/", $url );
		$vimeoid =  end($vimeoid);
		return array($vimeoid,'vimeo');
	}
}
function front_end_gallery($images, $paramssld, $gallery)
{

 ob_start();
	$galleryID=$gallery[0]->id;
	$gallerytitle=$gallery[0]->name;
	$galleryheight=$gallery[0]->sl_height;
	$gallerywidth=$gallery[0]->sl_width;
	$galleryeffect=$gallery[0]->gallery_list_effects_s;
	$slidepausetime=($gallery[0]->description+$gallery[0]->param);
	$gallerypauseonhover=$gallery[0]->pause_on_hover;
	$galleryposition=$gallery[0]->sl_position;
	$slidechangespeed=$gallery[0]->param;
	$gallerychangeview=$gallery[0]->huge_it_sl_effects;
?>
<script>
	var lightbox_transition = '<?php echo $paramssld['light_box_transition'];?>';
	var lightbox_speed = <?php echo $paramssld['light_box_speed'];?>;
	var lightbox_fadeOut = <?php echo $paramssld['light_box_fadeout'];?>;
	var lightbox_title = <?php echo $paramssld['light_box_title'];?>;
	var lightbox_scalePhotos = <?php echo $paramssld['light_box_scalephotos'];?>;
	var lightbox_scrolling = <?php echo $paramssld['light_box_scrolling'];?>;
	var lightbox_opacity = <?php echo ($paramssld['light_box_opacity']/100)+0.001;?>;
	var lightbox_open = <?php echo $paramssld['light_box_open'];?>;
	var lightbox_returnFocus = <?php echo $paramssld['light_box_returnfocus'];?>;
	var lightbox_trapFocus = <?php echo $paramssld['light_box_trapfocus'];?>;
	var lightbox_fastIframe = <?php echo $paramssld['light_box_fastiframe'];?>;
	var lightbox_preloading = <?php echo $paramssld['light_box_preloading'];?>;
	var lightbox_overlayClose = <?php echo $paramssld['light_box_overlayclose'];?>;
	var lightbox_escKey = <?php echo $paramssld['light_box_esckey'];?>;
	var lightbox_arrowKey = <?php echo $paramssld['light_box_arrowkey'];?>;
	var lightbox_loop = <?php echo $paramssld['light_box_loop'];?>;
	var lightbox_closeButton = <?php echo $paramssld['light_box_closebutton'];?>;
	var lightbox_previous = "<?php echo $paramssld['light_box_previous'];?>";
	var lightbox_next = "<?php echo $paramssld['light_box_next'];?>";
	var lightbox_close = "<?php echo $paramssld['light_box_close'];?>";
	var lightbox_html = <?php echo $paramssld['light_box_html'];?>;
	var lightbox_photo = <?php echo $paramssld['light_box_photo'];?>;
	var lightbox_width = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo '';} else { echo $paramssld['light_box_width']; } ?>';
	var lightbox_height = '<?php if($paramssld['light_box_size_fix'] == 'false'){ echo '';} else { echo $paramssld['lightbox_height']; } ?>';
	var lightbox_innerWidth = '<?php echo $paramssld['light_box_innerwidth'];?>';
	var lightbox_innerHeight = '<?php echo $paramssld['light_box_innerheight'];?>';
	var lightbox_initialWidth = '<?php echo $paramssld['light_box_initialwidth'];?>';
	var lightbox_initialHeight = '<?php echo $paramssld['light_box_initialheight'];?>';
        
	var maxwidth=jQuery(window).width();
        if(maxwidth><?php echo $paramssld['light_box_maxwidth'];?>){maxwidth=<?php echo $paramssld['light_box_maxwidth'];?>;}
        var lightbox_maxWidth = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo 'maxwidth'; } ?>;
        var lightbox_maxHeight = <?php if($paramssld['light_box_size_fix'] == 'true'){ echo '"100%"';} else { echo $paramssld['light_box_maxheight']; } ?>;
        
	var lightbox_slideshow = <?php echo $paramssld['light_box_slideshow'];?>;
	var lightbox_slideshowSpeed = <?php echo $paramssld['light_box_slideshowspeed'];?>;
	var lightbox_slideshowAuto = <?php echo $paramssld['light_box_slideshowauto'];?>;
	var lightbox_slideshowStart = "<?php echo $paramssld['light_box_slideshowstart'];?>";
	var lightbox_slideshowStop = "<?php echo $paramssld['light_box_slideshowstop'];?>";
	var lightbox_fixed = <?php echo $paramssld['light_box_fixed'];?>;
	<?php
	$pos = $paramssld['lightbox_open_position'];
	switch($pos){ 
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 1:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 2:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 3:
	?>
		var lightbox_top = '10%';
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;
	case 4:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 5:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 6:
	?>
		var lightbox_top = false;
		var lightbox_bottom = false;
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;	
	case 7:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = '10%';
		var lightbox_right = false;
	<?php
	break;	
	case 8:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = false;
	<?php
	break;	
	case 9:
	?>
		var lightbox_top = false;
		var lightbox_bottom = '10%';
		var lightbox_left = false;
		var lightbox_right = '10%';
	<?php
	break;	
	} ?>
	
	var lightbox_reposition = <?php echo $paramssld['light_box_reposition'];?>;
	var lightbox_retinaImage = <?php echo $paramssld['light_box_retinaimage'];?>;
	var lightbox_retinaUrl = <?php echo $paramssld['light_box_retinaurl'];?>;
	var lightbox_retinaSuffix = "<?php echo $paramssld['light_box_retinasuffix'];?>";
	
				jQuery(document).ready(function(){
				jQuery("#huge_it_gallery_content_<?php echo $galleryID; ?> a[href$='.jpg'], #huge_it_gallery_content_<?php echo $galleryID; ?> a[href$='.png'], #huge_it_gallery_content_<?php echo $galleryID; ?> a[href$='.gif']").addClass('group1');
				
				
				jQuery(".group1").colorbox({rel:'group1'});
				jQuery(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				jQuery(".vimeo").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				jQuery(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				jQuery(".inline").colorbox({inline:true, width:"50%"});
				jQuery(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				jQuery('.non-retina').colorbox({rel:'group5', transition:'none'})
				jQuery('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				

				jQuery("#click").click(function(){ 
					jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		
</script>
	<!--Huge IT gallery START-->
	<!-- GALLERY CONTENT POPUP -->
	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'lightbox/lightbox.php' ) )) {
		?>
	<link href="<?php echo plugins_url('../style/colorbox-'.$paramssld['light_box_style'].'.css', __FILE__);?>" rel="stylesheet" type="text/css" />
	<?php } ?>
<!--	<link href="<?php // echo plugins_url('../style/gallery-all.css', __FILE__);?>" rel="stylesheet" type="text/css" />
	<script src="<?php // echo plugins_url('../js/jquery.colorbox.js', __FILE__);?>"></script>
	<script src="<?php// echo plugins_url('../js/gallery-all.js', __FILE__);?>"></script>
	<link rel="stylesheet" href="<?php echo plugins_url('../style/style2-os.css', __FILE__);?>" />
	<script src="<?php// echo plugins_url('../js/jquery.hugeitmicro.min.js', __FILE__);?>"></script>
	<link href="<?php //echo plugins_url('../style/lightbox.css', __FILE__);?>" rel="stylesheet" type="text/css" />-->
	
	
	<?php
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( !(is_plugin_active( 'wp-lightbox-2/wp-lightbox-2.php' ) )) { ?>

	<?php } ?>
	

	<?php 
	$i = $gallerychangeview;
	switch ($i) {

	case 0:
	  ?>
<script>
jQuery(function(){
    var defaultBlockHeight=<?php echo $paramssld['ht_view2_element_height']+37; ?>;
	var defaultBlockWidth=<?php echo $paramssld['ht_view2_element_width']; ?>;
    var $container = jQuery('#huge_it_gallery_container_<?php echo $galleryID; ?>');

      // add randomish size classes
      $container.find('.element_<?php echo $galleryID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
    $container.hugeitmicro({
      itemSelector : '.element_<?php echo $galleryID; ?>',
      masonry : {
        columnWidth : defaultBlockWidth+20
      },
      masonryHorizontal : {
        rowHeight: defaultBlockHeight+20
      },
      cellsByRow : {
        columnWidth : defaultBlockWidth+20,
        rowHeight : defaultBlockHeight
      },
      cellsByColumn : {
        columnWidth : defaultBlockWidth+20,
        rowHeight : defaultBlockHeight
      },
      getSortData : {
        symbol : function( $elem ) {
          return $elem.attr('data-symbol');
        },
        category : function( $elem ) {
          return $elem.attr('data-category');
        },
        number : function( $elem ) {
          return parseInt( $elem.find('.number').text(), 10 );
        },
        weight : function( $elem ) {
          return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
        },
        name : function ( $elem ) {
          return $elem.find('.name').text();
        }
      }
	 
    });
    
    
	var $optionSets = jQuery('#huge_it_gallery_options .option-set'),
	$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
		var $this = jQuery(this);

		if ( $this.hasClass('selected') ) {
		  return false;
		}
		var $optionSet = $this.parents('.option-set');
		$optionSet.find('.selected').removeClass('selected');
		$this.addClass('selected');

		var options = {},
			key = $optionSet.attr('data-option-key'),
			value = $this.attr('data-option-value');

		value = value === 'false' ? false : value;
		options[ key ] = value;
		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

		  changeLayoutMode( $this, options )
		} else {

		  $container.hugeitmicro( options );
		}

		return false;
	});    

	var isHorizontal = false;
	function changeLayoutMode( $link, options ) {
		var wasHorizontal = isHorizontal;
		isHorizontal = $link.hasClass('horizontal');

		if ( wasHorizontal !== isHorizontal ) {

		  var style = isHorizontal ? 
			{ height: '100%', width: $container.width() } : 
			{ width: 'auto' };

		  $container.filter(':animated').stop();

		  $container.addClass('no-transition').css( style );
		  setTimeout(function(){
			$container.removeClass('no-transition').hugeitmicro( options );
		  }, 100 )
		} else {
		  $container.hugeitmicro( options );
		}
	}

    var $sortBy = jQuery('#sort-by');
    jQuery('#shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });
});

jQuery(document).ready(function(){

	jQuery('.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> .image-overlay a').on('click',function(){
		var strid = jQuery(this).attr('href').replace('#','');
		jQuery('body').append('<div id="huge-popup-overlay"></div>');
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?>').insertBefore('#huge-popup-overlay');
		var height = jQuery(window).height();
		var width=jQuery(window).width();
		if(width<=767){
			jQuery('body').scrollTop(0);
			jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> iframe').height(jQuery('body').width()*0.5);
		}else {jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> iframe').height(jQuery('body').width()*0.23);}
		jQuery('#huge_it_gallery_pupup_element_'+strid).addClass('active').css({height:height*0.7});
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?>').addClass('active');
		
		return false;
	});
	
	
	jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close').on('click',function(){
		closePopup();
		return false;
	});
	
	jQuery('body').on('click','#huge-popup-overlay',function(){
		closePopup();
		return false;
	});
	
	function closePopup() {
		jQuery('#huge-popup-overlay').remove();
		var videsrc=jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.active iframe').attr('src');
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.active iframe').attr('src','');
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.active iframe').attr('src',videsrc);
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li').removeClass('active');
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?>').removeClass('active');
		
	}

	jQuery(window).resize(function(){
		jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> iframe').height(jQuery('#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?>').width()*0.5);
	});

	
}); 
</script>

<style type="text/css">

.element_<?php echo $galleryID; ?> {
	width:<?php echo $paramssld['ht_view2_element_width']; ?>px;
	height:<?php echo $paramssld['ht_view2_element_height']+45; ?>px;
	margin:0px 0px 10px 0px;
	background:#<?php echo $paramssld['ht_view2_element_background_color']; ?>;
	border:<?php echo $paramssld['ht_view2_element_border_width']; ?>px solid #<?php echo $paramssld['ht_view2_element_border_color']; ?>;
	outline:none;
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
	position:relative;
	width:100%;
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> img {
	width:<?php echo $paramssld['ht_view2_element_width']; ?>px !important;
	height:<?php echo $paramssld['ht_view2_element_height']; ?>px !important;
	display:block;
	border-radius: 0px !important;
	box-shadow: 0 0px 0px rgba(0, 0, 0, 0) !important; 
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> .image-overlay {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	display:none;
}

.element_<?php echo $galleryID; ?>:hover .image-block_<?php echo $galleryID; ?>  .image-overlay {
	display:block;
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> .image-overlay a {
	position:absolute;
	top:0px;
	left:0px;
	display:block;
	width:100%;
	height:100%;
	background:url('<?php echo  plugins_url( '../images/zoom.'.$paramssld["ht_view2_zoombutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
}

.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> {
	position:relative;
	height: 30px;
	margin: 0;
	padding: 15px 0px 15px 0px;
	-webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
	box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
}

.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> h3 {
	position:relative;
	margin:0px !important;
	padding:0px 1% 0px 1% !important;
	width:98%;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	font-weight:normal;
	font-size: <?php echo $paramssld["ht_view2_element_title_font_size"];?>px !important;
	line-height: <?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
}

.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> .button-block {
	position:absolute;
	right:0px;
	top:0px;
	display:none;
	vertical-align:middle;
	height:30px;
	padding:10px 10px 4px 10px;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_element_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_element_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	border-left: 1px solid rgba(0,0,0,.05);
}
.element_<?php echo $galleryID; ?>:hover .title-block_<?php echo $galleryID; ?> .button-block {display:block;}

.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a,.element .title-block_<?php echo $galleryID; ?> a:link,.element .title-block_<?php echo $galleryID; ?> a:visited,
.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:hover,.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:focus,.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:active {
	position:relative;
	display:block;
	vertical-align:middle;
	padding: 3px 10px 3px 10px; 
	border-radius:3px;
	font-size:<?php echo $paramssld["ht_view2_element_linkbutton_font_size"];?>px;
	background:#<?php echo $paramssld["ht_view2_element_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view2_element_linkbutton_color"];?>;
	text-decoration:none;
}

/*#####POPUP#####*/

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> {
	position:fixed;
	display:table;
	width:80%;
	top:7%;
	left:7%;
	margin:0px !important;
	padding:0px !important;
	list-style:none;
	z-index:2000;
	display:none;
	height:85%;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?>.active {display:table;}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element {
	position:relative;
	display:none;
	width:100%;
	padding:40px 0px 20px 0px;
	min-height:100%;
	position:relative;
	background:#<?php echo $paramssld["ht_view2_popup_background_color"];?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element.active {
	display:block;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> {
	position:absolute;
	width:100%;
	height:40px;
	top:0px;
	left:0px;
	z-index:2001;
	background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close,#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:link, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:visited {
	position:relative;
	float:right;
	width:40px;
	height:40px;
	display:block;
	background:url('<?php echo  plugins_url( '../images/close.popup.'.$paramssld["ht_view2_popup_closebutton_style"].'.png' , __FILE__ ); ?>') center center no-repeat;
	border-left:1px solid #ccc;
	opacity:.65;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:hover, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:focus, #huge_it_gallery_popup_list_<?php echo $galleryID; ?> .heading-navigation_<?php echo $galleryID; ?> .close:active {opacity:1;}


#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> {
	overflow-y:scroll;
	position:relative;
	width:96%;
	height:98%;
	padding:2% 2% 0% 2%;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
	width:60%;
	position:relative;
	float:left;
	margin-right:2%;
	border-right:1px solid #ccc;
	min-width:200px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> img {
	width:100% !important;
	display:block;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> iframe  {
	width:100% !important;
	height:100%;
	display:block;

}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block {
	width:37%;
	position:relative;
	float:left;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> .right-block > div {
	padding-top:10px;
	margin-bottom:10px;
	<?php if($paramssld['ht_view2_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center top repeat-x;
	<?php } ?>
}
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> .right-block > div:last-child {background:none;}


#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .title {
	position:relative;
	display:block;
	margin:0px 0px 10px 0px !important;
	font-size:<?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view2_popup_title_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view2_popup_title_font_color"];?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $paramssld["ht_view2_description_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view2_description_color"];?>;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h1,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h2,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h3,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h4,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h5,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description h6,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description p, 
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description strong,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description span {
	padding:2px !important;
	margin:0px !important;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description ul,
#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block .description li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list {
	list-style:none;
	display:table;
	position:relative;
	clear:both;
	width:100%;
	margin:0px auto;
	padding:0px;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li {
	display:block;
	float:left;
	width:<?php echo $paramssld["ht_view2_thumbs_width"];?>px;
	height:<?php echo $paramssld["ht_view2_thumbs_height"];?>px;
	margin:0px 2% 5px 1% !important;
	opacity:0.45;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li.active,#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li:hover {
	opacity:1;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li a {
	display:block;
}

#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block ul.thumbs-list li img {
	width:<?php echo $paramssld["ht_view2_thumbs_width"];?>px !important;
	height:<?php echo $paramssld["ht_view2_thumbs_height"];?>px !important;
}


.pupup-element .button-block {
	position:relative;
}

.pupup-element .button-block a,.pupup-element .button-block a:link,.pupup-element .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view2_popup_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view2_popup_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view2_popup_linkbutton_font_size"];?>;
	text-decoration:none;
}

.pupup-element .button-block a:hover,.pupup-element .button-block a:focus,.pupup-element .button-block a:active {
	background:#<?php echo $paramssld["ht_view2_popup_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view2_popup_linkbutton_font_hover_color"];?>;
}


#huge-popup-overlay {
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	height:100%;
	z-index:199;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view2_popup_overlay_color'],2));
				$titleopacity=$paramssld["ht_view2_popup_overlay_transparency_color"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>
}


@media only screen and (max-width: 767px) {
	
	#huge_it_gallery_popup_list_<?php echo $galleryID; ?> {
		position:absolute;
		left:0px;
		top:0px;
		width:100%;
		height:auto !important;
		left:0px;
	}
	
	#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element {
		margin:0px;
		height:auto !important;
		position:absolute;
		left:0px;
		top:0px;
	}

	#huge_it_gallery_popup_list_<?php echo $galleryID; ?> li.pupup-element .popup-wrapper_<?php echo $galleryID; ?> {
		height:auto !important;
		overflow-y:auto;
	}


	#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
		width:100%;
		float:none;
		clear:both;
		margin-right:0px;
		border-right:0px;
	}

	#huge_it_gallery_popup_list_<?php echo $galleryID; ?> .popup-wrapper_<?php echo $galleryID; ?> .right-block {
		width:100%;
		float:none;
		clear:both;
		margin-right:0px;
		border-right:0px;
	}

	#huge-popup-overlay {
		position:fixed;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		z-index:199;
	}

}
</style>
<section id="huge_it_gallery_content_<?php echo $galleryID; ?>" >
  <div id="huge_it_gallery_container_<?php echo $galleryID; ?>" class="super-list variable-sizes clearfix">
  	<?php
	
	foreach($images as $key=>$row)
	{
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<div class="element_<?php echo $galleryID; ?>" tabindex="0" data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
			<div class="image-block_<?php echo $galleryID; ?>">
			<?php
					$imagerowstype=$row->sl_type;
					if($row->sl_type == ''){$imagerowstype='image';}
					switch($imagerowstype){
						case 'image':
				?>									
							<?php $imgurl=explode(";",$row->image_url); ?>
							<?php 	if($row->image_url != ';'){ ?>
							<img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" />
							<?php } else { ?>
							<img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg" alt="" />
							<?php
							} ?>

				<?php
						break;
						case 'video':
				?>
							<?php
								$videourl=get_video_id_from_url($row->image_url);
								if($videourl[1]=='youtube'){?>
										<img src="http://img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg" alt="" />		
								<?php
									}else {
									$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$videourl[0].".php"));
									$imgsrc=$hash[0]['thumbnail_large'];
								?>
										<img src="<?php echo $imgsrc; ?>" alt="" />
								<?php
								}
							?>
				<?php
						break;
					}
				?>
			
				<div class="image-overlay"><a href="#<?php echo $row->id; ?>"></a></div>
			</div>
			<div class="title-block_<?php echo $galleryID; ?>">
				<h3><?php echo $row->name; ?></h3>
				<?php if($paramssld["ht_view2_element_show_linkbutton"]=='on'){?>
					<div class="button-block"><a href="<?php echo $row->sl_url; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?> ><?php echo $paramssld["ht_view2_element_linkbutton_text"]; ?></a></div>
				<?php } ?>
			</div>
		</div>	
		<?php
	}?>
	<div style="clear:both;"></div>
  </div>
</section>
<ul id="huge_it_gallery_popup_list_<?php echo $galleryID; ?>">
	<?php
	foreach($images as $key=>$row)
	{
		$imgurl=explode(";",$row->image_url);
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<li class="pupup-element" id="huge_it_gallery_pupup_element_<?php echo $row->id; ?>">
			<div class="heading-navigation_<?php echo $galleryID; ?>">
				<a href="#close" class="close"></a>
				<div style="clear:both;"></div>
			</div>
			<div class="popup-wrapper_<?php echo $galleryID; ?>">
				<div class="image-block_<?php echo $galleryID; ?>">					
					<?php 
						$imagerowstype=$row->sl_type;
						if($row->sl_type == ''){$imagerowstype='image';}
						switch($imagerowstype){
							case 'image':
					?>									
							<?php 	if($row->image_url != ';'){ ?>
							<img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" />
							<?php } else { ?>
							<img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg" alt="" />
							<?php
							} ?>	

					<?php
							break;
							case 'video':
					?>
								<?php
									$videourl=get_video_id_from_url($row->image_url);
									if($videourl[1]=='youtube'){?>
										<iframe src="//www.youtube.com/embed/<?php echo $videourl[0]; ?>" frameborder="0" allowfullscreen></iframe>
									<?php
									}else {
									?>
										<iframe src="//player.vimeo.com/video/<?php echo $videourl[0]; ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
									<?php
									}
								?>
					<?php
							break;
						}
					?>
	
				</div>
				<div class="right-block">
					<?php if($paramssld["ht_view2_show_popup_title"]=='on'){?><h3 class="title"><?php echo $row->name; ?></h3><?php } ?>
					<?php if($paramssld["ht_view2_show_description"]=='on'){?><div class="description"><?php echo $row->description; ?></div><?php } ?>
					<?php if($paramssld["ht_view2_show_popup_linkbutton"]=='on'){?>
						<div class="button-block">
						<a href="<?php echo $link; ?>"  <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld["ht_view2_popup_linkbutton_text"]; ?></a>
						</div>
					<?php } ?>
					<div style="clear:both;"></div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</li>
		<?php
	}?>
</ul>
	  
  <?php	  
	break;

/////////////////////////////////// VIEW 1 CONTENT SLIDER ////////////////////////////////////
		case 1;
?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.0.0/animate.min.css">
  <link href="<?php echo plugins_url('../style/liquid-slider.css', __FILE__);?>" rel="stylesheet" type="text/css" />
 
<style>
* {outline:none;}
#main-slider_<?php echo $galleryID; ?> {background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;}

#main-slider_<?php echo $galleryID; ?> div.slider-content {
	position:relative;
	width:100%;
	padding:0px 0px 0px 0px;
	position:relative;
	background:#<?php echo $paramssld["ht_view5_slider_background_color"];?>;
}



[class$="-arrow"] {
	background-image:url(<?php echo plugins_url('../images/arrow.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>);
}

.ls-select-box {
	background:url(<?php echo plugins_url('../images/menu.'.$paramssld["ht_view5_icons_style"].'.png', __FILE__);?>) right center no-repeat #<?php echo $paramssld["ht_view5_slider_background_color"];?>;
}

#main-slider_<?php echo $galleryID; ?>-nav-select {
	color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
}

#main-slider_<?php echo $galleryID; ?> div.slider-content .slider-content-wrapper {
	position:relative;
	width:100%;
	padding:0px;
	display:block;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .image-block_<?php echo $galleryID; ?> {
	position:relative;
	width:<?php echo $paramssld["ht_view5_main_image_width"];?>px;
	display:table-cell;
	padding:0px 10px 0px 0px;
	float:left;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .image-block_<?php echo $galleryID; ?> img.main-image {
	position:relative;
	width:100%;
	height:auto;
	display:block;
}


#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .image-block_<?php echo $galleryID; ?> .play-icon {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;	
}
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .image-block_<?php echo $galleryID; ?>  .play-icon.youtube-icon {background:url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/play.youtube.png) center center no-repeat;}
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .image-block_<?php echo $galleryID; ?>  .play-icon.vimeo-icon {background:url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/play.vimeo.png) center center no-repeat;}




#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block {
	display:table-cell;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block > div {
	padding-bottom:10px;
	margin-top:10px;
	<?php if($paramssld['ht_view5_show_separator_lines']=="on") {?>
		background:url('<?php echo  plugins_url( '../images/divider.line.png' , __FILE__ ); ?>') center bottom repeat-x;
	<?php } ?>
}
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block > div:last-child {background:none;}


#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .title {
	position:relative;
	display:block;
	margin:-10px 0px 0px 0px;
	font-size:<?php echo $paramssld["ht_view5_title_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view5_title_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view5_title_font_color"];?>;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $paramssld["ht_view5_description_font_size"];?>px !important;
	line-height:<?php echo $paramssld["ht_view5_description_font_size"];?>px !important;
	color:#<?php echo $paramssld["ht_view5_description_color"];?>;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description h1,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description h2,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description h3,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description h4,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description h5,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description h6,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description p, 
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description strong,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description span {
	padding:2px !important;
	margin:0px !important;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description ul,
#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block .description li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}



#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block {
	position:relative;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block a,#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block a:link,#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block a:visited{
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $paramssld["ht_view5_linkbutton_background_color"];?>;
	color:#<?php echo $paramssld["ht_view5_linkbutton_color"];?>;
	font-size:<?php echo $paramssld["ht_view5_linkbutton_font_size"];?>;
	text-decoration:none;
}

#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block a:hover,#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block a:focus,#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .button-block a:active {
	background:#<?php echo $paramssld["ht_view5_linkbutton_background_hover_color"];?>;
	color:#<?php echo $paramssld["ht_view5_linkbutton_font_hover_color"];?>;
}

@media only screen and (min-width:500px) {
	#main-slider_<?php echo $galleryID; ?>-nav-ul {
		visibility:hidden !important;
		height:1px;
	}
}

@media only screen and (max-width:500px) {
	#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .image-block_<?php echo $galleryID; ?>,#main-slider_<?php echo $galleryID; ?> .slider-content-wrapper .right-block {
		width:100%;
		display:block;
		float:none;
		clear:both;
	}
}

</style>
<div id="main-slider_<?php echo $galleryID; ?>" class="liquid-slider">
	<?php
	
	foreach($images as $key=>$row)
	{
		$imgurl=explode(";",$row->image_url);
		//array_pop($imgurl);
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<div class="slider-content">
			
			<div class="slider-content-wrapper">
				<div class="image-block_<?php echo $galleryID; ?>">
					

					<?php 
						$imagerowstype=$row->sl_type;
						if($row->sl_type == ''){$imagerowstype='image';}
						switch($imagerowstype){
							case 'image':
					?>									
							<?php 	if($row->image_url != ';'){ ?>
							<a class="group1" href="<?php echo $imgurl[0]; ?>"><img class="main-image" src="<?php echo $imgurl[0]; ?>" alt="" /></a>
							<?php } else { ?>
							<img class="main-image" src="images/noimage.jpg" alt="" />
							<?php
							} ?>

						<?php
						break;
						case 'video':
				?>
						<?php
							$videourl=get_video_id_from_url($row->image_url);
							if($videourl[1]=='youtube'){?>
								<a class="youtube huge_it_gallery_item"  href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>">
									<img src="http://img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg" alt="" />
									<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
								</a>								
							<?php
								}else {
								$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$videourl[0].".php"));
								$imgsrc=$hash[0]['thumbnail_large'];
							?>
								<a class="vimeo huge_it_gallery_item" href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>">
									<img src="<?php echo $imgsrc; ?>" alt="" />
									<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
								</a>
							<?php
							}
						?>
				<?php
						break;
					}
				?>
	
				</div>
				<div class="right-block">
					<div><h2 class="title"><?php echo $row->name; ?></h2></div>
					<?php if($paramssld["ht_view5_show_description"]=='on'){?><div class="description"><?php echo $row->description; ?></div><?php } ?>
					<?php if($paramssld["ht_view5_show_linkbutton"]=='on'){?>
						<div class="button-block">
							<a href="<?php echo $link; ?>"  <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $paramssld["ht_view5_linkbutton_text"]; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	} ?>
</div>
  <script src="<?php echo plugins_url('../js/jquery.liquid-slider.min.js', __FILE__);?>"></script>  
   <script>
	
   
    /**
     * If you need to access the internal property or methods, use this:
     * var api = $.data( jQuery('#main-slider')[0], 'liquidSlider');
     * console.log(api);
     */
	 jQuery('#main-slider_<?php echo $galleryID; ?>').liquidSlider();
  </script>
<?php  
        break;
/////////////////////////////// VIEW 2 Lightbox Gallery /////////////////////////////
		
		case 5:
?>

<style type="text/css"> 

.element_<?php echo $galleryID; ?> {
	width:<?php echo $paramssld['ht_view6_width']; ?>px;
	margin:0px 0px 10px 0px;
	border:<?php echo $paramssld['ht_view6_border_width']; ?>px solid #<?php echo $paramssld['ht_view6_border_color']; ?>;
	border-radius:<?php echo $paramssld['ht_view6_border_radius']; ?>px;
	outline:none;
	overflow:hidden;
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> {
	position:relative;
	width:<?php echo $paramssld['ht_view6_width']; ?>px;
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> a {display:block;}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> img {
	width:<?php echo $paramssld['ht_view6_width']; ?>px !important;
	height:auto;
	display:block;
	border-radius: 0px !important;
	box-shadow: 0 0px 0px rgba(0, 0, 0, 0) !important; 
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> img:hover {
	cursor: -webkit-zoom-in; cursor: -moz-zoom-in;
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?> .play-icon {
	position:absolute;
	top:0px;
	left:0px;
	width:100%;
	height:100%;	
	
}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?>  .play-icon.youtube-icon {background:url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/play.youtube.png) center center no-repeat;}

.element_<?php echo $galleryID; ?> .image-block_<?php echo $galleryID; ?>  .play-icon.vimeo-icon {background:url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/play.vimeo.png) center center no-repeat;}


.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> {
	position:absolute;
	
	left:0px;
	width:100%;
	padding-top:5px;
	height:30px;
	bottom:-35px;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view6_title_background_color'],2));
				$titleopacity=$paramssld["ht_view6_title_background_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
	 -webkit-transition: bottom 0.3s ease-out 0.1s;
     -moz-transition: bottom 0.3s ease-out 0.1s;
     -o-transition: bottom 0.3s ease-out 0.1s;
     transition: bottom 0.3s ease-out 0.1s;
}

.element_<?php echo $galleryID; ?>:hover .title-block_<?php echo $galleryID; ?> {bottom:0px;}

.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a, .element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:link, .element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:visited {
	position:relative;
	margin:0px;
	padding:0px 1% 0px 2%;
	width:97%;
	text-decoration:none;
	text-overflow: ellipsis;
	overflow: hidden; 
	white-space:nowrap;
	z-index:20;
	font-size: <?php echo $paramssld["ht_view6_title_font_size"];?>px;
	color:#<?php echo $paramssld["ht_view6_title_font_color"];?>;
	font-weight:normal;
}



.element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:hover, .element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:focus, .element_<?php echo $galleryID; ?> .title-block_<?php echo $galleryID; ?> a:active {
	color:#<?php echo $paramssld["ht_view6_title_font_hover_color"];?>;
	text-decoration:none;
}

</style>
<section id="huge_it_gallery_content_<?php echo $galleryID; ?>">
  <div id="huge_it_gallery_container_<?php echo $galleryID; ?>" class="super-list variable-sizes clearfix">
  	<?php
	
	foreach($images as $key=>$row)
	{
		$link = $row->sl_url;
		$descnohtml=strip_tags($row->description);
		$result = substr($descnohtml, 0, 50);
		?>
		<div class="element_<?php echo $galleryID; ?>" tabindex="0" data-symbol="<?php echo $row->name; ?>" data-category="alkaline-earth">
			<div class="image-block_<?php echo $galleryID; ?>">
				<?php 
					$imagerowstype=$row->sl_type;
					if($row->sl_type == ''){$imagerowstype='image';}
					switch($imagerowstype){
						case 'image':
				?>									
							<?php $imgurl=explode(";",$row->image_url); ?>
							<?php 	if($row->image_url != ';'){ ?>
							<a href="<?php echo $imgurl[0]; ?>"><img id="wd-cl-img<?php echo $key; ?>" src="<?php echo $imgurl[0]; ?>" alt="" /></a>
							<?php } else { ?>
							<img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg" alt="" />
							<?php
							} ?>

				<?php
						break;
						case 'video':
				?>
						<?php
							$videourl=get_video_id_from_url($row->image_url);
							if($videourl[1]=='youtube'){?>
								<a class="youtube huge_it_gallery_item group1"  href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>">
									<img src="http://img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg" alt="" />
									<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
								</a>								
							<?php
								}else {
								$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$videourl[0].".php"));
								$imgsrc=$hash[0]['thumbnail_large'];
							?>
								<a class="vimeo huge_it_gallery_item group1" href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>">
									<img src="<?php echo $imgsrc; ?>" alt="" />
									<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
								</a>
							<?php
							}
						?>
				<?php
						break;
					}
				?>
			</div>
			<?php if($row->name!=""){?>
			<div class="title-block_<?php echo $galleryID; ?>">
				<a href="<?php echo $link; ?>" <?php if ($row->link_target=="on"){echo 'target="_blank"';}?>><?php echo $row->name; ?></a>
			</div>
			<?php } ?>
		</div>	
		<?php
	}?>
	<div style="clear:both;"></div>
  </div>
</section>

<script> 
 jQuery(function(){
	var defaultBlockWidth=<?php echo $paramssld['ht_view6_width']; ?>+20+<?php echo $paramssld['ht_view6_width']*2; ?>;
    var $container = jQuery('#huge_it_gallery_container_<?php echo $galleryID; ?>');
    
    
      // add randomish size classes
      $container.find('.element_<?php echo $galleryID; ?>').each(function(){
        var $this = jQuery(this),
            number = parseInt( $this.find('.number').text(), 10 );
			//alert(number);
        if ( number % 7 % 2 === 1 ) {
          $this.addClass('width2');
        }
        if ( number % 3 === 0 ) {
          $this.addClass('height2');
        }
      });
    
$container.hugeitmicro({
  itemSelector : '.element_<?php echo $galleryID; ?>',
  masonry : {
	columnWidth : <?php echo $paramssld['ht_view6_width']; ?>+10+<?php echo $paramssld['ht_view6_border_width']*2; ?>
  },
  masonryHorizontal : {
	rowHeight: 'auto'
  },
  cellsByRow : {
	columnWidth : <?php echo $paramssld['ht_view6_width']; ?>,
	rowHeight : 'auto'
  },
  cellsByColumn : {
	columnWidth : <?php echo $paramssld['ht_view6_width']; ?>,
	rowHeight : 'auto'
  },
  getSortData : {
	symbol : function( $elem ) {
	  return $elem.attr('data-symbol');
	},
	category : function( $elem ) {
	  return $elem.attr('data-category');
	},
	number : function( $elem ) {
	  return parseInt( $elem.find('.number').text(), 10 );
	},
	weight : function( $elem ) {
	  return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
	},
	name : function ( $elem ) {
	  return $elem.find('.name').text();
	}
  }
});
    
    
      var $optionSets = jQuery('#huge_it_gallery_options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = jQuery(this);

        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  

        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

          changeLayoutMode( $this, options )
        } else {

          $container.hugeitmicro( options );
        }
        
        return false;
      });


    

      var isHorizontal = false;
      function changeLayoutMode( $link, options ) {
        var wasHorizontal = isHorizontal;
        isHorizontal = $link.hasClass('horizontal');

        if ( wasHorizontal !== isHorizontal ) {

          var style = isHorizontal ? 
            { height: '100%', width: $container.width() } : 
            { width: 'auto' };

          $container.filter(':animated').stop();

          $container.addClass('no-transition').css( style );
          setTimeout(function(){
            $container.removeClass('no-transition').hugeitmicro( options );
          }, 100 )
        } else {
          $container.hugeitmicro( options );
        }
      }
     
    var $sortBy = jQuery('#sort-by');
    jQuery('#shuffle a').click(function(){
      $container.hugeitmicro('shuffle');
      $sortBy.find('.selected').removeClass('selected');
      $sortBy.find('[data-option-value="random"]').addClass('selected');
      return false;
    });

	  jQuery(window).load(function(){
		$container.hugeitmicro('reLayout');
	  });
  });
  

</script>
<?php 

break;
/////////////////////////////// VIEW 3 Gallery Huge IT Slider /////////////////////////////
		
		case 3:
	$sliderID=$gallery[0]->id;
	$slidertitle=$gallery[0]->name;
	$sliderheight=$gallery[0]->sl_height;
	$sliderwidth=$gallery[0]->sl_width;
	$slidereffect=$gallery[0]->gallery_list_effects_s;
	$slidepausetime=($gallery[0]->description+$gallery[0]->param);
	$sliderpauseonhover=$gallery[0]->pause_on_hover;
	$sliderposition=$gallery[0]->sl_position;
	$slidechangespeed=$gallery[0]->param;

	$slideshow_title_position = explode('-', trim($paramssld['slider_title_position']));
	$slideshow_description_position = explode('-', trim($paramssld['slider_description_position']));
	
	$hasyoutube=false;
	$hasvimeo=false;
	foreach ($images as $key => $image_row) {
		if(strpos($image_row->image_url,'youtube') !== false){$hasyoutube=true;}
		if(strpos($image_row->image_url,'vimeo') !== false){$hasvimeo=true;}
	}
?>
<script>var video_is_playing_gallery_<?php echo $sliderID; ?>=false;</script>
<?php if ($hasvimeo==true){?>
<script src="<?php echo plugins_url( 'js/vimeo.lib.js' , __FILE__ ) ?>"></script>
<script>
jQuery(function(){
	
	var vimeoPlayer = document.querySelector('iframe');
		
	jQuery('iframe').each(function(){
				Froogaloop(this).addEvent('ready', ready);
	});

	jQuery(".sidedock,.controls").remove();
	function ready(player_id) {
	
		froogaloop = $f(player_id);
	
		function setupEventListeners() {			
			function onPlay() {
				froogaloop.addEvent('play',
				function(){
					video_is_playing_gallery_<?php echo $sliderID; ?>=true;
				});
			}
			function onPause() {
				froogaloop.addEvent('pause',
				function(){
					video_is_playing_gallery_<?php echo $sliderID; ?>=false;
				});
			}					
			function stopVimeoVideo(player){
				Froogaloop(player).api('pause');
			}
			
			onPlay();
			onPause();
			jQuery('#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>, #huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>').click(function(){
				stopVimeoVideo(player_id);
			});
		}
		setupEventListeners();
	}
});		
</script>
<?php } ?>

<?php if ($hasyoutube==true){?>

<script src="<?php echo plugins_url( 'js/youtube.lib.js' , __FILE__ ) ?>"></script>
<script> 
  <?php
  function get_youtube_id_from_url($url){
		if (stristr($url,'youtu.be/'))
			{ preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
		else 
			{ preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch\?v=|(.*?)&v=|v\/|e\/|.+\/|watch.*v=|)([a-z_A-Z0-9]{11})/i', $url, $IDD); return $IDD[6]; }
	}
			
	$i=0;
	 foreach ($images as $key => $image_row) {
		if($image_row->sl_type=="video" and strpos($image_row->image_url,'youtube') !== false){	
  ?> 
		var player_<?php echo $image_row->id; ?>;
<?php
		}else if (strpos($image_row->image_url,'vimeo') !== false){ ?>
				
<?php
		}else{continue;}
		$i++;
	}
?>
		 video_is_playing_gallery_<?php echo $sliderID; ?>=false;
		function onYouTubeIframeAPIReady() {
			<?php
			foreach ($images as $key => $image_row) {?>
							
				<?php if($image_row->sl_type=="video" and strpos($image_row->image_url,'youtube') !== false){
			?> 
				player_<?php echo $image_row->id; ?> = new YT.Player('video_id_gallery_<?php echo $sliderID; ?>_<?php echo $key;?>', {
				  height: '<?php echo $sliderheight; ?>',
				  width: '<?php echo $sliderwidth; ?>',
				  videoId: '<?php echo get_youtube_id_from_url($image_row->image_url); ?>',
				   playerVars: {
					'controls': <?php if ($images[$key]->sl_url=="on"){ echo 1;}else{echo 0;} ?>,           
					'showinfo': <?php if ($images[$key]->link_target=="on"){ echo 1;}else{echo 0;} ?>
				  },
				  events: {
					'onStateChange': onPlayerStateChange_<?php echo $image_row->id; ?>,
					'loop':1
				  }
				});
			<?php
				}else{continue;}
			}
			?>
		}
		
		
<?php			
	foreach ($images as $key => $image_row) {
		if($image_row->sl_type=="video" and strpos($image_row->image_url,'youtube') !== false){
?>
		 function onPlayerStateChange_<?php echo $image_row->id; ?>(event) {
			//(event.data);
			if (event.data == YT.PlayerState.PLAYING) {
				event.target.setPlaybackQuality('<?php echo $images[$key]->name; ?>');
				video_is_playing_gallery_<?php echo $sliderID; ?>=true;
			}
			else{
				video_is_playing_gallery_<?php echo $sliderID; ?>=false;
			}
		  }
<?php 
	    }else{continue;}
		
	}
?>
	function stopYoutubeVideo() {
		<?php 
		$i=0;
		foreach ($images as $key => $image_row) {
			if($image_row->sl_type=="video" and strpos($image_row->image_url,'youtube') !== false){	
		?>
			player_<?php echo $image_row->id; ?>.pauseVideo();
		<?php
			}else{continue;}
				$i++;
			}
		?>
	}

</script>
<?php } ?>
	
	
	<script>
	var data_gallery_<?php echo $sliderID; ?> = [];      
	var event_stack_gallery_<?php echo $sliderID; ?> = [];
	<?php
	//	$images=array_reverse($images);
		$recent_posts = wp_get_recent_posts( $args, ARRAY_A );

		$i=0;
		
		foreach($images as $image){
			  	$imagerowstype=$image->sl_type;
				if($image->sl_type == ''){
				$imagerowstype='image';
				}
				switch($imagerowstype){
							
					case 'image':
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]=[];';
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["id"]="'.$i.'";';
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["image_url"]="'.$image->image_url.'";';
						
						
						$strdesription=str_replace('"',"'",$image->description);
						$strdesription=preg_replace( "/\r|\n/", " ", $strdesription );
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["description"]="'.$strdesription.'";';

						
						$stralt=str_replace('"',"'",$image->name);
						$stralt=preg_replace( "/\r|\n/", " ", $stralt );
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["alt"]="'.$stralt.'";';
						$i++;
					break;
					
					case 'video':
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]=[];';
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["id"]="'.$i.'";';
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["image_url"]="'.$image->image_url.'";';
						
						
						$strdesription=str_replace('"',"'",$image->description);
						$strdesription=preg_replace( "/\r|\n/", " ", $strdesription );
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["description"]="'.$strdesription.'";';

						
						$stralt=str_replace('"',"'",$image->name);
						$stralt=preg_replace( "/\r|\n/", " ", $stralt );
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["alt"]="'.$stralt.'";';
						$i++;
					break;
					
					
					case 'last_posts':
					
					foreach($recent_posts as $keyl => $recentimage){
					if(get_the_post_thumbnail($recentimage["ID"], 'thumbnail') != ''){
						if($keyl < $image->sl_url){
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]=[];';
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["id"]="'.$i.'";';
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["image_url"]="'.$recentimage['guid'].'";';
						
						
						$strdesription=str_replace('"',"'",$recentimage['post_content']);
						$strdesription=preg_replace( "/\r|\n/", " ", $strdesription );
						$strdesription=substr_replace($strdesription, "",$image->description);
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["description"]="'.$strdesription.'";';

						
						$stralt=str_replace('"',"'",$recentimage['post_title']);
						$stralt=preg_replace( "/\r|\n/", " ", $stralt );
						echo 'data_gallery_'.$sliderID.'["'.$i.'"]["alt"]="'.$stralt.'";';
						$i++;
						}
					}
					}
					
					break;
			}
			
			
		}
	?>
	
	

      var huge_it_trans_in_progress_gallery_<?php echo $sliderID; ?> = false;
      var huge_it_transition_duration_gallery_<?php echo $sliderID; ?> = <?php echo $slidechangespeed;?>;
	  var huge_it_playInterval_gallery_<?php echo $sliderID; ?>;
      // Stop autoplay.
      window.clearInterval(huge_it_playInterval_gallery_<?php echo $sliderID; ?>);
	 // alert('huge_it_current_key_gallery_<?php echo $sliderID; ?>');
     var huge_it_current_key_gallery_<?php echo $sliderID; ?> = '<?php echo (isset($current_key) ? $current_key : ''); ?>';
	 function huge_it_move_dots_gallery_<?php echo $sliderID; ?>() {
        var image_left = jQuery(".huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").position().left;
        var image_right = jQuery(".huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").position().left + jQuery(".huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").outerWidth(true);
       
      }
      function huge_it_testBrowser_cssTransitions_gallery_<?php echo $sliderID; ?>() {
        return huge_it_testDom_gallery_<?php echo $sliderID; ?>('Transition');
      }
      function huge_it_testBrowser_cssTransforms3d_gallery_<?php echo $sliderID; ?>() {
        return huge_it_testDom_gallery_<?php echo $sliderID; ?>('Perspective');
      }
      function huge_it_testDom_gallery_<?php echo $sliderID; ?>(prop) {
        // Browser vendor CSS prefixes.
        var browserVendors = ['', '-webkit-', '-moz-', '-ms-', '-o-', '-khtml-'];
        // Browser vendor DOM prefixes.
        var domPrefixes = ['', 'Webkit', 'Moz', 'ms', 'O', 'Khtml'];
        var i = domPrefixes.length;
        while (i--) {
          if (typeof document.body.style[domPrefixes[i] + prop] !== 'undefined') {
            return true;
          }
        }
        return false;
      }
		function huge_it_cube_gallery_<?php echo $sliderID; ?>(tz, ntx, nty, nrx, nry, wrx, wry, current_image_class, next_image_class, direction) {
        /* If browser does not support 3d transforms/CSS transitions.*/
        if (!huge_it_testBrowser_cssTransitions_gallery_<?php echo $sliderID; ?>()) {
			jQuery(".huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>");
        jQuery("#huge_it_dots_" + huge_it_current_key_gallery_<?php echo $sliderID; ?> + "_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>");
          return huge_it_fallback_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
        }
        if (!huge_it_testBrowser_cssTransforms3d_gallery_<?php echo $sliderID; ?>()) {
          return huge_it_fallback3d_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
        }
        huge_it_trans_in_progress_gallery_<?php echo $sliderID; ?> = true;
        /* Set active thumbnail.*/
		jQuery(".huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>");  
		jQuery("#huge_it_dots_" + huge_it_current_key_gallery_<?php echo $sliderID; ?> + "_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>");
        jQuery(".huge_it_slide_bg_gallery_<?php echo $sliderID; ?>").css('perspective', 1000);
        jQuery(current_image_class).css({
          transform : 'translateZ(' + tz + 'px)',
          backfaceVisibility : 'hidden'
        });
		
		 jQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>,.huge_it_slide_bg_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_image_item_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_image_second_item_gallery_<?php echo $sliderID; ?> ").css('overflow', 'visible');
		
        jQuery(next_image_class).css({
          opacity : 1,
          filter: 'Alpha(opacity=100)',
          backfaceVisibility : 'hidden',
          transform : 'translateY(' + nty + 'px) translateX(' + ntx + 'px) rotateY('+ nry +'deg) rotateX('+ nrx +'deg)'
        });
        jQuery(".huge_it_slider_gallery_<?php echo $sliderID; ?>").css({
          transform: 'translateZ(-' + tz + 'px)',
          transformStyle: 'preserve-3d'
        });
        /* Execution steps.*/
        setTimeout(function () {
          jQuery(".huge_it_slider_gallery_<?php echo $sliderID; ?>").css({
            transition: 'all ' + huge_it_transition_duration_gallery_<?php echo $sliderID; ?> + 'ms ease-in-out',
            transform: 'translateZ(-' + tz + 'px) rotateX('+ wrx +'deg) rotateY('+ wry +'deg)'
          });
        }, 20);
        /* After transition.*/
        jQuery(".huge_it_slider_gallery_<?php echo $sliderID; ?>").one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(huge_it_after_trans));
        function huge_it_after_trans() {
          /*if (huge_it_from_focus_gallery_<?php echo $sliderID; ?>) {
            huge_it_from_focus_gallery_<?php echo $sliderID; ?> = false;
            return;
          }*/
		  jQuery(".huge_it_slide_bg_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_image_item_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_image_second_item_gallery_<?php echo $sliderID; ?> ").css('overflow', 'hidden');
		  jQuery(".huge_it_slide_bg_gallery_<?php echo $sliderID; ?>").removeAttr('style');
          jQuery(current_image_class).removeAttr('style');
          jQuery(next_image_class).removeAttr('style');
          jQuery(".huge_it_slider_gallery_<?php echo $sliderID; ?>").removeAttr('style');
          jQuery(current_image_class).css({'opacity' : 0, filter: 'Alpha(opacity=0)', 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, filter: 'Alpha(opacity=100)', 'z-index' : 2});
         // huge_it_change_watermark_container_gallery_<?php echo $sliderID; ?>();
          huge_it_trans_in_progress_gallery_<?php echo $sliderID; ?> = false;
          if (typeof event_stack_gallery_<?php echo $sliderID; ?> !== 'undefined' && event_stack_gallery_<?php echo $sliderID; ?>.length > 0) {
            key = event_stack_gallery_<?php echo $sliderID; ?>[0].split("-");
            event_stack_gallery_<?php echo $sliderID; ?>.shift();
            huge_it_change_image_gallery_<?php echo $sliderID; ?>(key[0], key[1], data_gallery_<?php echo $sliderID; ?>, true,false);
          }
        }
      }
      function huge_it_cubeH_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        /* Set to half of image width.*/
        var dimension = jQuery(current_image_class).width() / 2;
        if (direction == 'right') {
          huge_it_cube_gallery_<?php echo $sliderID; ?>(dimension, dimension, 0, 0, 90, 0, -90, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          huge_it_cube_gallery_<?php echo $sliderID; ?>(dimension, -dimension, 0, 0, -90, 0, 90, current_image_class, next_image_class, direction);
        }
      }
      function huge_it_cubeV_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        /* Set to half of image height.*/
        var dimension = jQuery(current_image_class).height() / 2;
        /* If next slide.*/
        if (direction == 'right') {
          huge_it_cube_gallery_<?php echo $sliderID; ?>(dimension, 0, -dimension, 90, 0, -90, 0, current_image_class, next_image_class, direction);
        }
        else if (direction == 'left') {
          huge_it_cube_gallery_<?php echo $sliderID; ?>(dimension, 0, dimension, -90, 0, 90, 0, current_image_class, next_image_class, direction);
        }
      }
      /* For browsers that does not support transitions.*/
      function huge_it_fallback_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_fade_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
      }
      /* For browsers that support transitions, but not 3d transforms (only used if primary transition makes use of 3d-transforms).*/
      function huge_it_fallback3d_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_sliceV_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
      }
      function huge_it_none_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
        jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});

        /* Set active thumbnail.*/
        jQuery(".huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>");
        jQuery("#huge_it_dots_" + huge_it_current_key_gallery_<?php echo $sliderID; ?> + "_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>");
      }
      function huge_it_fade_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
		if (huge_it_testBrowser_cssTransitions_gallery_<?php echo $sliderID; ?>()) {
          jQuery(next_image_class).css('transition', 'opacity ' + huge_it_transition_duration_gallery_<?php echo $sliderID; ?> + 'ms linear');
		  jQuery(current_image_class).css('transition', 'opacity ' + huge_it_transition_duration_gallery_<?php echo $sliderID; ?> + 'ms linear');
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
        }
        else {
          jQuery(current_image_class).animate({'opacity' : 0, 'z-index' : 1}, huge_it_transition_duration_gallery_<?php echo $sliderID; ?>);
          jQuery(next_image_class).animate({
              'opacity' : 1,
              'z-index': 2
            }, {
              duration: huge_it_transition_duration_gallery_<?php echo $sliderID; ?>,
              complete: function () {return false;}
            });
          // For IE.
          jQuery(current_image_class).fadeTo(huge_it_transition_duration_gallery_<?php echo $sliderID; ?>, 0);
          jQuery(next_image_class).fadeTo(huge_it_transition_duration_gallery_<?php echo $sliderID; ?>, 1);
        }

		jQuery(".huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>");
		jQuery("#huge_it_dots_" + huge_it_current_key_gallery_<?php echo $sliderID; ?> + "_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>");
      }
      function huge_it_grid_gallery_<?php echo $sliderID; ?>(cols, rows, ro, tx, ty, sc, op, current_image_class, next_image_class, direction) {
        /* If browser does not support CSS transitions.*/
        if (!huge_it_testBrowser_cssTransitions_gallery_<?php echo $sliderID; ?>()) {
			jQuery(".huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>");
        jQuery("#huge_it_dots_" + huge_it_current_key_gallery_<?php echo $sliderID; ?> + "_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>");
          return huge_it_fallback_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
		  
        }
        huge_it_trans_in_progress_gallery_<?php echo $sliderID; ?> = true;
        /* Set active thumbnail.*/
		jQuery(".huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>");
        jQuery("#huge_it_dots_" + huge_it_current_key_gallery_<?php echo $sliderID; ?> + "_gallery_<?php echo $sliderID; ?>").removeClass("huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?>").addClass("huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>");
        /* The time (in ms) added to/subtracted from the delay total for each new gridlet.*/
        var count = (huge_it_transition_duration_gallery_<?php echo $sliderID; ?>) / (cols + rows);
        /* Gridlet creator (divisions of the image grid, positioned with background-images to replicate the look of an entire slide image when assembled)*/
        function huge_it_gridlet(width, height, top, img_top, left, img_left, src, imgWidth, imgHeight, c, r) {
          var delay = (c + r) * count;
          /* Return a gridlet elem with styles for specific transition.*/
          return jQuery('<div class="huge_it_gridlet_gallery_<?php echo $sliderID; ?>" />').css({
            width : width,
            height : height,
            top : top,
            left : left,
            backgroundImage : 'url("' + src + '")',
            backgroundColor: jQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").css("background-color"),
            /*backgroundColor: rgba(0, 0, 0, 0),*/
            backgroundRepeat: 'no-repeat',
            backgroundPosition : img_left + 'px ' + img_top + 'px',
            backgroundSize : imgWidth + 'px ' + imgHeight + 'px',
            transition : 'all ' + huge_it_transition_duration_gallery_<?php echo $sliderID; ?> + 'ms ease-in-out ' + delay + 'ms',
            transform : 'none'
          });
        }
        /* Get the current slide's image.*/
        var cur_img = jQuery(current_image_class).find('img');
        /* Create a grid to hold the gridlets.*/
        var grid = jQuery('<div />').addClass('huge_it_grid_gallery_<?php echo $sliderID; ?>');
        /* Prepend the grid to the next slide (i.e. so it's above the slide image).*/
        jQuery(current_image_class).prepend(grid);
        /* vars to calculate positioning/size of gridlets*/
        var cont = jQuery(".huge_it_slide_bg_gallery_<?php echo $sliderID; ?>");
        var imgWidth = cur_img.width();
        var imgHeight = cur_img.height();
        var contWidth = cont.width(),
            contHeight = cont.height(),
            imgSrc = cur_img.attr('src'),/*.replace('/thumb', ''),*/
            colWidth = Math.floor(contWidth / cols),
            rowHeight = Math.floor(contHeight / rows),
            colRemainder = contWidth - (cols * colWidth),
            colAdd = Math.ceil(colRemainder / cols),
            rowRemainder = contHeight - (rows * rowHeight),
            rowAdd = Math.ceil(rowRemainder / rows),
            leftDist = 0,
            img_leftDist = (jQuery(".huge_it_slide_bg_gallery_<?php echo $sliderID; ?>").width() - cur_img.width()) / 2;
        /* tx/ty args can be passed as 'auto'/'min-auto' (meaning use slide width/height or negative slide width/height).*/
        tx = tx === 'auto' ? contWidth : tx;
        tx = tx === 'min-auto' ? - contWidth : tx;
        ty = ty === 'auto' ? contHeight : ty;
        ty = ty === 'min-auto' ? - contHeight : ty;
        /* Loop through cols*/
        for (var i = 0; i < cols; i++) {
          var topDist = 0,
              img_topDst = (jQuery(".huge_it_slide_bg_gallery_<?php echo $sliderID; ?>").height() - cur_img.height()) / 2,
              newColWidth = colWidth;
          /* If imgWidth (px) does not divide cleanly into the specified number of cols, adjust individual col widths to create correct total.*/
          if (colRemainder > 0) {
            var add = colRemainder >= colAdd ? colAdd : colRemainder;
            newColWidth += add;
            colRemainder -= add;
          }
          /* Nested loop to create row gridlets for each col.*/
          for (var j = 0; j < rows; j++)  {
            var newRowHeight = rowHeight,
                newRowRemainder = rowRemainder;
            /* If contHeight (px) does not divide cleanly into the specified number of rows, adjust individual row heights to create correct total.*/
            if (newRowRemainder > 0) {
              add = newRowRemainder >= rowAdd ? rowAdd : rowRemainder;
              newRowHeight += add;
              newRowRemainder -= add;
            }
            /* Create & append gridlet to grid.*/
            grid.append(huge_it_gridlet(newColWidth, newRowHeight, topDist, img_topDst, leftDist, img_leftDist, imgSrc, imgWidth, imgHeight, i, j));
            topDist += newRowHeight;
            img_topDst -= newRowHeight;
          }
          img_leftDist -= newColWidth;
          leftDist += newColWidth;
        }
        /* Set event listener on last gridlet to finish transitioning.*/
        var last_gridlet = grid.children().last();
        /* Show grid & hide the image it replaces.*/
        grid.show();
        cur_img.css('opacity', 0);
        /* Add identifying classes to corner gridlets (useful if applying border radius).*/
        grid.children().first().addClass('rs-top-left');
        grid.children().last().addClass('rs-bottom-right');
        grid.children().eq(rows - 1).addClass('rs-bottom-left');
        grid.children().eq(- rows).addClass('rs-top-right');
        /* Execution steps.*/
        setTimeout(function () {
          grid.children().css({
            opacity: op,
            transform: 'rotate('+ ro +'deg) translateX('+ tx +'px) translateY('+ ty +'px) scale('+ sc +')'
          });
        }, 1);
        jQuery(next_image_class).css('opacity', 1);
        /* After transition.*/
        jQuery(last_gridlet).one('webkitTransitionEnd transitionend otransitionend oTransitionEnd mstransitionend', jQuery.proxy(huge_it_after_trans));
        function huge_it_after_trans() {
          jQuery(current_image_class).css({'opacity' : 0, 'z-index': 1});
          jQuery(next_image_class).css({'opacity' : 1, 'z-index' : 2});
          cur_img.css('opacity', 1);
          grid.remove();
          huge_it_trans_in_progress_gallery_<?php echo $sliderID; ?> = false;
          if (typeof event_stack_gallery_<?php echo $sliderID; ?> !== 'undefined' && event_stack_gallery_<?php echo $sliderID; ?>.length > 0) {
            key = event_stack_gallery_<?php echo $sliderID; ?>[0].split("-");
            event_stack_gallery_<?php echo $sliderID; ?>.shift();
            huge_it_change_image_gallery_<?php echo $sliderID; ?>(key[0], key[1], data_gallery_<?php echo $sliderID; ?>, true,false);
          }
        }
      }
      function huge_it_sliceH_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateX = 'min-auto';
        }
        else if (direction == 'left') {
          var translateX = 'auto';
        }
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 8, 0, translateX, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_sliceV_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'min-auto';
        }
        else if (direction == 'left') {
          var translateY = 'auto';
        }
        huge_it_grid_gallery_<?php echo $sliderID; ?>(10, 1, 0, 0, translateY, 1, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_slideV_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateY = 'auto';
        }
        else if (direction == 'left') {
          var translateY = 'min-auto';
        }
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 1, 0, 0, translateY, 1, 1, current_image_class, next_image_class, direction);
      }
      function huge_it_slideH_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var translateX = 'min-auto';
        }
        else if (direction == 'left') {
          var translateX = 'auto';
        }
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 1, 0, translateX, 0, 1, 1, current_image_class, next_image_class, direction);
      }
      function huge_it_scaleOut_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 1, 0, 0, 0, 1.5, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_scaleIn_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 1, 0, 0, 0, 0.5, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_blockScale_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_grid_gallery_<?php echo $sliderID; ?>(8, 6, 0, 0, 0, .6, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_kaleidoscope_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_grid_gallery_<?php echo $sliderID; ?>(10, 8, 0, 0, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_fan_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        if (direction == 'right') {
          var rotate = 45;
          var translateX = 100;
        }
        else if (direction == 'left') {
          var rotate = -45;
          var translateX = -100;
        }
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 10, rotate, translateX, 0, 1, 0, current_image_class, next_image_class, direction);
      }
      function huge_it_blindV_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_grid_gallery_<?php echo $sliderID; ?>(1, 8, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }
      function huge_it_blindH_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        huge_it_grid_gallery_<?php echo $sliderID; ?>(10, 1, 0, 0, 0, .7, 0, current_image_class, next_image_class);
      }
      function huge_it_random_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction) {
        var anims = ['sliceH', 'sliceV', 'slideH', 'slideV', 'scaleOut', 'scaleIn', 'blockScale', 'kaleidoscope', 'fan', 'blindH', 'blindV'];
        /* Pick a random transition from the anims array.*/
        this["huge_it_" + anims[Math.floor(Math.random() * anims.length)] + "_gallery_<?php echo $sliderID; ?>"](current_image_class, next_image_class, direction);
      }
      
      function iterator_gallery_<?php echo $sliderID; ?>() {
        var iterator = 1;

        return iterator;
     }
	 
     function huge_it_change_image_gallery_<?php echo $sliderID; ?>(current_key, key, data_gallery_<?php echo $sliderID; ?>, from_effect,clicked) {
		
        if (data_gallery_<?php echo $sliderID; ?>[key]) {
			
			if(video_is_playing_gallery_<?php echo $sliderID; ?> && !clicked){
				return false;
			}
        
          if (!from_effect) {
			
            // Change image key.
            jQuery("#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>").val(key);
             // if (current_key == '-2') { /* Dots.*/
				current_key = jQuery(".huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?>").attr("image_key");
			//  }
          }

          if (huge_it_trans_in_progress_gallery_<?php echo $sliderID; ?>) {
			//errorlogjQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").after(" --IN TRANSACTION-- <br />");
            event_stack_gallery_<?php echo $sliderID; ?>.push(current_key + '-' + key);
            return;
          }
		  
          var direction = 'right';
          if (huge_it_current_key_gallery_<?php echo $sliderID; ?> > key) {
            var direction = 'left';
          }
          else if (huge_it_current_key_gallery_<?php echo $sliderID; ?> == key) {
            return false;
          }

         
          // Set active thumbnail position.
      
          huge_it_current_key_gallery_<?php echo $sliderID; ?> = key;
          //Change image id, title, description.
          jQuery("#huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>").attr('image_id', data_gallery_<?php echo $sliderID; ?>[key]["id"]);
		  
		  
		  jQuery(".huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>").html(data_gallery_<?php echo $sliderID; ?>[key]["alt"]);
          jQuery(".huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>").html(data_gallery_<?php echo $sliderID; ?>[key]["description"]);
        
		  var current_image_class = "#image_id_gallery_<?php echo $sliderID; ?>_" + data_gallery_<?php echo $sliderID; ?>[current_key]["id"];
          var next_image_class = "#image_id_gallery_<?php echo $sliderID; ?>_" + data_gallery_<?php echo $sliderID; ?>[key]["id"];
          
		  
		if(jQuery(current_image_class).find('.huge_it_video_frame_gallery_<?php echo $sliderID; ?>').length>0) {
			var streffect='<?php echo $slidereffect; ?>';
			if(streffect=="cubeV" || streffect=="cubeH" || streffect=="none" || streffect=="fade"){
				huge_it_<?php echo $slidereffect; ?>_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
			}else{	
				huge_it_fade_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
			}	
		}else{	
				huge_it_<?php echo $slidereffect; ?>_gallery_<?php echo $sliderID; ?>(current_image_class, next_image_class, direction);
		}	
		  
		  
		jQuery('.huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>').removeClass('none');
		if(jQuery('.huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>').html()==""){jQuery('.huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>').addClass('none');}

		jQuery('.huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>').removeClass('none');
		if(jQuery('.huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>').html()==""){jQuery('.huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>').addClass('none');}
	  
		  
		  
		  jQuery(current_image_class).find('.huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>').addClass('none');
		  jQuery(current_image_class).find('.huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>').addClass('none');
		
		

		  
		  //errorlogjQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").after("--cur-key="+current_key+" --cur-img-class="+current_image_class+" nxt-img-class="+next_image_class+"--");
			huge_it_move_dots_gallery_<?php echo $sliderID; ?>();
			<?php if ($hasyoutube==true){?>stopYoutubeVideo(); <?php } ?>
			window.clearInterval(huge_it_playInterval_gallery_<?php echo $sliderID; ?>);
			play_gallery_<?php echo $sliderID; ?>();
        }

      }
	  
      function huge_it_popup_resize_gallery_<?php echo $sliderID; ?>() {

		var staticsliderwidth=<?php echo $sliderwidth;?>;
		var sliderwidth=<?php echo $sliderwidth;?>;
		
		var bodyWidth=jQuery(window).width();
        var parentWidth = jQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").parent().width();
		//if responsive js late responsive.js @  take body size and not parent div
		if(sliderwidth>parentWidth){sliderwidth=parentWidth;}
		if(sliderwidth>bodyWidth){sliderwidth=bodyWidth;}
		
		var str=(<?php echo $sliderheight;?>/staticsliderwidth);
		
		jQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").css({width: (sliderwidth)});
		jQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").css({height: ((sliderwidth) * str)});
		jQuery(".huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>").css({width: (sliderwidth)});
		jQuery(".huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>").css({height: ((sliderwidth) * str)});
			
		if("<?php echo $slideshow_title_position[1]; ?>"=="middle"){var titlemargintopminus=jQuery(".huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>").outerHeight()/2;}		
		if("<?php echo $slideshow_title_position[0]; ?>"=="center"){var titlemarginleftminus=jQuery(".huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>").outerWidth()/2;}		
		jQuery(".huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>").css({cssText: "margin-top:-" + titlemargintopminus + "px; margin-left:-"+titlemarginleftminus+"px;"});
		
		if("<?php echo $slideshow_description_position[1]; ?>"=="middle"){var descriptionmargintopminus=jQuery(".huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>").outerHeight()/2;}	
		if("<?php echo $slideshow_description_position[0]; ?>"=="center"){var descriptionmarginleftminus=jQuery(".huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>").outerWidth()/2;}
		jQuery(".huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>").css({cssText: "margin-top:-" + descriptionmargintopminus + "px; margin-left:-"+descriptionmarginleftminus+"px;"});		
		
		
		if("<?php echo $paramssld['slider_crop_image']; ?>"=="resize"){
			jQuery(".huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>, .huge_it_slideshow_image_item1_gallery_<?php echo $sliderID; ?> img, .huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?> img").css({
				cssText: "width:" + sliderwidth + "px; height:" + ((sliderwidth) * str)	+"px;"
			});
		}else {
			jQuery(".huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_image_item1_gallery_<?php echo $sliderID; ?>,.huge_it_slideshow_image_item2_gallery_<?php echo $sliderID; ?>").css({
			cssText: "max-width: " + sliderwidth + "px !important; max-height: " + (sliderwidth * str) + "px !important;"
		  });
		}
		
		jQuery('.huge_it_video_frame_gallery_<?php echo $sliderID; ?>').each(function (e) {
          jQuery(this).width(sliderwidth);
          jQuery(this).height(sliderwidth * str);
        });
      }
      
      jQuery(window).load(function () {
		jQuery(window).resize(function() {
			huge_it_popup_resize_gallery_<?php echo $sliderID; ?>();
		});
		
		huge_it_popup_resize_gallery_<?php echo $sliderID; ?>();
        /* Disable right click.*/
        jQuery('div[id^="huge_it_container"]').bind("contextmenu", function () {
          return false;
        });
        			
		/*HOVER SLIDESHOW*/
		jQuery("#huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>, .huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>, .huge_it_slideshow_dots_container_gallery_<?php echo $sliderID; ?>,#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>,#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>").hover(function(){
			//errorlogjQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").after(" -- hover -- <br /> ");
			jQuery("#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>").css({'display':'inline'});
			jQuery("#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>").css({'display':'inline'});
		},function(){
			jQuery("#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>").css({'display':'none'});
			jQuery("#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>").css({'display':'none'});
		});
		var pausehover="<?php echo $sliderpauseonhover;?>";
		if(pausehover=="on"){
			jQuery("#huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>, .huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>, .huge_it_slideshow_dots_container_gallery_<?php echo $sliderID; ?>,#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>,#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>").hover(function(){
				window.clearInterval(huge_it_playInterval_gallery_<?php echo $sliderID; ?>);
			},function(){
				window.clearInterval(huge_it_playInterval_gallery_<?php echo $sliderID; ?>);
				play_gallery_<?php echo $sliderID; ?>();
			});		
		}	
          play_gallery_<?php echo $sliderID; ?>();        
      });

      function play_gallery_<?php echo $sliderID; ?>() {	   
        /* Play.*/
		//errorlogjQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").after(" -- paly  ---- ");
        huge_it_playInterval_gallery_<?php echo $sliderID; ?> = setInterval(function () {
			//errorlogjQuery(".huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>").after(" -- time left ---- ");
          var iterator = 1;
          huge_it_change_image_gallery_<?php echo $sliderID; ?>(parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()), (parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()) + iterator) % data_gallery_<?php echo $sliderID; ?>.length, data_gallery_<?php echo $sliderID; ?>,false,false);
        }, '<?php echo $slidepausetime; ?>');
      }
	  
      jQuery(window).focus(function() {
       /*event_stack_gallery_<?php echo $sliderID; ?> = [];*/
        var i_gallery_<?php echo $sliderID; ?> = 0;
        jQuery(".huge_it_slider_gallery_<?php echo $sliderID; ?>").children("div").each(function () {
          if (jQuery(this).css('opacity') == 1) {
            jQuery("#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>").val(i_gallery_<?php echo $sliderID; ?>);
          }
          i_gallery_<?php echo $sliderID; ?>++;
        });
      });
      jQuery(window).blur(function() {
        event_stack_gallery_<?php echo $sliderID; ?> = [];
        window.clearInterval(huge_it_playInterval_gallery_<?php echo $sliderID; ?>);
      });      
    </script>
	<style>				
	 .huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?> {
		height:<?php echo $sliderheight; ?>px;
		width:<?php  echo $sliderwidth; ?>px;
		position:relative;
		display: block;
		text-align: center;
		/*HEIGHT FROM HEADER.PHP*/
		clear:both;
		<?php if($sliderposition=="left"){ $position='float:left;';}elseif($sliderposition=="right"){$position='float:right;';}else{$position='float:none; margin:0px auto;';} ?>
		<?php echo $position;  ?>
		
		border-style:solid;
		border-left:0px !important;
		border-right:0px !important;
	}


	.huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?> * {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
	}
		 

	  .huge_it_slideshow_image_gallery_<?php echo $sliderID; ?> {
			/*width:100%;*/
	  }

	  #huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>,
	  #huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
		cursor: pointer;
		display:none;
		display: block;
		
		height: 100%;
		outline: medium none;
		position: absolute;

		/*z-index: 10130;*/
		z-index: 13;
		bottom:25px;
		top:50%;		
	  }
	 

	  #huge_it_slideshow_left-ico_gallery_<?php echo $sliderID; ?>,
	  #huge_it_slideshow_right-ico_gallery_<?php echo $sliderID; ?> {
		z-index: 13;
		-moz-box-sizing: content-box;
		box-sizing: content-box;
		cursor: pointer;
		display: table;
		left: -9999px;
		line-height: 0;
		margin-top: -15px;
		position: absolute;
		top: 50%;
		/*z-index: 10135;*/
	  }
	  #huge_it_slideshow_left-ico_gallery_<?php echo $sliderID; ?>:hover,
	  #huge_it_slideshow_right-ico_gallery_<?php echo $sliderID; ?>:hover {
		cursor: pointer;
	  }
	  
	  .huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?> {
		display: table;
		position: relative;
		top:0px;
		left:0px;
		text-align: center;
		vertical-align: middle;
		width:100%;
	  }	  
		
	  .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> {
		text-decoration: none;
		position: absolute;
		z-index: 11;
		display: inline-block;
		<?php  if($paramssld['slider_title_has_margin']=='on'){
				$slider_title_width=($paramssld['slider_title_width']-6);
				$slider_title_height=($paramssld['slider_title_height']-6);
				$slider_title_margin="3";
			}else{
				$slider_title_width=($paramssld['slider_title_width']);
				$slider_title_height=($paramssld['slider_title_height']);
				$slider_title_margin="0";
			}  ?>
		
		width:<?php echo $slider_title_width; ?>%;
		/*height:<?php echo $slider_title_height; ?>%;*/
		
		<?php 
			if($slideshow_title_position[0]=="left"){echo 'left:'.$slider_title_margin.'%;';}
			elseif($slideshow_title_position[0]=="center"){echo 'left:50%;';}
			elseif($slideshow_title_position[0]=="right"){echo 'right:'.$slider_title_margin.'%;';}
			
			if($slideshow_title_position[1]=="top"){echo 'top:'.$slider_title_margin.'%;';}
			elseif($slideshow_title_position[1]=="middle"){echo 'top:50%;';}
			elseif($slideshow_title_position[1]=="bottom"){echo 'bottom:'.$slider_title_margin.'%;';}
		 ?>
		padding:2%;
		text-align:<?php echo $paramssld['slider_title_text_align']; ?>;  
		font-weight:bold;
		color:#<?php echo $paramssld['slider_title_color']; ?>;
			
		background:<?php 			
				list($r,$g,$b) = array_map('hexdec',str_split($paramssld['slider_title_background_color'],2));
				$titleopacity=$paramssld["slider_title_background_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
		?>;
		border-style:solid;
		font-size:<?php echo $paramssld['slider_title_font_size']; ?>px;
		border-width:<?php echo $paramssld['slider_title_border_size']; ?>px;
		border-color:#<?php echo $paramssld['slider_title_border_color']; ?>;
		border-radius:<?php echo $paramssld['slider_title_border_radius']; ?>px;
	  }
	  	  
	  .huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?> {
		text-decoration: none;
		position: absolute;
		z-index: 11;
		border-style:solid;
		display: inline-block;
		<?php  if($paramssld['slider_description_has_margin']=='on'){
				$slider_description_width=($paramssld['slider_description_width']-6);
				$slider_description_height=($paramssld['slider_description_height']-6);
				$slider_description_margin="3";
			}else{
				$slider_description_width=($paramssld['slider_description_width']);
				$slider_descriptione_height=($paramssld['slider_description_height']);
				$slider_description_margin="0";
			}  ?>
		
		width:<?php echo $slider_description_width; ?>%;
		/*height:<?php echo $slider_description_height; ?>%;*/
		<?php 
			if($slideshow_description_position[0]=="left"){echo 'left:'.$slider_description_margin.'%;';}
			elseif($slideshow_description_position[0]=="center"){echo 'left:50%;';}
			elseif($slideshow_description_position[0]=="right"){echo 'right:'.$slider_description_margin.'%;';}
			
			if($slideshow_description_position[1]=="top"){echo 'top:'.$slider_description_margin.'%;';}
			elseif($slideshow_description_position[1]=="middle"){echo 'top:50%;';}
			elseif($slideshow_description_position[1]=="bottom"){echo 'bottom:'.$slider_description_margin.'%;';}
		 ?>
		padding:3%;
		text-align:<?php echo $paramssld['slider_description_text_align']; ?>;  
		color:#<?php echo $paramssld['slider_description_color']; ?>;
		
		background:<?php 
			list($r,$g,$b) = array_map('hexdec',str_split($paramssld['slider_description_background_color'],2));	
			$descriptionopacity=$paramssld["slider_description_background_transparency"]/100;
			echo 'rgba('.$r.','.$g.','.$b.','.$descriptionopacity.') !important';
		?>;
		border-style:solid;
		font-size:<?php echo $paramssld['slider_description_font_size']; ?>px;
		border-width:<?php echo $paramssld['slider_description_border_size']; ?>px;
		border-color:#<?php echo $paramssld['slider_description_border_color']; ?>;
		border-radius:<?php echo $paramssld['slider_description_border_radius']; ?>px;
	  }
	  
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>.none, .huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>.none,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?>.hidden, .huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?>.hidden	   {display:none;}
	      
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h1, .huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?> h1,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h2, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h2,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h3, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h3,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h4, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> h4,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> p, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> p,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> strong,  .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> strong,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> span, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> span,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> ul, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> ul,
	   .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> li, .huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> li {
			padding:2px;
			margin:0px;
	   }

	  .huge_it_slide_container_gallery_<?php echo $sliderID; ?> {
		display: table-cell;
		margin: 0 auto;
		position: relative;
		vertical-align: middle;
		width:100%;
		height:100%;
		_width: inherit;
		_height: inherit;
	  }
	  .huge_it_slide_bg_gallery_<?php echo $sliderID; ?> {
		margin: 0 auto;
		width:100%;
		height:100%;
		_width: inherit;
		_height: inherit;
	  }
	  .huge_it_slider_gallery_<?php echo $sliderID; ?> {
		width:100%;
		height:100%;
		display:table;
		padding:0px;
		margin:0px;
		
	  }
	  .huge_it_slideshow_image_item_gallery_<?php echo $sliderID; ?> {
		width:100%;
		height:100%;
		width: inherit;
		height: inherit;
		display: table-cell;
		filter: Alpha(opacity=100);
		opacity: 1;
		position: absolute;
		top:0px;
		left:0px;
		vertical-align: middle;
		z-index: 2;
		margin:0px !important;
		padding:0px;
		overflow:hidden;
		border-radius: <?php echo $paramssld['slider_slideshow_border_radius']; ?>px !important;
	  }
	  .huge_it_slideshow_image_second_item_gallery_<?php echo $sliderID; ?> {
		width:100%;
		height:100%;
		_width: inherit;
		_height: inherit;
		display: table-cell;
		filter: Alpha(opacity=0);
		opacity: 0;
		position: absolute;
		top:0px;
		left:0px;
		vertical-align: middle;
		z-index: 1;
		overflow:hidden;
		margin:0px !important;
		padding:0px;
		border-radius: <?php echo $paramssld['slider_slideshow_border_radius']; ?>px !important;
	  }
	  .huge_it_grid_gallery_<?php echo $sliderID; ?> {
		display: none;
		height: 100%;
		overflow: hidden;
		position: absolute;
		width: 100%;
	  }
	  .huge_it_gridlet_gallery_<?php echo $sliderID; ?> {
		opacity: 1;
		filter: Alpha(opacity=100);
		position: absolute;
	  }
	  
					
	  .huge_it_slideshow_dots_container_gallery_<?php echo $sliderID; ?> {
		display: table;
		position: absolute;
		width:100% !important;
		height:100% !important;
	  }
	  .huge_it_slideshow_dots_thumbnails_gallery_<?php echo $sliderID; ?> {
		margin: 0 auto;
		overflow: hidden;
		position: absolute;
		width:100%;
		height:30px;
	  }
	  
	  .huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?> {
		display: inline-block;
		position: relative;
		cursor: pointer;
		box-shadow: 1px 1px 1px rgba(0,0,0,0.1) inset, 1px 1px 1px rgba(255,255,255,0.1);
		width:10px;
		height: 10px;
		border-radius: 10px;
		background: #00f;
		margin: 10px;
		overflow: hidden;
		z-index: 17;
	  }
	  
	  .huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?> {
		opacity: 1;
		background:#0f0;
		filter: Alpha(opacity=100);
	  }
	  .huge_it_slideshow_dots_deactive_gallery_<?php echo $sliderID; ?> {
	  
	  }
	  
	  .huge_it_slideshow_image_item1_gallery_<?php echo $sliderID; ?> {
		 display: table; 
		 width: inherit; 
		 height: inherit;
	  }
	  .huge_it_slideshow_image_item2_gallery_<?php echo $sliderID; ?> {
		 display: table-cell; 
		 vertical-align: middle; 
		 text-align: center;
	  }
	  
	  .huge_it_slideshow_image_item2_gallery_<?php echo $sliderID; ?> a {
		display:block;
		vertical-align:middle;
		width:100%;
		height:100%;
	  }
		
		
		.huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?> {
			background:#<?php echo $paramssld['slider_slider_background_color']; ?>;
			border-width:<?php echo $paramssld['slider_slideshow_border_size']; ?>px;
			border-color:#<?php echo $paramssld['slider_slideshow_border_color']; ?>;
			border-radius:<?php echo $paramssld['slider_slideshow_border_radius']; ?>px;
		}
		
		.huge_it_slideshow_dots_thumbnails_gallery_<?php echo $sliderID; ?> {
			<?php if($paramssld['slider_dots_position']=="bottom"){?>
			bottom:0px;
			<?php }else if($paramssld['slider_dots_position']=="none"){?>
			display:none;
			<?php
			}else{ ?>
			top:0px; <?php } ?>
		}
		
		.huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?> {
			background:#<?php echo $paramssld['slider_dots_color']; ?>;
		}
		
		.huge_it_slideshow_dots_active_gallery_<?php echo $sliderID; ?> {
			background:#<?php echo $paramssld['slider_active_dot_color']; ?>;
		}
		
		<?php
		
		$arrowfolder=plugins_url('gallery-images/Front_images/arrows');
		switch ($paramssld['slider_navigation_type']) {
			case 1:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-21px;
						height:43px;
						width:29px;
						background:url(<?php echo $arrowfolder;?>/arrows.simple.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-21px;
						height:43px;
						width:29px;
						background:url(<?php echo $arrowfolder;?>/arrows.simple.png) right top no-repeat; 
					}
				<?php
				break;
			case 2:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-25px;
						height:50px;
						width:50px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.shadow.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-25px;
						height:50px;
						width:50px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.shadow.png) right top no-repeat; 
					}

					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>:hover {
						background-position:left -50px;
					}

					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>:hover {
						background-position:right -50px;
					}
				<?php
				break;
			case 3:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-22px;
						height:44px;
						width:44px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.simple.dark.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-22px;
						height:44px;
						width:44px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.simple.dark.png) right top no-repeat; 
					}

					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>:hover {
						background-position:left -44px;
					}

					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>:hover {
						background-position:right -44px;
					}
				<?php
				break;
			case 4:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-33px;
						height:65px;
						width:59px;
						background:url(<?php echo $arrowfolder;?>/arrows.cube.dark.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-33px;
						height:65px;
						width:59px;
						background:url(<?php echo $arrowfolder;?>/arrows.cube.dark.png) right top no-repeat; 
					}

					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>:hover {
						background-position:left -66px;
					}

					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>:hover {
						background-position:right -66px;
					}
				<?php
				break;
			case 5:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-18px;
						height:37px;
						width:40px;
						background:url(<?php echo $arrowfolder;?>/arrows.light.blue.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-18px;
						height:37px;
						width:40px;
						background:url(<?php echo $arrowfolder;?>/arrows.light.blue.png) right top no-repeat; 
					}

				<?php
				break;
			case 6:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-25px;
						height:50px;
						width:50px;
						background:url(<?php echo $arrowfolder;?>/arrows.light.cube.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-25px;
						height:50px;
						width:50px;
						background:url(<?php echo $arrowfolder;?>/arrows.light.cube.png) right top no-repeat; 
					}

					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>:hover {
						background-position:left -50px;
					}

					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>:hover {
						background-position:right -50px;
					}
				<?php
				break;
			case 7:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						right:0px;
						margin-top:-19px;
						height:38px;
						width:38px;
						background:url(<?php echo $arrowfolder;?>/arrows.light.transparent.circle.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-19px;
						height:38px;
						width:38px;
						background:url(<?php echo $arrowfolder;?>/arrows.light.transparent.circle.png) right top no-repeat; 
					}
				<?php
				break;
			case 8:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-22px;
						height:45px;
						width:45px;
						background:url(<?php echo $arrowfolder;?>/arrows.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-22px;
						height:45px;
						width:45px;
						background:url(<?php echo $arrowfolder;?>/arrows.png) right top no-repeat; 
					}
				<?php
				break;
			case 9:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-22px;
						height:45px;
						width:45px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.blue.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-22px;
						height:45px;
						width:45px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.blue.png) right top no-repeat; 
					}
				<?php
				break;
			case 10:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-24px;
						height:48px;
						width:48px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.green.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-24px;
						height:48px;
						width:48px;
						background:url(<?php echo $arrowfolder;?>/arrows.circle.green.png) right top no-repeat; 
					}

					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>:hover {
						background-position:left -48px;
					}

					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>:hover {
						background-position:right -48px;
					}
				<?php
				break;
			case 11:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-29px;
						height:58px;
						width:55px;
						background:url(<?php echo $arrowfolder;?>/arrows.blue.retro.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-29px;
						height:58px;
						width:55px;
						background:url(<?php echo $arrowfolder;?>/arrows.blue.retro.png) right top no-repeat; 
					}
				<?php
				break;
			case 12:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-37px;
						height:74px;
						width:74px;
						background:url(<?php echo $arrowfolder;?>/arrows.green.retro.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-37px;
						height:74px;
						width:74px;
						background:url(<?php echo $arrowfolder;?>/arrows.green.retro.png) right top no-repeat; 
					}
				<?php
				break;
			case 13:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-16px;
						height:33px;
						width:33px;
						background:url(<?php echo $arrowfolder;?>/arrows.red.circle.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-16px;
						height:33px;
						width:33px;
						background:url(<?php echo $arrowfolder;?>/arrows.red.circle.png) right top no-repeat; 
					}
				<?php
				break;
			case 14:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-51px;
						height:102px;
						width:52px;
						background:url(<?php echo $arrowfolder;?>/arrows.triangle.white.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-51px;
						height:102px;
						width:52px;
						background:url(<?php echo $arrowfolder;?>/arrows.triangle.white.png) right top no-repeat; 
					}
				<?php
				break;
			case 15:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:0px;
						margin-top:-19px;
						height:39px;
						width:70px;
						background:url(<?php echo $arrowfolder;?>/arrows.ancient.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:0px;
						margin-top:-19px;
						height:39px;
						width:70px;
						background:url(<?php echo $arrowfolder;?>/arrows.ancient.png) right top no-repeat; 
					}
				<?php
				break;
			case 16:
				?>
					#huge_it_slideshow_left_gallery_<?php echo $sliderID; ?> {	
						left:-21px;
						margin-top:-20px;
						height:40px;
						width:37px;
						background:url(<?php echo $arrowfolder;?>/arrows.black.out.png) left  top no-repeat; 
					}
					
					#huge_it_slideshow_right_gallery_<?php echo $sliderID; ?> {
						right:-21px;
						margin-top:-20px;
						height:40px;
						width:37px;
						background:url(<?php echo $arrowfolder;?>/arrows.black.out.png) right top no-repeat; 
					}
				<?php
				break;
		}
?>
	</style>

	<div class="huge_it_slideshow_image_wrap_gallery_<?php echo $sliderID; ?>">
      <?php
      $current_pos = 0;
      ?>
		<!-- ##########################DOTS######################### -->
        <div class="huge_it_slideshow_dots_container_gallery_<?php echo $sliderID; ?>">
			  <div class="huge_it_slideshow_dots_thumbnails_gallery_<?php echo $sliderID; ?>">
				<?php
				$current_image_id=0;
				$current_pos =0;
				$current_key=0;
				$stri=0;
				foreach ($images as $key => $image_row) {
			  	$imagerowstype=$image_row->sl_type;
				if($image_row->sl_type == ''){
				$imagerowstype='image';
				}
				switch($imagerowstype){
							
							case 'image':
											
							  if ($image_row->id == $current_image_id) {
								$current_pos = $stri;
								$current_key = $stri;
							  }
							
							?>
								<div id="huge_it_dots_<?php echo $stri; ?>_gallery_<?php echo $sliderID; ?>" class="huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?> <?php echo (($key==$current_image_id) ? 'huge_it_slideshow_dots_active_gallery_'. $sliderID : 'huge_it_slideshow_dots_deactive_gallery_' . $sliderID); ?>" onclick="huge_it_change_image_gallery_<?php echo $sliderID; ?>(parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()), '<?php echo $stri; ?>', data_gallery_<?php echo $sliderID; ?>,false,true);return false;" image_id="<?php echo $image_row->id; ?>" image_key="<?php echo $stri; ?>"></div>
							<?php
							  $stri++;
							break;
							case 'video':
											
							  if ($image_row->id == $current_image_id) {
								$current_pos = $stri;
								$current_key = $stri;
							  }
							
							?>
								<div id="huge_it_dots_<?php echo $stri; ?>_gallery_<?php echo $sliderID; ?>" class="huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?> <?php echo (($key==$current_image_id) ? 'huge_it_slideshow_dots_active_gallery_' . $sliderID : 'huge_it_slideshow_dots_deactive_gallery_' . $sliderID); ?>" onclick="huge_it_change_image_gallery_<?php echo $sliderID; ?>(parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()), '<?php echo $stri; ?>', data_gallery_<?php echo $sliderID; ?>,false,true);return false;" image_id="<?php echo $image_row->id; ?>" image_key="<?php echo $stri; ?>"></div>
							<?php
							  $stri++;
							break;
							case 'last_posts':
							
							foreach($recent_posts as $lkeys => $last_posts){
							if($lkeys < $image_row->sl_url){
							if(get_the_post_thumbnail($last_posts["ID"], 'thumbnail') != ''){
							$imagethumb = wp_get_attachment_image_src( get_post_thumbnail_id($last_posts["ID"]), 'thumbnail-size', true );
											
							  if ($image_row->id == $current_image_id) {
								$current_pos = $stri;
								$current_key = $stri;
							  }
							?>
								<div id="huge_it_dots_<?php echo $stri; ?>_gallery_<?php echo $sliderID; ?>" class="huge_it_slideshow_dots_gallery_<?php echo $sliderID; ?> <?php echo (($stri==$current_image_id) ? 'huge_it_slideshow_dots_active_gallery_' . $sliderID : 'huge_it_slideshow_dots_deactive_gallery_' . $sliderID); ?>" onclick="huge_it_change_image_gallery_<?php echo $sliderID; ?>(parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()), '<?php echo $stri; ?>', data_gallery_<?php echo $sliderID; ?>,false,true);return false;" image_id="<?php echo $image_row->id; ?>" image_key="<?php echo $stri; ?>"></div>
							<?php
							  $stri++;
							}
							}
							}
							
							break;
					}
				}
				?>
			  </div>
			
			<?php
			   if ($paramssld['slider_show_arrows']=="on") {
			 ?>
				<a id="huge_it_slideshow_left_gallery_<?php echo $sliderID; ?>" href="#" onclick="huge_it_change_image_gallery_<?php echo $sliderID; ?>(parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()), (parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()) - iterator_gallery_<?php echo $sliderID; ?>()) >= 0 ? (parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()) - iterator_gallery_<?php echo $sliderID; ?>()) % data_gallery_<?php echo $sliderID; ?>.length : data_gallery_<?php echo $sliderID; ?>.length - 1, data_gallery_<?php echo $sliderID; ?>,false,true);return false;">
					<div id="huge_it_slideshow_left-ico_gallery_<?php echo $sliderID; ?>">
					<div><i class="huge_it_slideshow_prev_btn_gallery_<?php echo $sliderID; ?> fa"></i></div></div>
				</a>
				
				<a id="huge_it_slideshow_right_gallery_<?php echo $sliderID; ?>" href="#" onclick="huge_it_change_image_gallery_<?php echo $sliderID; ?>(parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()), (parseInt(jQuery('#huge_it_current_image_key_gallery_<?php echo $sliderID; ?>').val()) + iterator_gallery_<?php echo $sliderID; ?>()) % data_gallery_<?php echo $sliderID; ?>.length, data_gallery_<?php echo $sliderID; ?>,false,true);return false;">
					<div id="huge_it_slideshow_right-ico_<?php echo $sliderID;?> , data_<?php echo $sliderID;?>">
					<div><i class="huge_it_slideshow_next_btn_gallery_<?php echo $sliderID; ?> fa"></i></div></div>
				</a>
			<?php
			}
			?>
		</div>
	  <!-- ##########################IMAGES######################### -->
      <div id="huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>" class="huge_it_slideshow_image_container_gallery_<?php echo $sliderID; ?>">        
        <div class="huge_it_slide_container_gallery_<?php echo $sliderID; ?>">
          <div class="huge_it_slide_bg_gallery_<?php echo $sliderID; ?>">
            <ul class="huge_it_slider_gallery_<?php echo $sliderID; ?>">
			<?php
				$i=0;
				foreach ($images as $key => $image_row) {
					$imagerowstype=$image_row->sl_type;
					if($image_row->sl_type == ''){
					$imagerowstype='image';
					}
					switch($imagerowstype){
						case 'image':
						$target="";
						?>
						  <li class="huge_it_slideshow_image<?php if ($i != $current_image_id) {$current_key = $key; echo '_second';} ?>_item_gallery_<?php echo $sliderID; ?>" id="image_id_gallery_<?php echo $sliderID.'_'.$i ?>">      
							<?php if($image_row->sl_url!=""){ 
								if ($image_row->link_target=="on"){$target='target="_blank'.$image_row->link_target.'"';}
								echo '<a href="'.$image_row->sl_url.'" '.$target.'>';
							} ?>
							<img id="huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>" class="huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>" src="<?php echo $image_row->image_url; ?>" image_id="<?php echo $image_row->id; ?>" />
							<?php if($image_row->sl_url!=""){ echo '</a>'; }?>		
							<div class="huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> <?php if(trim($image_row->name)=="") echo "none"; ?>">
								<?php echo $image_row->name; ?>
							</div>
							<div class="huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?> <?php if(trim($image_row->description)=="") echo "none"; ?>">
								<?php echo $image_row->description; ?>
							</div>
						  </li>
						  <?php
						$i++;
						break;

						case 'last_posts':
						foreach($recent_posts as $lkeys => $last_posts){
							if($lkeys < $image_row->sl_url){
								$imagethumb = wp_get_attachment_image_src( get_post_thumbnail_id($last_posts["ID"]), 'thumbnail-size', true );
								if(get_the_post_thumbnail($last_posts["ID"], 'thumbnail') != ''){
								$target="";
								?>
								  <li class="huge_it_slideshow_image<?php if ($i != $current_image_id) {$current_key = $key; echo '_second';} ?>_item_gallery_<?php echo $sliderID; ?>" id="image_id_gallery_<?php echo $sliderID.'_'.$i ?>">      
									<?php if ($image_row->sl_postlink=="1"){
											if ($image_row->link_target=="on"){$target='target="_blank'.$image_row->link_target.'"';}
											echo '<a href="'.$last_posts["guid"].'" '.$target.'>';
									} ?>
									<img id="huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>" class="huge_it_slideshow_image_gallery_<?php echo $sliderID; ?>" src="<?php echo $imagethumb[0]; ?>" image_id="<?php echo $image_row->id; ?>" />
									<?php if($image_row->sl_postlink=="1"){ echo '</a>'; }?>		
									<div class="huge_it_slideshow_title_text_gallery_<?php echo $sliderID; ?> <?php if(trim($last_posts["post_title"])=="") echo "none";  if($image_row->sl_stitle!="1") echo " hidden"; ?>">
											<?php echo $last_posts["post_title"]; ?>
									</div>
									<div class="huge_it_slideshow_description_text_gallery_<?php echo $sliderID; ?> <?php if(trim($last_posts["post_content"])=="") echo "none"; if($image_row->sl_sdesc!="1") echo " hidden"; ?>">
										<?php 
										echo substr_replace($last_posts["post_content"], "", $image_row->description); ?>
									</div>
								 </li>
								  <?php
								$i++;
								}
							}
						}
						break;
						case 'video':
							?>
							<li  class="huge_it_slideshow_image<?php if ($i != $current_image_id) {$current_key = $key; echo '_second';} ?>_item_gallery_<?php echo $sliderID; ?>" id="image_id_gallery_<?php echo $sliderID.'_'.$i ?>">      
								<?php 
									if(strpos($image_row->image_url,'youtube') !== false){
										$video_thumb_url=get_youtube_id_from_url($image_row->image_url); 
									?>
										
										<div id="video_id_gallery_<?php echo $sliderID;?>_<?php echo $key ;?>" class="huge_it_video_frame_gallery_<?php echo $sliderID; ?>"></div>
								<?php }else {
										$vimeo = $image_row->image_url;
                                                                                $openError = explode( "/", $vimeo );
										$imgid =  end($openError);
										
								?>					
									<iframe id="player_<?php echo $key ;?>"  class="huge_it_video_frame_gallery_<?php echo $sliderID; ?>" src="//player.vimeo.com/video/<?php echo $imgid; ?>?api=1&player_id=player_<?php echo $key ;?>&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
								<?php } ?>
							</li>
						<?php
						$i++;
						break;
					} 
				} 
			?>
			   <input type="hidden" id="huge_it_current_image_key_gallery_<?php echo $sliderID; ?>" value="0" />
            </ul>
          </div>
        </div>
      </div>
	</div>
		<?php
		break;	
		/* ########## VIEW 4 Thumbnails VIEW ##########*/
		case 4:
		?>
		<link href="<?php echo plugins_url('../style/thumb_view.css', __FILE__);?>" rel="stylesheet" type="text/css" />
		<script src="<?php echo plugins_url('../js/thumb_view.min.js', __FILE__);?>"></script>
		<script src="<?php echo plugins_url('../js/jquery.lazyload.min.js', __FILE__);?>"></script>
		
		<style>
			section #huge_it_gallery {
				padding: 0px !important;
				min-width: 100%;
				width: 100%;
				min-height: 100%;
				text-align: center;
				margin-bottom: 30px;
				<?php if($paramssld["thumb_box_has_background"] == 'on'){ ?>  background-color: #<?php echo $paramssld["thumb_box_background"]; ?>; <?php } ?>
				<?php if($paramssld["thumb_box_use_shadow"] == 'on'){ echo 'box-shadow: 0 0 10px;'; } ?>
			}
				

			#huge_it_gallery .huge_it_big_li {
				overflow:hidden;
				width: <?php echo $paramssld["thumb_image_width"]; ?>px;	
				height: <?php echo $paramssld["thumb_image_height"]; ?>px;
				margin: <?php echo $paramssld["thumb_margin_image"]; ?>px !important;
				border-radius: <?php echo $paramssld["thumb_image_border_radius"]; ?>px;
				padding:0px !important
			}
			
			section #huge_it_gallery li .overLayer ul li h2,
			section #huge_it_gallery li .infoLayer ul li h2 {
				font-size: <?php echo $paramssld["thumb_title_font_size"]; ?>px;
				color: #<?php echo $paramssld["thumb_title_font_color"]; ?>;
			}
			
			section #huge_it_gallery li .infoLayer ul li p {
				color: #<?php echo $paramssld["thumb_title_font_color"]; ?>;
			}
			
			section #huge_it_gallery li .overLayer,
			section #huge_it_gallery li .infoLayer {
				-webkit-transition: opacity 0.3s linear;
				-moz-transition: opacity 0.3s linear;
				-ms-transition: opacity 0.3s linear;
				-o-transition: opacity 0.3s linear;
				transition: opacity 0.3s linear;
				width: <?php echo $paramssld["thumb_image_width"]; ?>px;
				height: <?php echo $paramssld["thumb_image_height"]; ?>px;
				position: absolute;
				text-align: center;
				opacity: 0;
				top: 0px;
				left: 0;
				z-index: 4;
			}
			
			section #huge_it_gallery li a {
				position: absolute;
				display: block;
				width: <?php echo $paramssld["thumb_image_width"]; ?>px;
				height: <?php echo $paramssld["thumb_image_height"]; ?>px;
				top: 0px;
				left: 0px;
				z-index: 6; 
				border-radius: <?php echo $paramssld["thumb_image_border_radius"]; ?>px;
			}
			
			#huge_it_gallery li img {
				width: <?php echo $paramssld["thumb_image_width"] - 2*$paramssld["thumb_image_border_width"]; ?>px;	
			<?php if($paramssld["thumb_image_behavior"]=='on'){?>
				height: <?php echo $paramssld["thumb_image_height"] - 2*$paramssld["thumb_image_border_width"]; ?>px;
			<?php } ?>
				border: <?php echo $paramssld["thumb_image_border_width"]; ?>px solid #<?php echo $paramssld["thumb_image_border_color"]; ?>;
				border-radius: <?php echo $paramssld["thumb_image_border_radius"]; ?>px;
				margin:0px !important;
			}
			
			
  			section #huge_it_gallery li:hover .overLayer {
				-webkit-transition: opacity 0.3s linear;
				-moz-transition: opacity 0.3s linear;
				-ms-transition: opacity 0.3s linear;
				-o-transition: opacity 0.3s linear;
				transition: opacity 0.3s linear;
				opacity: <?php echo ($paramssld["thumb_title_background_transparency"]/100)+0.001; ?>;
				display: block;
				background: #<?php echo $paramssld["thumb_title_background_color"]; ?>; 
                                border-radius: <?php echo $paramssld["thumb_image_border_radius"]; ?>px;
			}
			section #huge_it_gallery li:hover .infoLayer {
				-webkit-transition: opacity 0.3s linear;
				-moz-transition: opacity 0.3s linear;
				ms-transition: opacity 0.3s linear;
				-o-transition: opacity 0.3s linear;
				transition: opacity 0.3s linear;
				opacity: 1;
				display: block; 
			}
			
			section #huge_it_gallery p {text-align:center;}
		</style>
		<section>
			<ul id="huge_it_gallery">
				<li id="fullPreview"></li>
				<?php  foreach($images as $key=>$row) { 
				$imgurl=explode(";",$row->image_url); ?>
				<li class="huge_it_big_li">
				<?php 
					$imagerowstype=$row->sl_type; 
					if($row->sl_type == ''){$imagerowstype='image';}
					
					switch($imagerowstype){
						case 'image': 
					?>									
						<a class="group1" href="<?php echo $row->image_url; ?>"></a>
						<img src="<?php echo $row->image_url; ?>" alt="<?php echo $row->name; ?>" />
					<?php 
						break;
						case 'video':
					?>
							<?php
								$videourl=get_video_id_from_url($row->image_url);
								if($videourl[1]=='youtube'){?>
									<a class="youtube huge_it_gallery_item group1"  href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>"></a>
									<img src="http://img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg" alt="" />				
								<?php
								}else {
									$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$videourl[0].".php"));
									$imgsrc=$hash[0]['thumbnail_large'];
								?>
									<a class="vimeo huge_it_gallery_item group1" href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>"></a>
									<img src="<?php echo $imgsrc; ?>" alt="" />
								<?php
								}
							?>
					<?php
						break;
					}
					?>
					<div class="overLayer"></div>
					<div class="infoLayer">
						<ul>
							<li>
								<h2>
									<?php echo $row->name; ?>
								</h2>
							</li>
							<li>
								<p>
									<?php echo $paramssld["thumb_view_text"]; ?>
								</p>
							</li>
						</ul>
					</div>
				</li>
				<?php }  ?>
				
			</ul>
		</section>
		<?php
		break;
                
                        ///////////////////////////// view 8 justified's view ///////////////////////////////////////
        
        case 6:
    ?>
        <?php $path_site = plugins_url("", __FILE__); ?>
        <link rel="stylesheet" href="<?php echo $path_site ; ?>/../style/justifiedGallery.css" />
		<script>
			var imagemargin=<?php echo $paramssld["ht_view8_element_padding"]; ?>;
			var imagerandomize=<?php echo $paramssld["ht_view8_element_randomize"]; ?>;
			var imagecssAnimation=<?php echo $paramssld["ht_view8_element_cssAnimation"]; ?>;
			var imagecssAnimationSpeed=<?php echo $paramssld["ht_view8_element_animation_speed"]; ?>;
			var imageheight= <?php echo $paramssld["ht_view8_element_height"]; ?>;
			var imagejustify= <?php echo $paramssld["ht_view8_element_justify"]; ?>;
			var imageshowcaption= <?php echo $paramssld["ht_view8_element_show_caption"]; ?>;
			//var imagemaxheight=<?php //echo $paramssld["ht_view8_element_maxheight"]; ?>;
			//var imagefixed=<?php //echo $paramssld["ht_view8_element_size_fix"]; ?>;
		</script>
	    <script src="<?php echo $path_site ; ?>/../js/justifiedGallery.js"></script>
        
<style>
	.justified-gallery {
		width: 100%;
		position: relative;
	}
	.justified-gallery > a,
	.justified-gallery > div {
		position: absolute;
		display: inline-block;
		opacity: 0;
		overflow:hidden;
		filter: alpha(opacity=0);
		/* IE8 or Earlier */
	}
	.justified-gallery > a > img,
	.justified-gallery > div > img {
	   /* width: 200px !important;*/
		position: absolute;
		top: 50%;
		left: 50%;
		padding: 0;
		//border: <?php// echo $paramssld["ht_view8_element_border_width"]; ?>px solid #<?php// echo $paramssld["ht_view8_element_border_color"]; ?>;
		//border-radius: <?php// echo $paramssld["ht_view8_element_border_radius"]; ?>px;
	}
	.justified-gallery > a > .caption,
	.justified-gallery > div > .caption {
		display: none;
		position: absolute;
		bottom: 0;
		padding: 5px;
		left: 0;
		right: 0;
		margin: 0;
		color: #<?php echo $paramssld["ht_view8_element_title_font_color"]; ?>;
		font-size: <?php echo $paramssld["ht_view8_element_title_font_size"]; ?>px;
		font-weight: 300;
		font-family: sans-serif;
		//margin-left: <?php //echo $paramssld["ht_view8_element_border_width"]; ?>px;
		background:<?php 			
				list($r,$g,$b) = array_map('hexdec',str_split($paramssld['ht_view8_element_title_background_color'],2));
				$titleopacity=$paramssld["ht_view8_element_title_overlay_transparency"]/100;						
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';	
		?>;
		
		overflow: hidden;
		text-overflow: ellipsis;
		white-space:nowrap;
	}
	.justified-gallery > a > .caption.caption-visible,
	.justified-gallery > div > .caption.caption-visible {
		display: initial;
		opacity: 0.7;
		filter: "alpha(opacity=70)";
		/* IE8 or Earlier */
		-webkit-animation: justified-gallery-show-caption-animation 500ms 0 ease;
		-moz-animation: justified-gallery-show-caption-animation 500ms 0 ease;
		-ms-animation: justified-gallery-show-caption-animation 500ms 0 ease;
	}
	.justified-gallery > .entry-visible {
		opacity: 1.0;
		filter: alpha(opacity=100);
		/* IE8 or Earlier */
		-webkit-animation: justified-gallery-show-entry-animation 300ms 0 ease;
		-moz-animation: justified-gallery-show-entry-animation 300ms 0 ease;
		-ms-animation: justified-gallery-show-entry-animation 300ms 0 ease;
	}
	.justified-gallery > .spinner {
		position: absolute;
		bottom: 0;
		margin-left: -24px;
		padding: 10px 0 10px 0;
		left: 50%;
		opacity: initial;
		filter: initial;
		overflow: initial;
	}
	.justified-gallery > .spinner > span {
		display: inline-block;
		opacity: 0;
		filter: alpha(opacity=0);
		/* IE8 or Earlier */
		width: 8px;
		height: 8px;
		margin: 0 4px 0 4px;
		background-color: #000;
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		border-bottom-right-radius: 6px;
		border-bottom-left-radius: 6px;
	}
        .play-icon {
                position:absolute;
                top:0px;
                left:0px;
                width:100%;
                height:100%;	

        }

        .play-icon.youtube-icon {background:url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/play.youtube.png) center center no-repeat;}
        .play-icon.vimeo-icon {background:url(<?php echo plugin_dir_url( __FILE__ ); ?>../images/play.vimeo.png) center center no-repeat;}
</style>


<?php
    $path_site = plugins_url("", __FILE__);
?>
                <div id="mygallery_<?php echo $galleryID; ?>" class="clearfix">
                    <?php
                    foreach($images as $key=>$row)
                    {
                        $imgurl=explode(";",$row->image_url);
                        $link = $row->sl_url;
                        $descnohtml=strip_tags($row->description);
                        $result = substr($descnohtml, 0, 50);
                        $imagerowstype=$row->sl_type;
                        if($row->sl_type == ''){$imagerowstype='image';}
                        switch($imagerowstype){
                            case 'image':
                    ?>
                                <?php 	if($row->image_url != ';'){ ?>
                                <a class="group1" href="<?php echo $imgurl[0]; ?>">
                                    <img id="wd-cl-img<?php echo $key; ?>" alt="<?php echo $row->name; ?>" src="<?php echo $imgurl[0]; ?>"/>
                                </a>
                                <?php } else { ?>
                                <img id="wd-cl-img<?php echo $key; ?>" src="images/noimage.jpg" alt="" />
                                <?php
                                } ?>
                                <?php break;
                            
                            case 'video':
                            
                                $videourl=get_video_id_from_url($row->image_url);
                                if($videourl[1]=='youtube'){?>
                                        <a class="youtube huge_it_gallery_item group1"  href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>">
                                                <img src="http://img.youtube.com/vi/<?php echo $videourl[0]; ?>/mqdefault.jpg" alt="<?php echo $row->name; ?>" />
                                                <div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
                                        </a>
                                <?php }
                                else {
                                        $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$videourl[0].".php"));
                                        $imgsrc=$hash[0]['thumbnail_large'];
                                ?>
                                        <a class="vimeo huge_it_gallery_item group1" href="http://player.vimeo.com/video/<?php echo $videourl[0]; ?>">
                                                <img src="<?php echo $imgsrc; ?>" alt="<?php echo $row->name; ?>" />
                                                <div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
                                        </a>
                                <?php
                                }
                        }
                    }
                    ?>
                </div>


<script>
    jQuery(document).ready(function(){

    jQuery("#mygallery_<?php echo $galleryID; ?>").justifiedGallery();

}); 
</script>
  <?php	  
	break;
}
 ?>
      <?php   
	return ob_get_clean();
}  
?>