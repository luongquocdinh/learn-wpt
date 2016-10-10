<?php
/*
Template Name: Recommend Info
*/
get_header(); ?>

		<div id="primary">
			<div id="content">		
				<h2><img src="<?php echo get_template_directory_uri(); ?>/images/case/h2_01.jpg" width="720" height="46" alt="例会提示症例一覧" /></h2>
				<div class="content_wrapper" id ="case_detail">
				<?php 
			
					$post_type = "case";
					$taxonomy = 'case_category';
					$current = $_GET['current'];
					$paged = $_GET['page'] ? $_GET['page'] : 1;
					$per_page = 3;
					$offset = ($paged - 1) * $per_page;
					$term = get_query_var('term');
					if($term != '' || $term != null){
						 $current = "category";
						 $mypost = array( 'post_type' => $post_type,'order' => 'DESC','tax_query' => array(
						 array(
							 'taxonomy' => $taxonomy,
							 'field' => 'slug',
							 'terms' => $term
						 )
						) );
						
						$my_query = new WP_Query( $mypost );
						if( $my_query->have_posts() ) { ?>
								<h3 id="<?php echo $tax_term->slug; ?>" class="h3_title"><?php echo get_term_by('slug', $term, $taxonomy)->name; ?></h3>
								<div class="mb20">
									 <?php $j=0; while ($my_query->have_posts()) : $my_query->the_post(); ?>
									
									 <?php $j++;
										if($j==1){
											$class2= 'first';
										}elseif($j== $my_query->post_count){
											$class2= 'last';
										}else{
											$class2= '';
										}
										if($my_query->post_count==1)
											$class2= 'first last';
										?>
									<dl class="<?php echo $class2;?>">
										<dt><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></dt>
										<dd><?php echo esc_html( get_post_meta( get_the_ID(), 'case_hospital', true ) ); ?><br/><?php echo esc_html( get_post_meta( get_the_ID(), 'case_site_specific', true ) ); ?> <?php echo esc_html( get_post_meta( get_the_ID(), 'case_case', true ) );?> <?php echo esc_html( get_post_meta( get_the_ID(), 'case_sex', true ) );?></dd>
									</dl>
									<?php endwhile; ?>
									
								</div>
								<?php
							}
							wp_reset_query();
					}
				
					else{
	//all	
						if($current == ''){
							$get_terms_args = array('order' => 'DESC','hide_empty'=>true,'number' => $per_page, 'offset' => $offset);
							$wp_query_args = array('order' => 'DESC');
							$tax_terms = get_terms( $taxonomy, $get_terms_args );
							if( $tax_terms ){
							foreach( $tax_terms  as $tax_term ){
							$query_args = array(
								'post_type' => $post_type,
								"$taxonomy" => $tax_term->slug,
								'post_status' => 'publish',
								'posts_per_page' => -1,
								'ignore_sticky_posts' => true,
								
							);
							$query_args = wp_parse_args( $wp_query_args, $query_args );
							
							$my_query = new WP_Query( $query_args );
							if( $my_query->have_posts() ) { ?>
								<h3 id="<?php echo $tax_term->slug; ?>" class="h3_title"><?php echo $tax_term->name; ?></h3>
								<div class="mb20">
									 <?php $j=0; while ($my_query->have_posts()) : $my_query->the_post(); ?>
									 <?php $j++;
										if($j==1){
											$class2= 'first';
										}elseif($j== $my_query->post_count){
											$class2= 'last';
										}else{
											$class2= '';
										}
										if($my_query->post_count==1)
											$class2= 'first last';
										?>
									<dl class="<?php echo $class2;?>">
										<dt><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></dt>
										<dd><?php echo esc_html( get_post_meta( get_the_ID(), 'case_hospital', true ) ); ?><br/><?php echo esc_html( get_post_meta( get_the_ID(), 'case_site_specific', true ) ); ?> <?php echo esc_html( get_post_meta( get_the_ID(), 'case_case', true ) );?> <?php echo esc_html( get_post_meta( get_the_ID(), 'case_sex', true ) );?></dd>
									</dl>
									<?php endwhile; ?>
									
								</div>
								<?php
							}
							
							}
						}

							
						
							$total_terms = count(get_terms("case_category",array('hide_empty'=>true)));
							$totalpages = ceil($total_terms/$per_page);
							if($totalpages > 1)
							{	
								echo '<ul class="pagination clearFix">';	
								
								$range = 3;
								$currentpage = $paged;

								if ($currentpage > 1) {

								  //echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=1'><<</a></li>";
								   $prevpage = $currentpage - 1;

								  echo "<li><a href='".add_query_arg( 'page', $prevpage )."'>前へ</a></li>";
								} 

								for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
								   if (($x > 0) && ($x <= $totalpages)) {
										  if ($x == $currentpage) {
											 echo "<li class='current'>$x</li>";
										  } else {
										 echo "<li><a href='".add_query_arg( 'page', $x )."'>$x</a></li>";
									  }
								   }
								}
													   
								if ($currentpage != $totalpages) {
								   $nextpage = $currentpage + 1;
								   echo "<li><a href='".add_query_arg( 'page', $nextpage )."'>次へ</a></li>";
								 //  echo "<li><a href='".get_template_directory_uri()."/ajax/news.php?cat=".$category_key."&page=".$totalpages."'></a></li>";
								}

								echo '</ul>';
							}
							wp_reset_query();
							
							
						}
		// hospital
						elseif($current !=''){
							if($current== 'hospital'){
								$meta_key = 'case_hospital';
							}elseif($current== 'specific'){
								$meta_key = 'case_site_specific';
							}
							$search_name = $_GET['sa'];
							$list_term =array();
							$post_array =array();
							$mypost = array( 'post_type' => $post_type,'posts_per_page'=>-1,  'meta_key' => $meta_key, 'orderby' => 'meta_value','order' => 'DESC',
							'meta_query' => array(
								   array(
									   'key' => $meta_key,
									   'value' => $search_name,
									   'compare' => '=',
								   )
							   ));
							$my_query = new WP_Query( $mypost );
							while ($my_query->have_posts()) : $my_query->the_post(); 
								$this_term =  wp_get_post_terms($post->ID, 'case_category', array("fields" => "ids"));
								$list_term[$post->ID] = $this_term[0];
							 endwhile; 
							
							foreach ($list_term as $post_id => $term_name ){
								$post_array[$term_name][] = $post_id;
							}
							
							krsort($post_array);
							
							foreach ($post_array as $key => $value ){
							
							?>
								<h3 id="<?php echo $tax_term->slug; ?>" class="h3_title"><?php echo get_term_by('id', $key, $taxonomy)->name; ?></h3>
								<div class="mb20">
									 <?php $j=0; foreach($value as $post_id) {
												
									 ?>
									
									 <?php $j++;
										if($j==1){
											$class2= 'first';
										}elseif($j== $my_query->post_count){
											$class2= 'last';
										}else{
											$class2= '';
										}
										if($my_query->post_count==1)
											$class2= 'first last';
										?>
									<dl class="<?php echo $class2;?>">
										<?php $fields = get_post($post_id); 
										$custom_fields = get_post_custom($post_id); 
										
									?>
										<dt><a href="<?php echo get_permalink($post_id); ?>"><?php  echo $fields->post_title; ?></a></dt>
										<dd><?php echo $custom_fields['case_hospital'][0]; ?><br/><?php echo $custom_fields['case_site_specific'][0]; ?> <?php echo $custom_fields['case_case'][0];?> <?php echo $custom_fields['case_sex'][0];?></dd>
									</dl>
									<?php } ?>
									
								</div>
							<?php }
							wp_reset_query();	
						}
					}
	
					
					?>
						
				</div>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar('case'); ?>
<?php get_footer(); ?>