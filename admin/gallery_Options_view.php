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
	<div style="color: #a00;" >Dear user. Thank you for your interest in our product.
Please be known, that this page is for commercial users, and in order to use options from there, you should have pro license.
We please you to be understanding. The money we get for pro license is expended on constantly improvements of our plugins, making them more professional useful and effective, as well as for keeping fast support for every user. </div>
<div id="poststuff">
		<?php $path_site = plugins_url("/../Front_images", __FILE__); ?>
		<?php $path_site2 = plugins_url("/../images", __FILE__); ?>

		<div id="post-body-content" class="gallery-options">
			<div id="post-body-heading">
				<h3>General Options</h3>
				
				<a class="save-gallery-options button-primary">Save</a>
		
			</div>
			
<div style="clear: both;"></div>
<div id="gallery-options-list">
			
			<ul id="gallery-view-tabs">
				<li><a href="#gallery-view-options-0">Gallery/Content-Popup</a></li>
				<li><a href="#gallery-view-options-1">Content Slider</a></li>
				<li><a href="#gallery-view-options-2">Lightbox-Gallery</a></li>
				<li><a href="#gallery-view-options-3">Slider</a></li>
				<li><a href="#gallery-view-options-4">Thumbnails</a></li>
                 <li><a href="#gallery-view-options-5">Justified</a></li>
                 <li><a href="#gallery-view-options-6">Block Style Gallery</a></li>
			</ul>
			<ul class="options-block" id="gallery-view-tabs-contents">
				<li class="gallery-view-options-0">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/popup-tab-1.png' >		
				</li>
				<li class="gallery-view-options-1">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/content-slider-tab-2.png' >	
				</li>
				<li class="gallery-view-options-2">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/lightbox-tab3.png' >		
				</li>
				<li class="gallery-view-options-3">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/slider-tab4.png' >	
				</li>
				<li class="gallery-view-options-4">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/thumbnails-tab-5.png' >
				</li>
				<li class="gallery-view-options-5">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/justified-tab-6.png' >
				</li>
				<li class="gallery-view-options-6">
					<img style="width: 100%;" src='<?php echo $path_site2; ?>/block-tab-7.png' >
				</li>
			</ul>
		</div>
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