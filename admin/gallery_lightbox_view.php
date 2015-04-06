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
	popupsizes(jQuery('#light_box_size_fix'));
	function popupsizes(checkbox){
			if(checkbox.is(':checked')){
				jQuery('.lightbox-options-block .not-fixed-size').css({'display':'none'});
				jQuery('.lightbox-options-block .fixed-size').css({'display':'block'});
			}else {
				jQuery('.lightbox-options-block .fixed-size').css({'display':'none'});
				jQuery('.lightbox-options-block .not-fixed-size').css({'display':'block'});
			}
		}
	jQuery('#light_box_size_fix').change(function(){
		popupsizes(jQuery(this));
	});
	
	
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
	<div id="post-body-content" class="gallery-options">
			<div id="post-body-heading">
				<h3>Lightbox Options</h3>

				<a class="save-gallery-options button-primary">Save</a>
			</div>
			<div style="color: #a00;" >Dear user. Thank you for your interest in our product.
Please be known, that this page is for commercial users, and in order to use options from there, you should have pro license.
We please you to be understanding. The money we get for pro license is expended on constantly improvements of our plugins, making them more professional useful and effective, as well as for keeping fast support for every user. </div>
<div style="clear: both;"></div>
			<div>
				<img style="width: 100%;" src="<?php echo $path_site; ?>/lightbox_opt.png">
			</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>
</div>
</div>
</div>

<?php
}