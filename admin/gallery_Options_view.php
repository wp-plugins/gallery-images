<?php
if (function_exists('current_user_can'))
    if (!current_user_can('manage_options')) {
        die('Access Denied');
    }
if (!function_exists('current_user_can')) {
    die('Access Denied');
}
function      html_showStyles($param_values, $op_type)
{
    ?>
<script>
jQuery(document).ready(function () {
	var strliID=jQuery(location).attr('hash');
//	alert(strliID);  //  #gallery-view-options-x
	jQuery('#gallery-view-tabs li').removeClass('active');
	if(jQuery('#gallery-view-tabs li a[href="'+strliID+'"]').length>0){
		jQuery('#gallery-view-tabs li a[href="'+strliID+'"]').parent().addClass('active');
	}else {
		jQuery('a[href="#gallery-view-options-0"]').parent().addClass('active');
	}
        strliID = strliID.split('#').join('.');
	jQuery('#gallery-view-tabs-contents > li').removeClass('active');
	 //.replace("#","")
	//alert(strliID);
	if(jQuery(strliID).length>0){
		jQuery(strliID).addClass('active');
	}else {
		jQuery('.gallery-view-options-0').addClass('active');
	}
        
	jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
		 jQuery(this).parent().find('span').html(parseInt(data.value)+"%");
		 jQuery(this).val(parseInt(data.value));
	});	
});
</script>
<div class="wrap">
	<?php $path_site = plugins_url("../images", __FILE__); ?>
	<div class="slider-options-head">
		<div style="float: left;">
			<div><a href="http://huge-it.com/wordpress-plugins-gallery-user-manual/" target="_blank">User Manual</a></div>
			<div>This section allows you to configure the Image Gallery options. <a href="http://huge-it.com/wordpress-plugins-gallery-user-manual/" target="_blank">More...</a></div>
			<div>These options are made for pro users, and are displayed only for demonstration. Unfortunatelly free users are unable to use them.</div>
		</div>
		<div style="float: right;">
			<a class="header-logo-text" href="http://huge-it.com/wordpress-gallery/" target="_blank">
				<div><img width="250px" src="<?php echo $path_site; ?>/huge-it1.png" /></div>
				<div>Get the full version</div>
			</a>
		</div>
	</div>
	<div style="clear: both;"></div>
<div id="poststuff">
		<?php $path_site = plugins_url("/../Front_images", __FILE__); ?>

		<div id="post-body-content" class="gallery-options">
			<div id="post-body-heading">
				<h3>General Options</h3>
				
				<a class="save-gallery-options button-primary">Save</a>
		
			</div>
		<form action="admin.php?page=Options_gallery_styles" method="post" id="adminForm" name="adminForm">
		<div id="gallery-options-list">
			
			<ul id="gallery-view-tabs">
				<li><a href="#gallery-view-options-0">Gallery/Content-Popup</a></li>
				<li><a href="#gallery-view-options-1">Content Slider</a></li>
				<li><a href="#gallery-view-options-2">Lightbox-Gallery</a></li>
				<li><a href="#gallery-view-options-3">Slider</a></li>
				<li><a href="#gallery-view-options-4">Thumbnails</a></li>
                                <li><a href="#gallery-view-options-5">Justified</a></li>
			</ul>
			
			<ul class="options-block" id="gallery-view-tabs-contents">
				<!-- VIEW 2 POPUP -->
				<li class="gallery-view-options-0">
					<div>
                                                <h3>Content Styles</h3>
                                                <div class="has-background">
							<label for="ht_view2_content_in_center">Show Content In The Center</label>
							<input type="hidden" value="off" name="params[ht_view2_content_in_center]" />
							<input type="checkbox" id="ht_view2_content_in_center"  <?php if($param_values['ht_view2_content_in_center']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view2_content_in_center]" value="on" />
						</div>
                                                <div class="has-background" style="margin-top: 10px !important;height: 35px;">
							
						</div>
						<h3>Element Styles</h3>
						<div class="has-background">
							<label for="ht_view2_element_width">Element Width</label>
							<input type="text" name="params[ht_view2_element_width]" id="ht_view2_element_width" value="<?php echo $param_values['ht_view2_element_width']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view2_element_height">Element Height</label>
							<input type="text" name="params[ht_view2_element_height]" id="ht_view2_element_height" value="<?php echo $param_values['ht_view2_element_height']; ?>" class="text" />
							<span>px</span>
						</div>
						<div  class="has-background">
							<label for="ht_view2_element_border_width">Element Border Width</label>
							<input type="text" name="params[ht_view2_element_border_width]" id="ht_view2_element_border_width" value="<?php echo $param_values['ht_view2_element_border_width']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view2_element_border_color">Element Border Color</label>
							<input name="params[ht_view2_element_border_color]" type="text" class="color" id="ht_view2_element_border_color" value="#<?php echo $param_values['ht_view2_element_border_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view2_element_overlay_color">Element's Image Overlay Color</label>
							<input name="params[ht_view2_element_overlay_color]" type="text" class="color" id="ht_view2_element_overlay_color" value="#<?php echo $param_values['ht_view2_element_overlay_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view2_zoombutton_style">Element's Image Overlay Transparency</label>
							<div class="slider-container">
								<input name="params[ht_view2_element_overlay_transparency]" id="ht_view2_element_overlay_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['ht_view2_element_overlay_transparency']; ?>" />
								<span><?php echo $param_values['ht_view2_element_overlay_transparency']; ?>%</span>
							</div>
						</div>
						<div class="has-background">
							<label for="ht_view2_zoombutton_style">Zoom Image Style</label>
							<select id="ht_view2_zoombutton_style" name="params[ht_view2_zoombutton_style]">	
							  <option <?php if($param_values['ht_view2_zoombutton_style'] == 'light'){ echo 'selected="selected"'; } ?> value="light">Light</option>
							  <option <?php if($param_values['ht_view2_zoombutton_style'] == 'dark'){ echo 'selected="selected"'; } ?> value="dark">Dark</option>
							</select>
						</div>
					</div>
					<div>
						<h3>Element Title</h3>
						<div class="has-background">
							<label for="ht_view2_element_title_font_size">Element Title Font Size</label>
							<input type="text" name="params[ht_view2_element_title_font_size]" id="ht_view2_element_title_font_size" value="<?php echo $param_values['ht_view2_element_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view2_element_title_font_color">Element Title Font Color</label>
							<input name="params[ht_view2_element_title_font_color]" type="text" class="color" id="ht_view2_element_title_font_color" value="#<?php echo $param_values['ht_view2_element_title_font_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view2_element_background_color">Element Title Background Color</label>
							<input name="params[ht_view2_element_background_color]" type="text" class="color" id="ht_view2_element_background_color" value="#<?php echo $param_values['ht_view2_element_background_color']; ?>" size="10" />
						</div>
					</div>
					<div>					
						<h3>Element Link Button</h3>
						<div class="has-background">
							<label for="ht_view2_element_show_linkbutton">Show Link Button On Element</label>
							<input type="hidden" value="off" name="params[ht_view2_element_show_linkbutton]" />
							<input type="checkbox" id="ht_view2_element_show_linkbutton"  <?php if($param_values['ht_view2_element_show_linkbutton']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view2_element_show_linkbutton]" value="on" />
						</div>
						<div>
							<label for="ht_view2_element_linkbutton_text">Link Button Text</label>
							<input type="text" name="params[ht_view2_element_linkbutton_text]" id="ht_view2_element_linkbutton_text" value="<?php echo $param_values['ht_view2_element_linkbutton_text']; ?>" class="text" />
						</div>
						<div class="has-background">
							<label for="ht_view2_element_linkbutton_font_size">Link Button Font Size</label>
							<input type="text" name="params[ht_view2_element_linkbutton_font_size]" id="ht_view2_element_linkbutton_font_size" value="<?php echo $param_values['ht_view2_element_linkbutton_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view2_element_linkbutton_color">Link Button Font Color</label>
							<input name="params[ht_view2_element_linkbutton_color]" type="text" class="color" id="ht_view2_element_linkbutton_color" value="#<?php echo $param_values['ht_view2_element_linkbutton_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view2_element_linkbutton_background_color">Link Button Background Color</label>
							<input name="params[ht_view2_element_linkbutton_background_color]" type="text" class="color" id="ht_view2_element_linkbutton_background_color" value="#<?php echo $param_values['ht_view2_element_linkbutton_background_color']; ?>" size="10" />
						</div>
					</div>
					<div style="">
						<h3>Popup Styles</h3>
						<div class="has-background">
							<label for="ht_view2_popup_background_color">Popup Background Color</label>
							<input name="params[ht_view2_popup_background_color]" type="text" class="color" id="ht_view2_popup_background_color" value="#<?php echo $param_values['ht_view2_popup_background_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view2_popup_overlay_color">Popup Overlay Color</label>
							<input name="params[ht_view2_popup_overlay_color]" type="text" class="color" id="ht_view2_popup_overlay_color" value="#<?php echo $param_values['ht_view2_popup_overlay_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view2_popup_overlay_transparency_color">Popup Overlay Transparency</label>
							<div class="slider-container">
								<input name="params[ht_view2_popup_overlay_transparency_color]" id="ht_view2_popup_overlay_transparency_color" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['ht_view2_popup_overlay_transparency_color']; ?>" />
								<span><?php echo $param_values['ht_view2_popup_overlay_transparency_color']; ?>%</span>
							</div>
						</div>
						<div>
							<label for="ht_view2_popup_closebutton_style">Popup Close Button Style</label>
							<select id="ht_view2_popup_closebutton_style" name="params[ht_view2_popup_closebutton_style]">	
							  <option <?php if($param_values['ht_view2_popup_closebutton_style'] == 'light'){ echo 'selected="selected"'; } ?> value="light">Light</option>
							  <option <?php if($param_values['ht_view2_popup_closebutton_style'] == 'dark'){ echo 'selected="selected"'; } ?> value="dark">Dark</option>
							</select>
						</div>
						<div class="has-background">
							<label for="ht_view2_show_separator_lines">Show Separator Lines</label>
							<input type="hidden" value="off" name="params[ht_view2_show_separator_lines]" />
							<input type="checkbox" id="ht_view2_show_separator_lines"  <?php if($param_values['ht_view2_show_separator_lines']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view2_show_separator_lines]" value="on" />
						</div>
					</div>
					<div style="margin-top: -280px;">					
						<h3>Popup Title</h3>
						<div class="has-background">
							<label for="ht_view2_popup_title_font_size">Popup Title Font Size</label>
							<input type="text" name="params[ht_view2_popup_title_font_size]" id="ht_view2_element_title_font_size" value="<?php echo $param_values['ht_view2_popup_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view2_popup_title_font_color">Popup Title Font Color</label>
							<input name="params[ht_view2_popup_title_font_color]" type="text" class="color" id="ht_view2_element_title_font_color" value="#<?php echo $param_values['ht_view2_popup_title_font_color']; ?>" size="10" />
						</div>
					</div>
                                        <div style="margin-top: -95px;">
						<h3>Popup Description</h3>
						<div class="has-background">
							<label for="ht_view2_show_description">Show Description</label>
							<input type="hidden" value="off" name="params[ht_view2_show_description]" />
							<input type="checkbox" id="ht_view2_show_description"  <?php if($param_values['ht_view2_show_description']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view2_show_description]" value="on" />
						</div>
						<div>
							<label for="ht_view2_description_font_size">Description Font Size</label>
							<input type="text" name="params[ht_view2_description_font_size]" id="ht_view2_description_font_size" value="<?php echo $param_values['ht_view2_description_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="ht_view2_description_color">Description Font Color</label>
							<input name="params[ht_view2_description_color]" type="text" class="color" id="ht_view2_description_color" value="#<?php echo $param_values['ht_view2_description_color']; ?>" size="10" />
						</div>
					</div>
					<div>
						<h3>Popup Link Button</h3>
						<div class="has-background">
							<label for="ht_view2_show_popup_linkbutton">Show Link Button</label>
							<input type="hidden" value="off" name="params[ht_view2_show_popup_linkbutton]" />
							<input type="checkbox" id="ht_view2_show_popup_linkbutton"  <?php if($param_values['ht_view2_show_popup_linkbutton']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view2_show_popup_linkbutton]" value="on" />
						</div>
						<div>
							<label for="ht_view2_popup_linkbutton_text">Link Button Text</label>
							<input type="text" name="params[ht_view2_popup_linkbutton_text]" id="ht_view2_popup_linkbutton_text" value="<?php echo $param_values['ht_view2_popup_linkbutton_text']; ?>" class="text" />
						</div>
						<div class="has-background">
							<label for="ht_view2_popup_linkbutton_font_size">Link Button Font Size</label>
							<input type="text" name="params[ht_view2_popup_linkbutton_font_size]" id="ht_view2_popup_linkbutton_font_size" value="<?php echo $param_values['ht_view2_popup_linkbutton_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view2_popup_linkbutton_color">Link Button Font Color</label>
							<input name="params[ht_view2_popup_linkbutton_color]" type="text" class="color" id="ht_view2_popup_linkbutton_color" value="#<?php echo $param_values['ht_view2_popup_linkbutton_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view2_popup_linkbutton_font_hover_color">Link Button Font Hover Color</label>
							<input name="params[ht_view2_popup_linkbutton_font_hover_color]" type="text" class="color" id="ht_view2_popup_linkbutton_font_hover_color" value="#<?php echo $param_values['ht_view2_popup_linkbutton_font_hover_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view2_popup_linkbutton_background_color">Link Button Background Color</label>
							<input name="params[ht_view2_popup_linkbutton_background_color]" type="text" class="color" id="ht_view2_popup_linkbutton_background_color" value="#<?php echo $param_values['ht_view2_popup_linkbutton_background_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view2_popup_linkbutton_background_hover_color">Link Button Background Hover Color</label>
							<input name="params[ht_view2_popup_linkbutton_background_hover_color]" type="text" class="color" id="ht_view2_popup_linkbutton_background_hover_color" value="#<?php echo $param_values['ht_view2_popup_linkbutton_background_hover_color']; ?>" size="10" />
						</div>
					</div>
				</li>
				<!-- View 1 Content Slider -->
				<li class="gallery-view-options-1">
					<div>
						<h3>Slider Container</h3>
							<div class="has-background">
								<label for="ht_view5_main_image_width">Main Image Width</label>
								<input type="text" name="params[ht_view5_main_image_width]" id="ht_view5_main_image_width" value="<?php echo $param_values['ht_view5_main_image_width']; ?>" class="text" />
								<span>px</span>
							</div>
						<div>
							<label for="ht_view5_slider_background_color">Slider Background Color</label>
							<input name="params[ht_view5_slider_background_color]" type="text" class="color" id="ht_view5_slider_background_color" value="#<?php echo $param_values['ht_view5_slider_background_color']; ?>" size="10" />
						</div>
						<div  class="has-background">
							<label for="ht_view5_icons_style">Arrow Icons Style</label>
							<select id="ht_view5_icons_style" name="params[ht_view5_icons_style]">	
							  <option <?php if($param_values['ht_view5_icons_style'] == 'light'){ echo 'selected="selected"'; } ?> value="light">Light</option>
							  <option <?php if($param_values['ht_view5_icons_style'] == 'dark'){ echo 'selected="selected"'; } ?> value="dark">Dark</option>
							</select>
						</div>
						<div>
							<label for="ht_view5_show_separator_lines">Show Separator Lines</label>
							<input type="hidden" value="off" name="params[ht_view5_show_separator_lines]" />
							<input type="checkbox" id="ht_view5_show_separator_lines"  <?php if($param_values['ht_view5_show_separator_lines']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view5_show_separator_lines]" value="on" />
						</div>
					</div>
					<div>
						<h3>Title</h3>
						<div class="has-background">
							<label for="ht_view5_title_font_size">Title Font Size</label>
							<input type="text" name="params[ht_view5_title_font_size]" id="ht_view5_title_font_size" value="<?php echo $param_values['ht_view5_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view5_title_font_color">Title Font Color</label>
							<input name="params[ht_view5_title_font_color]" type="text" class="color" id="ht_view5_title_font_color" value="#<?php echo $param_values['ht_view5_title_font_color']; ?>" size="10" />
						</div>
					</div>
					<div>
						<h3>Description</h3>
						<div class="has-background">
							<label for="ht_view5_show_description">Show Description</label>
							<input type="hidden" value="off" name="params[ht_view5_show_description]" />
							<input type="checkbox" id="ht_view5_show_description"  <?php if($param_values['ht_view5_show_description']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view5_show_description]" value="on" />
						</div>
						<div>
							<label for="ht_view5_description_font_size">Description Font Size</label>
							<input type="text" name="params[ht_view5_description_font_size]" id="ht_view5_description_font_size" value="<?php echo $param_values['ht_view5_description_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="ht_view5_description_color">Description Font Color</label>
							<input name="params[ht_view5_description_color]" type="text" class="color" id="ht_view5_description_color" value="#<?php echo $param_values['ht_view5_description_color']; ?>" size="10" />
						</div>
					</div>
					<div style="margin-top:-120px;">
						<h3>Link Button</h3>
						<div class="has-background">
							<label for="ht_view5_show_linkbutton">Show Link Button</label>
							<input type="hidden" value="off" name="params[ht_view5_show_linkbutton]" />
							<input type="checkbox" id="ht_view5_show_linkbutton"  <?php if($param_values['ht_view5_show_linkbutton']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view5_show_linkbutton]" value="on" />
						</div>
						<div>
							<label for="ht_view5_linkbutton_text">Link Button Text</label>
							<input type="text" name="params[ht_view5_linkbutton_text]" id="ht_view5_linkbutton_text" value="<?php echo $param_values['ht_view5_linkbutton_text']; ?>" class="text" />
						</div>
						<div class="has-background">
							<label for="ht_view5_linkbutton_font_size">Link Button Font Size</label>
							<input type="text" name="params[ht_view5_linkbutton_font_size]" id="ht_view5_linkbutton_font_size" value="<?php echo $param_values['ht_view5_linkbutton_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view5_linkbutton_color">Link Button Font Color</label>
							<input name="params[ht_view5_linkbutton_color]" type="text" class="color" id="ht_view5_linkbutton_color" value="#<?php echo $param_values['ht_view5_linkbutton_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view5_linkbutton_font_hover_color">Link Button Font Hover Color</label>
							<input name="params[ht_view5_linkbutton_font_hover_color]" type="text" class="color" id="ht_view5_linkbutton_font_hover_color" value="#<?php echo $param_values['ht_view5_linkbutton_font_hover_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view5_linkbutton_background_color">Link Button Background Color</label>
							<input name="params[ht_view5_linkbutton_background_color]" type="text" class="color" id="ht_view5_linkbutton_background_color" value="#<?php echo $param_values['ht_view5_linkbutton_background_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view5_linkbutton_background_hover_color">Link Button Background Hover Color</label>
							<input name="params[ht_view5_linkbutton_background_hover_color]" type="text" class="color" id="ht_view5_linkbutton_background_hover_color" value="#<?php echo $param_values['ht_view5_linkbutton_background_hover_color']; ?>" size="10" />
						</div>
					</div>
				</li>
				<!-- VIEW 2 Gallery  -->
				<li class="gallery-view-options-2">
					<div>
                                                <h3>Content Styles</h3>
                                                <div class="has-background">
							<label for="ht_view6_content_in_center">Show Content In The Center</label>
							<input type="hidden" value="off" name="params[ht_view6_content_in_center]" />
							<input type="checkbox" id="ht_view6_content_in_center"  <?php if($param_values['ht_view6_content_in_center']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[ht_view6_content_in_center]" value="on" />
						</div>
                                                <div class="has-background" style="margin-top: 10px !important;height: 35px;">
							
						</div>
						<h3>Image</h3>
						<div class="has-background">
							<label for="ht_view6_width">Image Width</label>
							<input type="text" name="params[ht_view6_width]" id="ht_view6_width" value="<?php echo $param_values['ht_view6_width']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view6_border_width">Image Border Width</label>
							<input type="text" name="params[ht_view6_border_width]" id="ht_view6_border_width" value="<?php echo $param_values['ht_view6_border_width']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="ht_view6_border_color">Image Border Color</label>
							<input name="params[ht_view6_border_color]" type="text" class="color" id="ht_view6_border_color" value="#<?php echo $param_values['ht_view6_border_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view6_border_radius">Border Radius</label>
							<input type="text" name="params[ht_view6_border_radius]" id="ht_view6_border_radius" value="<?php echo $param_values['ht_view6_border_radius']; ?>" class="text" />
							<span>px</span>
						</div>
					</div>
					<div>
						<h3>Title</h3>
						<div class="has-background">
							<label for="ht_view6_title_font_size">Title Font Size</label>
							<input type="text" name="params[ht_view6_title_font_size]" id="ht_view6_title_font_size" value="<?php echo $param_values['ht_view6_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="ht_view6_title_font_color">Title Font Color</label>
							<input name="params[ht_view6_title_font_color]" type="text" class="color" id="ht_view6_title_font_color" value="#<?php echo $param_values['ht_view6_title_font_color']; ?>" size="10" />
						</div>
						<div  class="has-background">
							<label for="ht_view6_title_font_hover_color">Title Font Hover Color</label>
							<input name="params[ht_view6_title_font_hover_color]" type="text" class="color" id="ht_view6_title_font_hover_color" value="#<?php echo $param_values['ht_view6_title_font_hover_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view6_title_background_color">Title Background Color</label>
							<input name="params[ht_view6_title_background_color]" type="text" class="color" id="ht_view6_title_background_color" value="#<?php echo $param_values['ht_view6_title_background_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="ht_view6_title_background_transparency">Title Background Transparency</label>
							<div class="slider-container">
								<input name="params[ht_view6_title_background_transparency]" id="ht_view6_title_background_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['ht_view6_title_background_transparency']; ?>" />
								<span><?php echo $param_values['ht_view6_title_background_transparency']; ?>%</span>
							</div>
						</div>
					</div>
				</li>
				<li class="gallery-view-options-3">
					<div class="options-block" id="options-block-slider">
						<h3>Slider</h3>
						<div class="has-background">
							<label for="slider_crop_image">Image Behaviour</label>
							<select id="slider_crop_image" name="params[slider_crop_image]">
								  <option <?php if($param_values['slider_crop_image'] == 'crop'){ echo 'selected'; } ?> value="crop">Natural</option>
								  <option <?php if($param_values['slider_crop_image'] == 'resize'){ echo 'selected'; } ?> value="resize">Resize</option>
							</select>
						</div>
						<div>
							<label for="slider_slider_background_color">Slider Background Color</label>
								<input name="params[slider_slider_background_color]" type="text" class="color" id="slider_slider_background_color" value="#<?php echo $param_values['slider_slider_background_color']; ?>" size="10">
						</div>
						<div class="has-background">
							<label for="slider_slideshow_border_size">Slider Border Size</label>
							<input type="text" name="params[slider_slideshow_border_size]" id="slider_slideshow_border_size" value="<?php echo $param_values['slider_slideshow_border_size']; ?>" class="text" />
						</div>
						<div>
							<label for="slider_slideshow_border_color">Slider Border Color</label>
								<input name="params[slider_slideshow_border_color]" type="text" class="color" id="slider_slideshow_border_color" value="#<?php echo $param_values['slider_slideshow_border_color']; ?>" size="10">
						</div>
						<div class="has-background">
							<label for="slider_slideshow_border_radius">Slider Border radius</label>
							<input type="text" name="params[slider_slideshow_border_radius]" id="slider_slideshow_border_radius" value="<?php echo $param_values['slider_slideshow_border_radius']; ?>" class="text" />
						</div>
					</div>
					<div class="options-block" id="options-block-title">
						<h3>Title</h3>
						<div class="has-background">
							<label for="title-container-width">Title Width</label>
							<div class="slider-container">
								<input name="params[slider_title_width]" id="title-container-width" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo $param_values['slider_title_width']; ?>" />
								<span><?php echo $param_values['slider_title_width']; ?>%</span>
							</div>
							<div style="clear:both;"></div>
						</div>
						<div>
							<label for="slider_title_has_margin">Title Has Margin</label>	
							<input type="hidden" value="off" name="params[slider_title_has_margin]" />					
							<input type="checkbox" id="slider_title_has_margin"  <?php if($param_values['slider_title_has_margin']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[slider_title_has_margin]"  value="on" />
						</div>
						<div class="has-background">
							<label for="slider_title_font_size">Title Font Size</label>
							<input type="text" name="params[slider_title_font_size]" id="slider_title_font_size" value="<?php echo $param_values['slider_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="slider_title_color">Title Text Color</label>
								<input name="params[slider_title_color]" type="text" class="color" id="slider_title_color" value="#<?php echo $param_values['slider_title_color']; ?>" size="10" />
						</div>
						<div  class="has-background">
							<label for="slider_title_text_align">Title Text Align</label>
							<select id="slider_title_text_align" name="params[slider_title_text_align]">
								  <option <?php if($param_values['slider_title_text_align'] == 'justify'){ echo 'justify'; } ?> value="justify">Full width</option>
								  <option <?php if($param_values['slider_title_text_align'] == 'center'){ echo 'selected'; } ?> value="center">Center</option>
								  <option <?php if($param_values['slider_title_text_align'] == 'left'){ echo 'selected'; } ?> value="left">Left</option>
								  <option <?php if($param_values['slider_title_text_align'] == 'right'){ echo 'selected'; } ?> value="right">Right</option>
							</select>
						</div>
						<div>
							<label for="title-background-transparency">Title Background Transparency</label>
							<div class="slider-container">
								<input name="params[slider_title_background_transparency]" id="title-background-transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['slider_title_background_transparency']; ?>" />
								<span><?php echo $param_values['slider_title_background_transparency']; ?>%</span>
							</div>
						</div>
						<div class="has-background">
							<label for="slider_title_background_color">Title Background Color</label>
							<input name="params[slider_title_background_color]" type="text" class="color" id="slider_title_background_color" value="#<?php echo $param_values['slider_title_background_color']; ?>" size="10" />
						</div>
						<div>
							<label for="slider_title_border_size">Title Border Size</label>
							<input type="text" name="params[slider_title_border_size]" id="slider_title_border_size" value="<?php echo $param_values['slider_title_border_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="slider_title_border_color">Title Border Color</label>
							<input name="params[slider_title_border_color]" type="text" class="color" id="slider_title_border_color" value="#<?php echo $param_values['slider_title_border_color']; ?>" size="10">
						</div>
						<div>
							<label for="slider_title_border_radius">Title Border Radius</label>
							<input type="text" name="params[slider_title_border_radius]" id="slider_title_border_radius" value="<?php echo $param_values['slider_title_border_radius']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-height has-background">
							<label for="">Title Position</label>
								<div>
								<table class="bws_position_table">
									<tbody>
									  <tr>
										<td><input type="radio" value="left-top" id="slideshow_title_top-left" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'left-top'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="center-top" id="slideshow_title_top-center" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'center-top'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="right-top" id="slideshow_title_top-right" name="params[slider_title_position]"  <?php if($param_values['slider_title_position'] == 'right-top'){ echo 'checked="checked"'; } ?> /></td>
									  </tr>
									  <tr>
										<td><input type="radio" value="left-middle" id="slideshow_title_middle-left" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'left-middle'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="center-middle" id="slideshow_title_middle-center" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'center-middle'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="right-middle" id="slideshow_title_middle-right" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'right-middle'){ echo 'checked="checked"'; } ?> /></td>
									  </tr>
									  <tr>
										<td><input type="radio" value="left-bottom" id="slideshow_title_bottom-left" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'left-bottom'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="center-bottom" id="slideshow_title_bottom-center" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'center-bottom'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="right-bottom" id="slideshow_title_bottom-right" name="params[slider_title_position]" <?php if($param_values['slider_title_position'] == 'right-bottom'){ echo 'checked="checked"'; } ?> /></td>
									  </tr>
									</tbody>	
								</table>
								</div>
						</div>
					</div>
					<div class="options-block" style="margin-top:-270px;">
						<h3>Description</h3>
						<div class="has-background">
							<label for="description-container-width">Description Width</label>
							<div class="slider-container">
								<input name="params[slider_description_width]" id="description-container-width" data-slider-range="1,100"  type="text" data-slider="true"  data-slider-highlight="true" value="<?php echo $param_values['slider_description_width']; ?>" />
								<span><?php echo $param_values['slider_description_width']; ?>%</span>
							</div>
							<div style="clear:both;"></div>
						</div>
						<div>
							<label for="slider_description_has_margin">Description Has Margin</label>
								<input type="hidden" value="off" name="params[slider_description_has_margin]" />
								<input type="checkbox" id="slider_description_has_margin"  <?php if($param_values['slider_description_has_margin']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[slider_description_has_margin]" value="on" />
						</div>
						<div class="has-background">
							<label for="slider_description_font_size">Description Font Size</label>
							<input type="text" name="params[slider_description_font_size]" id="slider_description_font_size" value="<?php echo $param_values['slider_description_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="slider_description_color">Description Text Color</label>
							<input name="params[slider_description_color]" type="text" class="color" id="slider_description_color" value="#<?php echo $param_values['slider_description_color']; ?>" size="10" />
						</div>
						<div  class="has-background">
							<label for="slider_description_text_align">Description Text Align</label>
							<select id="slider_description_text_align" name="params[slider_description_text_align]">	
							  <option <?php if($param_values['slider_description_text_align'] == 'justify'){ echo 'justify'; } ?> value="justify">Full width</option>
							  <option <?php if($param_values['slider_description_text_align'] == 'center'){ echo 'center'; } ?> value="center">Center</option>
							  <option <?php if($param_values['slider_description_text_align'] == 'left'){ echo 'left'; } ?> value="left">Left</option>
							  <option <?php if($param_values['slider_description_text_align'] == 'right'){ echo 'right'; } ?> value="right">Right</option>
							</select>
						</div>
						<div>
							<label for="description-background-transparency">Description Background Transparency</label>
							<div class="slider-container">
								<input name="params[slider_description_background_transparency]" id="description-background-transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['slider_description_background_transparency']; ?>" />
								<span><?php echo $param_values['slider_description_background_transparency']; ?>%</span>
							</div>
						</div>
						<div class="has-background">
							<label for="slider_description_background_color">Description Background Color</label>
								<input name="params[slider_description_background_color]" type="text" class="color" id="slider_description_background_color" value="#<?php echo $param_values['slider_description_background_color']; ?>" size="10">
						</div>
						<div>
							<label for="slider_description_border_size">Description Border Size</label>
							<input type="text" name="params[slider_description_border_size]" id="slider_description_border_size" value="<?php echo $param_values['slider_description_border_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="slider_description_border_color">Description Border Color</label>
							<input name="params[slider_description_border_color]" type="text" class="color" id="slider_description_border_color" value="#<?php echo $param_values['slider_description_border_color']; ?>" size="10">
						</div>
						<div>
							<label for="slider_description_border_radius">Description Border Radius</label>
							<input type="text" name="params[slider_description_border_radius]" id="slider_description_border_radius" value="<?php echo $param_values['slider_description_border_radius']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-height has-background">
							<label for="params[slider_description_position]">Description Position</label>
								<div>
								<table class="bws_position_table">
									<tbody>
									  <tr>
										<td><input type="radio" value="left-top" id="slideshow_description_top-left" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'left-top'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="center-top" id="slideshow_description_top-center" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'center-top'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="right-top" id="slideshow_description_top-right" name="params[slider_description_position]"  <?php if($param_values['slider_description_position'] == 'right-top'){ echo 'checked="checked"'; } ?> /></td>
									  </tr>
									  <tr>
										<td><input type="radio" value="left-middle" id="slideshow_description_middle-left" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'left-middle'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="center-middle" id="slideshow_description_middle-center" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'center-middle'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="right-middle" id="slideshow_description_middle-right" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'right-middle'){ echo 'checked="checked"'; } ?> /></td>
									  </tr>
									  <tr>
										<td><input type="radio" value="left-bottom" id="slideshow_description_bottom-left" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'left-bottom'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="center-bottom" id="slideshow_description_bottom-center" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'center-bottom'){ echo 'checked="checked"'; } ?> /></td>
										<td><input type="radio" value="right-bottom" id="slideshow_description_bottom-right" name="params[slider_description_position]" <?php if($param_values['slider_description_position'] == 'right-bottom'){ echo 'checked="checked"'; } ?> /></td>
									  </tr>
									</tbody>	
								</table>
								</div>
						</div>
					</div>
					<div class="options-block" id="options-block-navigation">
						<h3>Navigation</h3>
						<div  class="has-background">
							<label for="slider_show_arrows">Show Navigation Arrows </label>
							<input type="hidden" value="off" name="params[slider_show_arrows]" />		
							<input type="checkbox" id="slider_show_arrows" <?php if($param_values['slider_show_arrows']  == 'on'){ echo 'checked="checked"'; } ?> name="params[slider_show_arrows]" value="on" />
						</div>
						<div>
							<label for="slider_dots_position">Navigation Dots Position / Hide Dots</label>
							<select id="slider_dots_position" name="params[slider_dots_position]">
								  <option <?php if($param_values['slider_dots_position'] == 'none'){ echo 'selected'; } ?> value="none">Dont Show</option>
								  <option <?php if($param_values['slider_dots_position'] == 'top'){ echo 'selected'; } ?> value="top">Top</option>
								  <option <?php if($param_values['slider_dots_position'] == 'bottom'){ echo 'selected'; } ?> value="bottom">Bottom</option>
							</select>
						</div>
						<div  class="has-background">
							<label for="slider_dots_color">Navigation Dots Color</label>
							<input type="text" class="color" name="params[slider_dots_color]" id="slider_dots_color" value="<?php echo $param_values['slider_dots_color']; ?>" class="text" />
						</div>
						<div>
							<label for="slider_active_dot_color">Navigation Active Dot Color</label>
							<input type="text" class="color" name="params[slider_active_dot_color]" id="slider_active_dot_color" value="<?php echo $param_values['slider_active_dot_color']; ?>" class="text" />
						</div>
						<div class="navigation-type-block has-height has-background" style="padding-top:20px;">
							<label for="">Navigation Type <?php echo $param_values['slider_navigation_type']; ?></label>
						
							<div class="has-height has-background" style="clear:both;padding:10px 0px 0px 80px;">
								<div>
									<ul id="arrows-type">
										<li <?php if($param_values['slider_navigation_type'] == 1){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.simple.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="1" <?php if($param_values['slider_navigation_type'] == 1){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 2){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.circle.shadow.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="2" <?php if($param_values['slider_navigation_type'] == 2){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 3){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.circle.simple.dark.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="3" <?php if($param_values['slider_navigation_type'] == 3){ echo 'checked="checked"'; } ?>>
										</li>
										
										<li <?php if($param_values['slider_navigation_type'] == 4){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.cube.dark.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="4" <?php if($param_values['slider_navigation_type'] == 4){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 5 ){ echo 'class="active"'; } ?> >
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.light.blue.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="5" <?php if($param_values['slider_navigation_type'] == 5){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 6){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.light.cube.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="6" <?php if($param_values['slider_navigation_type'] == 6){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 8){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="8" <?php if($param_values['slider_navigation_type'] == 8){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 9){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.circle.blue.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="9" <?php if($param_values['slider_navigation_type'] == 9){ echo 'checked="checked"'; } ?>>
										</li>	
										<li <?php if($param_values['slider_navigation_type'] == 10){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.circle.green.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="10" <?php if($param_values['slider_navigation_type'] == 10){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 11){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.blue.retro.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="11" <?php if($param_values['slider_navigation_type'] == 11){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 12){ echo 'class="active"'; } ?>>
											<div class="image-block">
												<img src="<?php echo $path_site; ?>/arrows/arrows.green.retro.png" alt="" />
											</div>
											<input type="radio" name="params[slider_navigation_type]" value="12" <?php if($param_values['slider_navigation_type'] == 12){ echo 'checked="checked"'; } ?>>
										</li>	
										<li <?php if($param_values['slider_navigation_type'] == 13){ echo 'class="active"'; } ?>>
												<div class="image-block">
													<img src="<?php echo $path_site; ?>/arrows/arrows.red.circle.png" alt="" />
												</div>
												<input type="radio" name="params[slider_navigation_type]" value="13" <?php if($param_values['slider_navigation_type'] == 13){ echo 'checked="checked"'; } ?>>
										</li>	
										<li class="color" <?php if($param_values['slider_navigation_type'] == 14){ echo 'class="active"'; } ?>>
												<div class="image-block">
													<img src="<?php echo $path_site; ?>/arrows/arrows.triangle.white.png" alt="" />
												</div>
												<input type="radio" name="params[slider_navigation_type]" value="14" <?php if($param_values['slider_navigation_type'] == 14){ echo 'checked="checked"'; } ?>>
										</li>	
										<li <?php if($param_values['slider_navigation_type'] == 15){ echo 'class="active"'; } ?>>
												<div class="image-block">
													<img src="<?php echo $path_site; ?>/arrows/arrows.ancient.png" alt="" />
												</div>
												<input type="radio" name="params[slider_navigation_type]" value="15" <?php if($param_values['slider_navigation_type'] == 15){ echo 'checked="checked"'; } ?>>
										</li>
										<li <?php if($param_values['slider_navigation_type'] == 16){ echo 'class="active"'; } ?>>
												<div class="image-block">
													<img src="<?php echo $path_site; ?>/arrows/arrows.black.out.png" alt="" />
												</div>
												<input type="radio" name="params[slider_navigation_type]" value="16" <?php if($param_values['slider_navigation_type'] == 16){ echo 'checked="checked"'; } ?>>
										</li>							
									</ul>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li class="gallery-view-options-4">
					<div>
						<h3>Container Style</h3>
						<div class="has-background">
							<label for="thumb_box_padding">Box padding</label>
							<input type="text" name="params[thumb_box_padding]" id="thumb_box_padding" value="<?php echo $param_values['thumb_box_padding']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="thumb_box_background">Box background</label>
							<input name="params[thumb_box_background]" type="text" class="color" id="thumb_box_background" value="#<?php echo $param_values['thumb_box_background']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="thumb_box_use_shadow">Box Use shadow</label>
							<input type="hidden" value="off" name="params[thumb_box_use_shadow]" />
							<input type="checkbox" id="thumb_box_use_shadow"  <?php if($param_values['thumb_box_use_shadow']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[thumb_box_use_shadow]" value="on" />
						</div>
						<div>
							<label for="thumb_box_has_background">Box Has background</label>
							<input type="hidden" value="off" name="params[thumb_box_has_background]" />
							<input type="checkbox" id="thumb_box_has_background"  <?php if($param_values['thumb_box_has_background']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[thumb_box_has_background]" value="on" />
						</div>
					</div>
					<div>
						<h3>Image</h3>
						<div class="has-background">
							<label for="thumb_image_behavior">Image Behavior</label>
							<input type="hidden" value="off" name="params[thumb_image_behavior]" />
							<input type="checkbox" id="thumb_image_behavior"  <?php if($param_values['thumb_image_behavior']  == 'on'){ echo 'checked="checked"'; } ?>  name="params[thumb_image_behavior]" value="on" />
						</div>
						<div>
							<label for="thumb_image_width">Image Width</label>
							<input type="text" name="params[thumb_image_width]" id="thumb_image_width" value="<?php echo $param_values['thumb_image_width']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="thumb_image_height">Image Height</label>
							<input type="text" name="params[thumb_image_height]" id="thumb_image_height" value="<?php echo $param_values['thumb_image_height']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="thumb_image_border_width">Image Border Width</label>
							<input type="text" name="params[thumb_image_border_width]" id="thumb_image_border_width" value="<?php echo $param_values['thumb_image_border_width']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="thumb_image_border_color">Image Border Color</label>
							<input name="params[thumb_image_border_color]" type="text" class="color" id="thumb_image_border_color" value="#<?php echo $param_values['thumb_image_border_color']; ?>" size="10" />
						</div>
						<div>
							<label for="thumb_image_border_radius">Border Radius</label>
							<input type="text" name="params[thumb_image_border_radius]" id="thumb_image_border_radius" value="<?php echo $param_values['thumb_image_border_radius']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="thumb_margin_image">Margin Image</label>
							<input type="text" name="params[thumb_margin_image]" id="thumb_margin_image" value="<?php echo $param_values['thumb_margin_image']; ?>" class="text" />
						</div>
					</div>
					<div style="margin-top:-110px">
						<h3>Title</h3>
						<div class="has-background">
							<label for="thumb_title_font_size">Title Font Size</label>
							<input type="text" name="params[thumb_title_font_size]" id="thumb_title_font_size" value="<?php echo $param_values['thumb_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div>
							<label for="thumb_title_font_color">Title Font Color</label>
							<input name="params[thumb_title_font_color]" type="text" class="color" id="thumb_title_font_color" value="#<?php echo $param_values['thumb_title_font_color']; ?>" size="10" />
						</div>
						<div class="has-background">
							<label for="thumb_title_background_color">Overlay Background Color</label>
							<input name="params[thumb_title_background_color]" type="text" class="color" id="thumb_title_background_color" value="#<?php echo $param_values['thumb_title_background_color']; ?>" size="10" />
						</div>
						<div>
							<label for="thumb_title_background_transparency">Title Background Transparency</label>
							<div class="slider-container">
								<input name="params[thumb_title_background_transparency]" id="thumb_title_background_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['thumb_title_background_transparency']; ?>" />
								<span><?php echo $param_values['thumb_title_background_transparency']; ?>%</span>
							</div>
						</div>
						<div class="has-background">
							<label for="thumb_view_text">Link Text</label>
							<input name="params[thumb_view_text]" type="text" id="thumb_view_text" value="<?php echo $param_values['thumb_view_text']; ?>"  />
						</div>
					</div>
				</li>
                                <li class="gallery-view-options-5">
                                        <div>
						<h3>Element Styles</h3>
						
<!--                                                    <div class="has-background">
                                                            <label for="ht_view8_element_size_fix">Size fix</label>
                                                            <input type="hidden" value="false" name="params[ht_view8_element_size_fix]" />
                                                            <input type="checkbox" id="ht_view8_element_size_fix"  <?php if($param_values['ht_view8_element_size_fix']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[ht_view8_element_size_fix]" value="true" />
                                                    </div>-->
                                                        
                                                    <div class="has-background fixed-size">
                                                            <label for="ht_view8_element_height">Image height</label>
                                                            <input type="text" name="params[ht_view8_element_height]" id="ht_view8_element_height" value="<?php echo $param_values['ht_view8_element_height']; ?>" class="text">
                                                            <span>px</span>
                                                    </div>
                                                        
<!--                                                    <div class="has-background not-fixed-size">
                                                            <label for="ht_view8_element_maxheight">Popup maxHeight</label>
                                                            <input type="number" name="params[ht_view8_element_maxheight]" id="ht_view8_element_maxheight" value="<?php echo $param_values['ht_view8_element_maxheight']; ?>" class="text">
                                                            <span>px</span>
                                                    </div>-->
                                                        
                                                        
                                                    <div class="">
                                                            <label for="ht_view8_element_padding">Image margin</label>
                                                            <input type="text" name="params[ht_view8_element_padding]" id="ht_view8_element_border_radius" value="<?php echo $param_values['ht_view8_element_padding']; ?>" class="text" />
                                                            <span>px</span>
                                                    </div>

                                                    
                                                    <div class="has-background">
                                                            <label for="ht_view8_element_justify">Image Justify</label>
                                                            <input type="hidden" value="false" name="params[ht_view8_element_justify]" />
                                                            <input type="checkbox" id="ht_view8_element_justify"  <?php if($param_values['ht_view8_element_justify']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[ht_view8_element_justify]" value="true" />
                                                    </div>

                                                    <div class="">
                                                            <label for="ht_view8_element_randomize">Image Randomize</label>
                                                            <input type="hidden" value="false" name="params[ht_view8_element_randomize]" />
                                                            <input type="checkbox" id="ht_view8_element_justify"  <?php if($param_values['ht_view8_element_randomize']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[ht_view8_element_randomize]" value="true" />
                                                    </div>
                                                    
                                                    <div class="has-background">
                                                            <label for="ht_view8_element_cssAnimation">Opening With Animation</label>
                                                            <input type="hidden" value="false" name="params[ht_view8_element_cssAnimation]" />
                                                            <input type="checkbox" id="ht_view8_element_justify"  <?php if($param_values['ht_view8_element_cssAnimation']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[ht_view8_element_cssAnimation]" value="true" />
                                                    </div>
                                                    
                                                    <div class="">
                                                            <label for="ht_view8_element_animation_speed">Opening Animation Speed</label>
                                                            <input type="text" name="params[ht_view8_element_animation_speed]" id="ht_view8_element_animation_speed" value="<?php echo $param_values['ht_view8_element_animation_speed']; ?>" class="text" />
                                                            <span>px</span>
                                                    </div>
					</div>
					<div>					
						<h3>Element Title</h3>
                                                <div class="has-background">
                                                        <label for="ht_view8_element_show_caption">Show Title</label>
                                                        <input type="hidden" value="false" name="params[ht_view8_element_show_caption]" />
                                                        <input type="checkbox" id="ht_view8_element_show_caption"  <?php if($param_values['ht_view8_element_show_caption']  == 'true'){ echo 'checked="checked"'; } ?>  name="params[ht_view8_element_show_caption]" value="true" />
                                                </div>
						<div>
							<label for="ht_view8_element_title_font_size">Element Title Font Size</label>
							<input type="text" name="params[ht_view8_element_title_font_size]" id="ht_view8_element_title_font_size" value="<?php echo $param_values['ht_view8_element_title_font_size']; ?>" class="text" />
							<span>px</span>
						</div>
						<div class="has-background">
							<label for="ht_view8_element_title_font_color">Element Title Font Color</label>
							<input name="params[ht_view8_element_title_font_color]" type="text" class="color" id="ht_view8_element_title_font_color" value="#<?php echo $param_values['ht_view8_element_title_font_color']; ?>" size="10" />
						</div>
						<div>
							<label for="ht_view8_element_title_background_color">Element Title Background Color</label>
							<input name="params[ht_view8_element_title_background_color]" type="text" class="color" id="ht_view8_element_title_background_color" value="#<?php echo $param_values['ht_view8_element_title_background_color']; ?>" size="10" />
						</div>
                                                
                                                <div class="has-background">
                                                        <label for="ht_view8_zoombutton_style">Element's Title Overlay Transparency</label>
                                                        <div class="slider-container">
                                                            <input name="params[ht_view8_element_title_overlay_transparency]" id="ht_view8_element_title_overlay_transparency" data-slider-highlight="true"  data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true" value="<?php echo $param_values['ht_view8_element_title_overlay_transparency']; ?>" />
                                                            <span><?php echo $param_values['ht_view8_element_title_overlay_transparency']; ?>%</span>
                                                        </div>
						</div>
                                                
					</div>
                               </li>
			</ul>

		<div id="post-body-footer">
			<a class="save-gallery-options button-primary">Save</a>
			<div class="clear"></div>
		</div>
		</form>
		</div>
	</div>
</div>
</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>

<?php
}