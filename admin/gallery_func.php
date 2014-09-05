	<?php	
	if(function_exists('current_user_can'))
	if(!current_user_can('manage_options')) {
	die('Access Denied');
}	
if(!function_exists('current_user_can')){
	die('Access Denied');
}

function showgallery() 
  {
	  
  global $wpdb;
  
  if(isset($_POST['search_events_by_title']))
$_POST['search_events_by_title']=esc_html(stripslashes($_POST['search_events_by_title']));
if(isset($_POST['asc_or_desc']))
$_POST['asc_or_desc']=esc_js($_POST['asc_or_desc']);
if(isset($_POST['order_by']))
$_POST['order_by']=esc_js($_POST['order_by']);
  $where='';
  	$sort["custom_style"] ="manage-column column-autor sortable desc";
	$sort["default_style"]="manage-column column-autor sortable desc";
	$sort["sortid_by"]='id';
	$sort["1_or_2"]=1;
	$order='';
	
	if(isset($_POST['page_number']))
	{
			
			if($_POST['asc_or_desc'])
			{
				$sort["sortid_by"]=$_POST['order_by'];
				if($_POST['asc_or_desc']==1)
				{
					$sort["custom_style"]="manage-column column-title sorted asc";
					$sort["1_or_2"]="2";
					$order="ORDER BY ".$sort["sortid_by"]." ASC";
				}
				else
				{
					$sort["custom_style"]="manage-column column-title sorted desc";
					$sort["1_or_2"]="1";
					$order="ORDER BY ".$sort["sortid_by"]." DESC";
				}
			}
	if($_POST['page_number'])
		{
			$limit=($_POST['page_number']-1)*20; 
		}
		else
		{
			$limit=0;
		}
	}
	else
		{
			$limit=0;
		}
	if(isset($_POST['search_events_by_title'])){
		$search_tag=esc_html(stripslashes($_POST['search_events_by_title']));
		}
		
		else
		{
		$search_tag="";
		}		
		
	 if(isset($_GET["catid"])){
	    $cat_id=$_GET["catid"];	
		}
       else
	   {
       if(isset($_POST['cat_search'])){
		$cat_id=$_POST['cat_search'];
		}else{
		
		$cat_id=0;}
       }
     
 if ( $search_tag ) {
		$where= " WHERE name LIKE '%".$search_tag."%' ";
	}
if($where){
	  if($cat_id){
	  $where.=" AND sl_width=" .$cat_id;
	  }
	
	}
	else{
	if($cat_id){
	  $where.=" WHERE sl_width=" .$cat_id;
	  }
	
	}
	
	 $cat_row_query="SELECT id,name FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE sl_width=0";
	$cat_row=$wpdb->get_results($cat_row_query);
	
	// get the total number of records
	$query = "SELECT COUNT(*) FROM ".$wpdb->prefix."huge_itgallery_gallerys". $where;
	
	$total = $wpdb->get_var($query);
	$pageNav['total'] =$total;
	$pageNav['limit'] =	 $limit/20+1;
	
	if($cat_id){
	$query ="SELECT  a.* ,  COUNT(b.id) AS count, g.par_name AS par_name FROM ".$wpdb->prefix."huge_itgallery_gallerys  AS a LEFT JOIN ".$wpdb->prefix."huge_itgallery_gallerys AS b ON a.id = b.sl_width LEFT JOIN (SELECT  ".$wpdb->prefix."huge_itgallery_gallerys.ordering as ordering,".$wpdb->prefix."huge_itgallery_gallerys.id AS id, COUNT( ".$wpdb->prefix."huge_itgallery_images.gallery_id ) AS prod_count
FROM ".$wpdb->prefix."huge_itgallery_images, ".$wpdb->prefix."huge_itgallery_gallerys
WHERE ".$wpdb->prefix."huge_itgallery_images.gallery_id = ".$wpdb->prefix."huge_itgallery_gallerys.id
GROUP BY ".$wpdb->prefix."huge_itgallery_images.gallery_id) AS c ON c.id = a.id LEFT JOIN
(SELECT ".$wpdb->prefix."huge_itgallery_gallerys.name AS par_name,".$wpdb->prefix."huge_itgallery_gallerys.id FROM ".$wpdb->prefix."huge_itgallery_gallerys) AS g
 ON a.sl_width=g.id WHERE  a.name LIKE '%".$search_tag."%' group by a.id ". $order ." "." LIMIT ".$limit.",20" ; 

	 }
	 else{
	 $query ="SELECT  a.* ,  COUNT(b.id) AS count, g.par_name AS par_name FROM ".$wpdb->prefix."huge_itgallery_gallerys  AS a LEFT JOIN ".$wpdb->prefix."huge_itgallery_gallerys AS b ON a.id = b.sl_width LEFT JOIN (SELECT  ".$wpdb->prefix."huge_itgallery_gallerys.ordering as ordering,".$wpdb->prefix."huge_itgallery_gallerys.id AS id, COUNT( ".$wpdb->prefix."huge_itgallery_images.gallery_id ) AS prod_count
FROM ".$wpdb->prefix."huge_itgallery_images, ".$wpdb->prefix."huge_itgallery_gallerys
WHERE ".$wpdb->prefix."huge_itgallery_images.gallery_id = ".$wpdb->prefix."huge_itgallery_gallerys.id
GROUP BY ".$wpdb->prefix."huge_itgallery_images.gallery_id) AS c ON c.id = a.id LEFT JOIN
(SELECT ".$wpdb->prefix."huge_itgallery_gallerys.name AS par_name,".$wpdb->prefix."huge_itgallery_gallerys.id FROM ".$wpdb->prefix."huge_itgallery_gallerys) AS g
 ON a.sl_width=g.id WHERE a.name LIKE '%".$search_tag."%'  group by a.id ". $order ." "." LIMIT ".$limit.",20" ; 
}

$rows = $wpdb->get_results($query);
 global $glob_ordering_in_cat;
if(isset($sort["sortid_by"]))
{
	if($sort["sortid_by"]=='ordering'){
	if($_POST['asc_or_desc']==1){
		$glob_ordering_in_cat=" ORDER BY ordering ASC";
	}
	else{
		$glob_ordering_in_cat=" ORDER BY ordering DESC";
	}
	}
}
$rows=open_cat_in_tree($rows);
	$query ="SELECT  ".$wpdb->prefix."huge_itgallery_gallerys.ordering,".$wpdb->prefix."huge_itgallery_gallerys.id, COUNT( ".$wpdb->prefix."huge_itgallery_images.gallery_id ) AS prod_count
FROM ".$wpdb->prefix."huge_itgallery_images, ".$wpdb->prefix."huge_itgallery_gallerys
WHERE ".$wpdb->prefix."huge_itgallery_images.gallery_id = ".$wpdb->prefix."huge_itgallery_gallerys.id
GROUP BY ".$wpdb->prefix."huge_itgallery_images.gallery_id " ;
	$prod_rows = $wpdb->get_results($query);
		
foreach($rows as $row)
{
	foreach($prod_rows as $row_1)
	{
		if ($row->id == $row_1->id)
		{
			$row->ordering = $row_1->ordering;
		$row->prod_count = $row_1->prod_count;
	}
		}
	
	}
	

	 

	 
	$cat_row=open_cat_in_tree($cat_row);
		html_showgallerys( $rows, $pageNav,$sort,$cat_row);
  }

function open_cat_in_tree($catt,$tree_problem='',$hihiih=1){

global $wpdb;
global $glob_ordering_in_cat;
static $trr_cat=array();
if(!isset($search_tag))
$search_tag='';
if($hihiih)
$trr_cat=array();
foreach($catt as $local_cat){
	$local_cat->name=$tree_problem.$local_cat->name;
	array_push($trr_cat,$local_cat);
	$new_cat_query=	"SELECT  a.* ,  COUNT(b.id) AS count, g.par_name AS par_name FROM ".$wpdb->prefix."huge_itgallery_gallerys  AS a LEFT JOIN ".$wpdb->prefix."huge_itgallery_gallerys AS b ON a.id = b.sl_width LEFT JOIN (SELECT  ".$wpdb->prefix."huge_itgallery_gallerys.ordering as ordering,".$wpdb->prefix."huge_itgallery_gallerys.id AS id, COUNT( ".$wpdb->prefix."huge_itgallery_images.gallery_id ) AS prod_count
FROM ".$wpdb->prefix."huge_itgallery_images, ".$wpdb->prefix."huge_itgallery_gallerys
WHERE ".$wpdb->prefix."huge_itgallery_images.gallery_id = ".$wpdb->prefix."huge_itgallery_gallerys.id
GROUP BY ".$wpdb->prefix."huge_itgallery_images.gallery_id) AS c ON c.id = a.id LEFT JOIN
(SELECT ".$wpdb->prefix."huge_itgallery_gallerys.name AS par_name,".$wpdb->prefix."huge_itgallery_gallerys.id FROM ".$wpdb->prefix."huge_itgallery_gallerys) AS g
 ON a.sl_width=g.id WHERE a.name LIKE '%".$search_tag."%' AND a.sl_width=".$local_cat->id." group by a.id  ".$glob_ordering_in_cat; 
 $new_cat=$wpdb->get_results($new_cat_query);
 open_cat_in_tree($new_cat,$tree_problem. "— ",0);
}
return $trr_cat;

}

function editgallery($id)
  {
	  
	  global $wpdb;
	  
	  if(isset($_GET["removeslide"])){
	     if($_GET["removeslide"] != ''){
	

	  $wpdb->query("DELETE FROM ".$wpdb->prefix."huge_itgallery_images  WHERE id = ".$_GET["removeslide"]." ");


	
	   }
	   }

	   $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE id= %d",$id);
	   $row=$wpdb->get_row($query);
	   if(!isset($row->gallery_list_effects_s))
	   return 'id not found';
       $images=explode(";;;",$row->gallery_list_effects_s);
	   $par=explode('	',$row->param);
	   $count_ord=count($images);
	   $cat_row=$wpdb->get_results("SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE id!=" .$id." and sl_width=0");
       $cat_row=open_cat_in_tree($cat_row);
	   	  $query=$wpdb->prepare("SELECT name,ordering FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE sl_width=%d  ORDER BY `ordering` ",$row->sl_width);
	   $ord_elem=$wpdb->get_results($query);
	   
	    $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_itgallery_images where gallery_id = %d order by ordering ASC  ",$row->id);
			   $rowim=$wpdb->get_results($query);
			   
			   if(isset($_GET["addslide"])){
			   if($_GET["addslide"] == 1){
	
$table_name = $wpdb->prefix . "huge_itgallery_images";
    $sql_2 = "
INSERT INTO 

`" . $table_name . "` ( `name`, `gallery_id`, `description`, `image_url`, `sl_url`, `ordering`, `published`, `published_in_sl_width`) VALUES
( '', '".$row->id."', '', '', '', 'par_TV', 2, '1' )";

    $wpdb->query($sql_huge_itgallery_images);
	

      $wpdb->query($sql_2);
	
	   }
	   }
	   
	
	   
	   $query="SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys order by id ASC";
			   $rowsld=$wpdb->get_results($query);
			  
			    $query = "SELECT *  from " . $wpdb->prefix . "huge_itgallery_params ";

    $rowspar = $wpdb->get_results($query);

    $paramssld = array();
    foreach ($rowspar as $rowpar) {
        $key = $rowpar->name;
        $value = $rowpar->value;
        $paramssld[$key] = $value;
    }
	
	 $query="SELECT * FROM ".$wpdb->prefix."posts where post_type = 'post' and post_status = 'publish' order by id ASC";
			   $rowsposts=$wpdb->get_results($query);
	 
	 $rowsposts8 = '';
	 $postsbycat = '';
	 if(isset($_POST["iframecatid"])){
	 	  $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."term_relationships where term_taxonomy_id = %d order by object_id ASC",$_POST["iframecatid"]);
		$rowsposts8=$wpdb->get_results($query);


	 

			   foreach($rowsposts8 as $rowsposts13){
	 $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."posts where post_type = 'post' and post_status = 'publish' and ID = %d  order by ID ASC",$rowsposts13->object_id);
			   $rowsposts1=$wpdb->get_results($query);
			   $postsbycat = $rowsposts1;
			   
	 }
	 }
	
	$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."gallery_huge_itslider_sliders WHERE id= %d",$id);
	$rowslider=$wpdb->get_row($query);
    Html_editgallery($ord_elem, $count_ord, $images, $row, $cat_row, $rowim, $rowsld, $paramssld, $rowsposts, $rowsposts8, $postsbycat, $rowslider);
  }
  
function add_gallery()
{
	global $wpdb;
	
	$query="SELECT name,ordering FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE sl_width=0 ORDER BY `ordering`";
	$ord_elem=$wpdb->get_results($query); ///////ordering elements list
	$cat_row=$wpdb->get_results("SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys where sl_width=0");
	$cat_row=open_cat_in_tree($cat_row);
	
	$table_name = $wpdb->prefix . "huge_itgallery_gallerys";
    $sql_2 = "
INSERT INTO 

`" . $table_name . "` ( `name`, `sl_height`, `sl_width`, `pause_on_hover`, `gallery_list_effects_s`, `description`, `param`, `ordering`, `published`, `huge_it_sl_effects`) VALUES
( 'New gallery', '375', '600', 'on', 'cubeH', '4000', '1000', '1', '300', '4')";

    $wpdb->query($sql_huge_itgallery_gallerys);

      $wpdb->query($sql_2);

   $query="SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys order by id ASC";
			   $rowsldcc=$wpdb->get_results($query);
			   $last_key = key( array_slice( $rowsldcc, -1, 1, TRUE ) );
			   
			   
	foreach($rowsldcc as $key=>$rowsldccs){
		if($last_key == $key){
			header('Location: admin.php?page=gallerys_huge_it_gallery&id='.$rowsldccs->id.'&task=apply');
		}
	}
	
	html_add_gallery($ord_elem, $cat_row);
	
}




function gallery_video($id)
{
	  global $wpdb;


	 
    Html_gallery_video();
}


function removegallery($id)
{

	global $wpdb;
	 $sql_remov_tag=$wpdb->prepare("DELETE FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE id = %d", $id);
 if(!$wpdb->query($sql_remov_tag))
 {
	  ?>
	  <div id="message" class="error"><p>gallery Not Deleted</p></div>
      <?php
	 
 }
 else{
 ?>
 <div class="updated"><p><strong><?php _e('Item Deleted.' ); ?></strong></p></div>
 <?php
 }
    $row=$wpdb->get_results($wpdb->prepare('UPDATE '.$wpdb->prefix.'huge_itgallery_gallerys SET sl_width="0"   WHERE sl_width= %d', $id));
	$rows=$wpdb->get_results($wpdb->prepare('SELECT * FROM '.$wpdb->prefix.'huge_itgallery_gallerys  ORDER BY `ordering` ASC '));
	
	$count_of_rows=count($rows);
	$ordering_values=array();
	$ordering_ids=array();
	for($i=0;$i<$count_of_rows;$i++)
	{		
	
		$ordering_ids[$i]=$rows[$i]->id;
		if(isset($_POST["ordering"]))
		$ordering_values[$i]=$i+1+$_POST["ordering"];
		else
		$ordering_values[$i]=$i+1;
	}

		for($i=0;$i<$count_of_rows;$i++)
	{	
			$wpdb->update($wpdb->prefix.'huge_itgallery_gallerys', 
			  array('ordering'      =>$ordering_values[$i]), 
              array('id'			=>$ordering_ids[$i]),
			  array('%s'),
			  array( '%s' )
			  );
	}

}

function apply_cat($id)
{	

		 global $wpdb;
		 if(!is_numeric($id)){
			 echo 'insert numerc id';
		 	return '';
		 }
		 if(!(isset($_POST['sl_width']) && isset($_POST["name"]) ))
		 {
			echo '';
		 }
		 $cat_row=$wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE id!= %d ", $id));
		 $corent_ord=$wpdb->get_var($wpdb->prepare('SELECT `ordering` FROM '.$wpdb->prefix.'huge_itgallery_gallerys WHERE id = %d AND sl_width=%d',$id,$_POST['sl_width']));
		 $max_ord=$wpdb->get_var('SELECT MAX(ordering) FROM '.$wpdb->prefix.'huge_itgallery_gallerys');
	
            $query=$wpdb->prepare("SELECT sl_width FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE id = %d", $id);
	        $id_bef=$wpdb->get_var($query);
      
	if(isset($_POST["content"])){
	$script_cat = preg_replace('#<script(.*?)>(.*?)</script>#is', '', stripslashes($_POST["content"]));
	}
			if($_POST["name"] != ''){
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  name = '".$_POST["name"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  sl_width = '".$_POST["sl_width"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  sl_height = '".$_POST["sl_height"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  pause_on_hover = '".$_POST["pause_on_hover"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  gallery_list_effects_s = '".$_POST["gallery_list_effects_s"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  description = '".$_POST["sl_pausetime"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  param = '".$_POST["sl_changespeed"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  sl_position = '".$_POST["sl_position"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  huge_it_sl_effects = '".$_POST["huge_it_sl_effects"]."'  WHERE id = '".$id."' ");
			$wpdb->query("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  ordering = '1'  WHERE id = '".$id."' ");
			}
		
	$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_itgallery_gallerys WHERE id = %d", $id);
	   $row=$wpdb->get_row($query);

			    $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_itgallery_images where gallery_id = %d order by id ASC", $row->id);
			   $rowim=$wpdb->get_results($query);
			   
			   foreach ($rowim as $key=>$rowimages){
if(isset($_POST["order_by_".$rowimages->id.""])){
$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  ordering = '".$_POST["order_by_".$rowimages->id.""]."'  WHERE ID = %d ", $rowimages->id));
$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  link_target = '".$_POST["sl_link_target".$rowimages->id.""]."'  WHERE ID = %d ", $rowimages->id));
$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  sl_url = '".$_POST["sl_url".$rowimages->id.""]."' WHERE ID = %d ", $rowimages->id));
$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  name = '".$_POST["titleimage".$rowimages->id.""]."'  WHERE ID = %d ", $rowimages->id));
$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  description = '".$_POST["im_description".$rowimages->id.""]."'  WHERE ID = %d ", $rowimages->id));
$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  image_url = '".$_POST["imagess".$rowimages->id.""]."'  WHERE ID = %d ", $rowimages->id));
}
}

if (isset($_POST['params'])) {
      $params = $_POST['params'];
      foreach ($params as $key => $value) {
          $wpdb->update($wpdb->prefix . 'huge_itgallery_params',
              array('value' => $value),
              array('name' => $key),
              array('%s')
          );
      }
     
    }
	
		
	   
	   if($_POST["imagess"] != ''){
				   		   $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."huge_itgallery_images where gallery_id = %d order by id ASC", $row->id);
			   $rowim=$wpdb->get_results($query);
	  foreach ($rowim as $key=>$rowimages){
	  $orderingplus = $rowimages->ordering+1;
	  $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_images SET  ordering = %d  WHERE ID = %d ", $orderingplus, $rowimages->id));
	  }
	$table_name = $wpdb->prefix . "huge_itgallery_images";
	$imagesnewuploader = explode(";;;", $_POST["imagess"]);
	array_pop($imagesnewuploader);
	foreach($imagesnewuploader as $imagesnewupload){
	
    $sql_2 = "
INSERT INTO 

`" . $table_name . "` ( `name`, `gallery_id`, `description`, `image_url`, `sl_url`, `sl_type`, `link_target`, `ordering`, `published`, `published_in_sl_width`) VALUES
( '', '".$row->id."', '', '".$imagesnewupload."', '', 'image', 'on', 'par_TV', 2, '1' )";

      $wpdb->query($sql_2);
		}	
	   }
	   
	if(isset($_POST["posthuge-it-description-length"])){
	 $wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."huge_itgallery_gallerys SET  published = %d WHERE id = %d ", $_POST["posthuge-it-description-length"], $_GET['id']));
}
	?>
	<div class="updated"><p><strong><?php _e('Item Saved'); ?></strong></p></div>
	<?php
	
    return true;
	
}

?>