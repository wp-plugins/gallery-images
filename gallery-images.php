<?php

/*
Plugin Name: Huge IT Image Gallery
Plugin URI: http://huge-it.com/wordpress-gallery/
Description: Huge-IT Image Gallery is the best plugin to use if you want to be original with your website.
Version: 1.3.4
Author: Huge-IT
Author: http://huge-it.com/
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/




add_action('media_buttons_context', 'add_gallery_my_custom_button');


add_action('admin_footer', 'add_gallery_inline_popup_content');


function add_gallery_my_custom_button($context) {
  

  $img = plugins_url( '/images/post.button.png' , __FILE__ );
  

  $container_id = 'huge_it_gallery';
  

  $title = 'Select Huge IT gallery to insert into post';

  $context .= '<a class="button thickbox" title="Select gallery to insert into post"    href="#TB_inline?width=400&inlineId='.$container_id.'">
		<span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
	Add gallery
	</a>';
  
  return $context;
}

function add_gallery_inline_popup_content() {
?>
<script type="text/javascript">
				jQuery(document).ready(function() {
				  jQuery('#hugeitgalleryinsert').on('click', function() {
				  	var id = jQuery('#huge_it_gallery-select option:selected').val();
			
				  	window.send_to_editor('[huge_it_gallery id="' + id + '"]');
					tb_remove();
				  })
				});
</script>

<div id="huge_it_gallery" style="display:none;">
  <h3>Select Huge IT Gallery to insert into post</h3>
  <?php 
  	  global $wpdb;
	  $query="SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys order by id ASC";
			   $shortcodegallerys=$wpdb->get_results($query);
			   ?>

 <?php 	if (count($shortcodegallerys)) {
							echo "<select id='huge_it_gallery-select'>";
							foreach ($shortcodegallerys as $shortcodegallery) {
								echo "<option value='".$shortcodegallery->id."'>".$shortcodegallery->name."</option>";
							}
							echo "</select>";
							echo "<button class='button primary' id='hugeitgalleryinsert'>Insert gallery</button>";
						} else {
							echo "No slideshows found", "huge_it_gallery";
						}
						?>
	
</div>
<?php
}
///////////////////////////////////shortcode update/////////////////////////////////////////////


add_action('init', 'hugesl_gallery_do_output_buffer');
function hugesl_gallery_do_output_buffer() {
        ob_start();
}
add_action('init', 'gallery_lang_load');

function gallery_lang_load()
{
    load_plugin_textdomain('sp_gallery', false, basename(dirname(__FILE__)) . '/Languages');

}


function huge_it_gallery_images_list_shotrcode($atts)
{
    extract(shortcode_atts(array(
        'id' => 'no huge_it gallery',
    
    ), $atts));




    return huge_it_gallery_images_list($atts['id']);

}


/////////////// Filter gallery


function gallery_after_search_results($query)
{
    global $wpdb;
    if (isset($_REQUEST['s']) && $_REQUEST['s']) {
        $serch_word = htmlspecialchars(($_REQUEST['s']));
        $query = str_replace($wpdb->prefix . "posts.post_content", gen_string_gallery_search($serch_word, $wpdb->prefix . 'posts.post_content') . " " . $wpdb->prefix . "posts.post_content", $query);
    }
    return $query;

}

add_filter('posts_request', 'gallery_after_search_results');


function gen_string_gallery_search($serch_word, $wordpress_query_post)
{
    $string_search = '';

    global $wpdb;
    if ($serch_word) {
        $rows_gallery = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "huge_itgallery_gallerys WHERE (description LIKE %s) OR (name LIKE %s)", '%' . $serch_word . '%', "%" . $serch_word . "%"));

        $count_cat_rows = count($rows_gallery);

        for ($i = 0; $i < $count_cat_rows; $i++) {
            $string_search .= $wordpress_query_post . ' LIKE \'%[huge_it_gallery id="' . $rows_gallery[$i]->id . '" details="1" %\' OR ' . $wordpress_query_post . ' LIKE \'%[huge_it_gallery id="' . $rows_gallery[$i]->id . '" details="1"%\' OR ';
        }
		
        $rows_gallery = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "huge_itgallery_gallerys WHERE (name LIKE %s)","'%" . $serch_word . "%'"));
        $count_cat_rows = count($rows_gallery);
        for ($i = 0; $i < $count_cat_rows; $i++) {
            $string_search .= $wordpress_query_post . ' LIKE \'%[huge_it_gallery id="' . $rows_gallery[$i]->id . '" details="0"%\' OR ' . $wordpress_query_post . ' LIKE \'%[huge_it_gallery id="' . $rows_gallery[$i]->id . '" details="0"%\' OR ';
        }

        $rows_single = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "huge_itgallery_images WHERE name LIKE %s","'%" . $serch_word . "%'"));

        $count_sing_rows = count($rows_single);
        if ($count_sing_rows) {
            for ($i = 0; $i < $count_sing_rows; $i++) {
                $string_search .= $wordpress_query_post . ' LIKE \'%[huge_it_gallery_Product id="' . $rows_single[$i]->id . '"]%\' OR ';
            }

        }
    }
    return $string_search;
}


///////////////////// end filter


add_shortcode('huge_it_gallery', 'huge_it_gallery_images_list_shotrcode');




function   huge_it_gallery_images_list($id)
{

    require_once("Front_end/gallery_front_end_view.php");
    require_once("Front_end/gallery_front_end_func.php");
    if (isset($_GET['product_id'])) {
        if (isset($_GET['view'])) {
            if ($_GET['view'] == 'huge_itgallery') {
                return showPublishedgallery_1($id);
            } else {
                return front_end_single_product($_GET['product_id']);
            }
        } else {
            return front_end_single_product($_GET['product_id']);
        }
    } else {
        return showPublishedgallery_1($id);
    }
}




add_filter('admin_head', 'huge_it_gallery_ShowTinyMCE');
function huge_it_gallery_ShowTinyMCE()
{
    // conditions here
    wp_enqueue_script('common');
    wp_enqueue_script('jquery-color');
    wp_print_scripts('editor');
    if (function_exists('add_thickbox')) add_thickbox();
    wp_print_scripts('media-upload');
    if (version_compare(get_bloginfo('version'), 3.3) < 0) {
        if (function_exists('wp_tiny_mce')) wp_tiny_mce();
    }
    wp_admin_css();
    wp_enqueue_script('utils');
    do_action("admin_print_styles-post-php");
    do_action('admin_print_styles');
}

function all_frontend_scripts_and_styles() {
    wp_register_script( 'jquery.colorbox-js', plugins_url('/js/jquery.colorbox.js', __FILE__), array('jquery'),'1.0.0',true  ); 
    wp_enqueue_script( 'jquery.colorbox-js' );
    wp_register_script( 'gallery-all-js', plugins_url('/js/gallery-all.js', __FILE__), array('jquery'),'1.0.0',true  ); 
    wp_enqueue_script( 'gallery-all-js' );
    wp_register_script( 'hugeitmicro-min-js', plugins_url('/js/jquery.hugeitmicro.min.js', __FILE__), array('jquery'),'1.0.0',true  ); 
    wp_enqueue_script( 'hugeitmicro-min-js' );
    
    wp_register_style( 'gallery-all-css', plugins_url('/style/gallery-all.css', __FILE__) );   
    wp_enqueue_style( 'gallery-all-css' );
    wp_register_style( 'style2-os-css', plugins_url('/style/style2-os.css', __FILE__) );   
    wp_enqueue_style( 'style2-os-css' );
    wp_register_style( 'lightbox-css', plugins_url('/style/lightbox.css', __FILE__) );   
    wp_enqueue_style( 'lightbox-css' );
}
add_action('wp_enqueue_scripts', 'all_frontend_scripts_and_styles');


add_action('admin_menu', 'huge_it_gallery_options_panel');
function huge_it_gallery_options_panel()
{
    $page_cat = add_menu_page('Theme page title', 'Huge IT Gallery', 'manage_options', 'gallerys_huge_it_gallery', 'gallerys_huge_it_gallery', plugins_url('images/huge_it_galleryLogoHover -for_menu.png', __FILE__));
    $page_option = add_submenu_page('gallerys_huge_it_gallery', 'General Options', 'General Options', 'manage_options', 'Options_gallery_styles', 'Options_gallery_styles');
    $lightbox_options = add_submenu_page('gallerys_huge_it_gallery', 'Lightbox Options', 'Lightbox Options', 'manage_options', 'Options_gallery_lightbox_styles', 'Options_gallery_lightbox_styles');
	add_submenu_page('gallerys_huge_it_gallery', 'Licensing', 'Licensing', 'manage_options', 'huge_it_imagegallery_Licensing', 'huge_it_imagegallery_Licensing');
	add_submenu_page('gallerys_huge_it_gallery', 'Featured Plugins', 'Featured Plugins', 'manage_options', 'huge_it__gallery_featured_plugins', 'huge_it__gallery_featured_plugins');

	add_action('admin_print_styles-' . $page_cat, 'huge_it_gallery_admin_script');
    add_action('admin_print_styles-' . $page_option, 'huge_it_gallery_option_admin_script');
    add_action('admin_print_styles-' . $lightbox_options, 'huge_it_gallery_option_admin_script');
}

function huge_it__gallery_featured_plugins()
{
	include_once("admin/huge_it_featured_plugins.php");
}
function huge_it_imagegallery_Licensing(){

	?>
    <div style="width:95%">
    <p>
	This plugin is the non-commercial version of the Huge IT Image Gallery. If you want to customize to the styles and colors of your website,than you need to buy a license.
Purchasing a license will add possibility to customize the general options of the Huge IT Image Gallery. 

 </p>
<br /><br />
<a href="http://huge-it.com/wordpress-gallery/" class="button-primary" target="_blank">Purchase a License</a>
<br /><br /><br />
<p>After the purchasing the commercial version follow this steps:</p>
<ol>
	<li>Deactivate Huge IT Image Gallery Plugin</li>
	<li>Delete Huge IT Image Gallery Plugin</li>
	<li>Install the downloaded commercial version of the plugin</li>
</ol>
</div>
<?php
	}

function gallery_sliders_huge_it_slider()
{

    require_once("admin/gallery_slider_func.php");
    require_once("admin/gallery_slider_view.php");
    if (!function_exists('print_html_nav'))
        require_once("gallery_function/html_gallery_func.php");


    if (isset($_GET["task"]))
        $task = $_GET["task"]; 
    else
        $task = '';
    if (isset($_GET["id"]))
        $id = $_GET["id"];
    else
        $id = 0;
    global $wpdb;
    switch ($task) {

        case 'add_cat':
            add_slider();
            break;
		case 'add_shortcode_post':
            add_shortcode_post();
            break;
		case 'popup_posts':
            if ($id)
                popup_posts($id);
            break;
		case 'gallery_video':
            if ($id)
                gallery_video($id);
            else {
                $id = $wpdb->get_var("SELECT MAX( id ) FROM " . $wpdb->prefix . "huge_itgallery_gallerys");
                gallery_video($id);
            }
            break;
        case 'edit_cat':
            if ($id)
                editslider($id);
            else {
                $id = $wpdb->get_var("SELECT MAX( id ) FROM " . $wpdb->prefix . "huge_itgallery_gallerys");
                editslider($id);
            }
            break;

        case 'save':
            if ($id)
                apply_cat($id);
        case 'apply':
            if ($id) {
                apply_cat($id);
                editslider($id);
            } 
            break;
        case 'remove_cat':
            removeslider($id);
            showslider();
            break;
        default:
            showslider();
            break;
    }
}

function gallery_Options_slider_styles()
{
    require_once("admin/gallery_slider_options_func.php");
    require_once("admin/gallery_slider_options_view.php");
    if (isset($_GET['task']))
        if ($_GET['task'] == 'save')
            save_styles_options();
    showStyles();
}

//////////////////////////Huge it Slider ///////////////////////////////////////////

function huge_it_gallery_admin_script()
{
	wp_enqueue_media();
	wp_enqueue_style("jquery_ui", "http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css", FALSE);
	wp_enqueue_style("jquery_ui", plugins_url("style/jquery-ui.css", __FILE__), FALSE);
	wp_enqueue_style("admin_css", plugins_url("style/admin.style.css", __FILE__), FALSE);
	wp_enqueue_script("admin_js", plugins_url("js/admin.js", __FILE__), FALSE);
}


function huge_it_gallery_option_admin_script()
{
	wp_enqueue_script("jquery_old", "http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js", FALSE);
	wp_enqueue_script("simple_slider_js",  plugins_url("js/simple-slider.js", __FILE__), FALSE);
	wp_enqueue_style("simple_slider_css", plugins_url("style/simple-slider_sl.css", __FILE__), FALSE);
	wp_enqueue_style("admin_css", plugins_url("style/admin.style.css", __FILE__), FALSE);
	wp_enqueue_script("admin_js", plugins_url("js/admin.js", __FILE__), FALSE);
	wp_enqueue_script('param_block2', plugins_url("elements/jscolor/jscolor.js", __FILE__));
}


function gallerys_huge_it_gallery()
{

    require_once("admin/gallery_func.php");
    require_once("admin/gallery_view.php");
    if (!function_exists('print_html_nav'))
        require_once("gallery_function/html_gallery_func.php");


    if (isset($_GET["task"]))
        $task = $_GET["task"]; 
    else
        $task = '';
    if (isset($_GET["id"]))
        $id = $_GET["id"];
    else
        $id = 0;
    global $wpdb;
    switch ($task) {

        case 'add_cat':
            add_gallery();
            break;
		case 'gallery_video':
            if ($id)
                gallery_video($id);
            else {
                $id = $wpdb->get_var("SELECT MAX( id ) FROM " . $wpdb->prefix . "huge_itgallery_gallerys");
                gallery_video($id);
            }
            break;
        case 'edit_cat':
            if ($id)
                editgallery($id);
            else {
                $id = $wpdb->get_var("SELECT MAX( id ) FROM " . $wpdb->prefix . "huge_itgallery_gallerys");
                editgallery($id);
            }
            break;

        case 'save':
            if ($id)
                apply_cat($id);
        case 'apply':
            if ($id) {
                apply_cat($id);
                editgallery($id);
            } 
            break;
        case 'remove_cat':
            removegallery($id);
            showgallery();
            break;
        default:
            showgallery();
            break;
    }


}


function Options_gallery_styles()
{
    require_once("admin/gallery_Options_func.php");
    require_once("admin/gallery_Options_view.php");
    if (isset($_GET['task']))
        if ($_GET['task'] == 'save')
            save_styles_options();
    showStyles();
}
function Options_gallery_lightbox_styles()
{
    require_once("admin/gallery_lightbox_func.php");
    require_once("admin/gallery_lightbox_view.php");
    if (isset($_GET['task']))
        if ($_GET['task'] == 'save')
            save_styles_options();
    showStyles();
}



/**
 * Huge IT Widget
 */
class Huge_it_gallery_Widget extends WP_Widget {


	public function __construct() {
		parent::__construct(
	 		'Huge_it_gallery_Widget', 
			'Huge IT gallery', 
			array( 'description' => __( 'Huge IT gallery', 'huge_it_gallery' ), ) 
		);
	}

	
	public function widget( $args, $instance ) {
		extract($args);

		if (isset($instance['gallery_id'])) {
			$gallery_id = $instance['gallery_id'];

			$title = apply_filters( 'widget_title', $instance['title'] );

			echo $before_widget;
			if ( ! empty( $title ) )
				echo $before_title . $title . $after_title;

			echo do_shortcode("[huge_it_gallery id={$gallery_id}]");
			echo $after_widget;
		}
	}


	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['gallery_id'] = strip_tags( $new_instance['gallery_id'] );
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}


	public function form( $instance ) {
		$selected_gallery = 0;
		$title = "";
		$gallerys = false;

		if (isset($instance['gallery_id'])) {
			$selected_gallery = $instance['gallery_id'];
		}

		if (isset($instance['title'])) {
			$title = $instance['title'];
		}

        

        
		?>
		<p>
			
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
					<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<label for="<?php echo $this->get_field_id('gallery_id'); ?>"><?php _e('Select gallery:', 'huge_it_gallery'); ?></label> 
				<select id="<?php echo $this->get_field_id('gallery_id'); ?>" name="<?php echo $this->get_field_name('gallery_id'); ?>">
				
				<?php
				 global $wpdb;
				$query="SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys ";
				$rowwidget=$wpdb->get_results($query);
				foreach($rowwidget as $rowwidgetecho){
				?>
					<option <?php if($rowwidgetecho->id == $instance['gallery_id']){ echo 'selected'; } ?> value="<?php echo $rowwidgetecho->id; ?>"><?php echo $rowwidgetecho->name; ?></option>
					<?php } ?>
				</select>
		</p>
		<?php 
	}
}

add_action('widgets_init', 'register_Huge_it_gallery_Widget');  

function register_Huge_it_gallery_Widget() {  
    register_widget('Huge_it_gallery_Widget'); 
}



//////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////               Activate gallery                     ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////
//////////////////////////////////////////////////////                                             ///////////////////////////////////////////////////////


function huge_it_gallery_activate()
{
    global $wpdb;

/// creat database tables



    $sql_huge_itgallery_images = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "huge_itgallery_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `gallery_id` varchar(200) DEFAULT NULL,
  `description` text,
  `image_url` text,
  `sl_url` varchar(128) DEFAULT NULL,
  `sl_type` text NOT NULL,
  `link_target` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  `published_in_sl_width` tinyint(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5";

    $sql_huge_itgallery_gallerys = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "huge_itgallery_gallerys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sl_height` int(11) unsigned DEFAULT NULL,
  `sl_width` int(11) unsigned DEFAULT NULL,
  `pause_on_hover` text,
  `gallery_list_effects_s` text,
  `description` text,
  `param` text,
  `sl_position` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` text,
   `huge_it_sl_effects` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ";


    $table_name = $wpdb->prefix . "huge_itgallery_images";
    $sql_2 = "
INSERT INTO 

`" . $table_name . "` (`id`, `name`, `gallery_id`, `description`, `image_url`, `sl_url`, `sl_type`, `link_target`, `ordering`, `published`, `published_in_sl_width`) VALUES
(1, 'Rocky Balboa', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '".plugins_url("Front_images/projects/1.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 0, 1, NULL),
(2, 'Skiing alone', '1', '<ul><li>lorem ipsumdolor sit amet</li><li>lorem ipsum dolor sit amet</li></ul><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '".plugins_url("Front_images/projects/2.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 1, 1, NULL),
(3, 'Summer dreams', '1', '<h6>Lorem Ipsum </h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>lorem ipsum</li><li>dolor sit amet</li><li>lorem ipsum</li><li>dolor sit amet</li></ul>', '".plugins_url("Front_images/projects/3.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 2, 1, NULL),
(4, 'Mr. Cosmo Kramer', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><h7>Dolor sit amet</h7><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '".plugins_url("Front_images/projects/4.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 3, 1, NULL),
(5, 'Edgar Allan Poe', '1', '<h6>Lorem Ipsum</h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '".plugins_url("Front_images/projects/5.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 4, 1, NULL),
(6, 'Fix the moment !', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '".plugins_url("Front_images/projects/6.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 5, 1, NULL),
(7, 'Lions eyes', '1', '<h6>Lorem Ipsum</h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '".plugins_url("Front_images/projects/7.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 6, 1, NULL),
(8, 'Photo with exposure', '1', '<h6>Lorem Ipsum </h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>lorem ipsum</li><li>dolor sit amet</li><li>lorem ipsum</li><li>dolor sit amet</li></ul>', '".plugins_url("Front_images/projects/8.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 7, 1, NULL),
(9, 'Travel with music', '1', '<h6>Lorem Ipsum </h6><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><ul><li>lorem ipsum</li><li>dolor sit amet</li><li>lorem ipsum</li><li>dolor sit amet</li></ul>', '".plugins_url("Front_images/projects/9.jpg", __FILE__)."', 'http://huge-it.com/fields/order-website-maintenance/', 'image', 'on', 7, 1, NULL)";



    $table_name = $wpdb->prefix . "huge_itgallery_gallerys";


    $sql_3 = "

INSERT INTO `$table_name` (`id`, `name`, `sl_height`, `sl_width`, `pause_on_hover`, `gallery_list_effects_s`, `description`, `param`, `sl_position`, `ordering`, `published`, `huge_it_sl_effects`) VALUES
(1, 'My First Gallery', 375, 600, 'on', 'random', '4000', '1000', 'center', 1, '300', '5')";


    $wpdb->query($sql_huge_itgallery_images);
    $wpdb->query($sql_huge_itgallery_gallerys);


    if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "huge_itgallery_images")) {
      $wpdb->query($sql_2);
    }
    if (!$wpdb->get_var("select count(*) from " . $wpdb->prefix . "huge_itgallery_gallerys")) {
      $wpdb->query($sql_3);
    }
	

}
register_activation_hook(__FILE__, 'huge_it_gallery_activate');