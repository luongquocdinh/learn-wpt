<?php 
define( 'BLOCK_LOAD', true );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
	$key_arr= array("meeting_news"=>'session','workshop_news'=>'date');
	$cat_arr= array("meeting_news"=>'meeting','workshop_news'=>'workshop');
	$cat_arr2= array("meeting"=>'meeting_news','workshop'=>'workshop_news');
	$category = $cat_arr[$_GET['cat']];
	$key = $key_arr[$_GET['cat']];
	$category_key = $cat_arr2[$category];
	$paged = isset($_GET['page']) ? $_GET['page'] : 1;
	$per_page = 5;
	$mypost = array( 'post_type' => 'news','posts_per_page'=>$per_page, 'paged' =>  $paged,'meta_key' => $key,  'orderby' => 'meta_value','order' => 'DESC','post_status'=>'publish' ,
	'meta_query' => array(
		   array(
			   'key' => 'category_chooser',
			   'value' => $category,
			   'compare' => '=',
		   )
	   ));
	 
	 $loop = new WP_Query( $mypost );
	
		$i=0; while ( $loop->have_posts() ) : $loop->the_post();
			$i++;
			if($i==1){
				$class= 'first';
			}elseif($i==$loop->post_count){
				$class= 'last';
			}else{
				$class= '';
			}
			if($loop->post_count == 1){
				$class= 'first last';
			}
			?>
					
			<dl class="<?php echo $class;?>">
				<dt class="date"><a href="<?php the_permalink(); ?>"><?php echo mysql2date('Y年m月d日', get_post_meta( get_the_ID(), $key, true )); ?></a></dt>
				<dd><?php echo $post->post_title;?></dd>
			</dl>
	<?php endwhile; 

if($loop->max_num_pages > 1)
	{	

echo '<ul id="'.$category.'-paging" class="pagination clearFix">';	

$totalpages = $loop->max_num_pages;
$range = 1;
$currentpage = $paged;

if ($currentpage > 1) {

  //echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=1'><<</a></li>";
   $prevpage = $currentpage - 1;

  echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=".$prevpage."'>前へ</a></li>";
} 

for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   if (($x > 0) && ($x <= $totalpages)) {
		  if ($x == $currentpage) {
			 echo "<li class='current'>$x</li>";
		  } else {
		echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=".$x."'>".$x."</a></li>";
      }
   }
}
                       
if ($currentpage != $totalpages) {
   $nextpage = $currentpage + 1;
   echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=".$nextpage."'>次へ</a></li>";
 //  echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=".$totalpages."'></a></li>";
}

echo '</ul>';
}
wp_reset_query(); ?> 	