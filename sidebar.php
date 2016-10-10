<div id="secondary" class="widget-area">
	<div id="news" class="widget">
		<h4><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/news_ttl.jpg" width="220" height="32" alt="お知らせ"/></h4>
		<?php
			$post_per_page = 2;
			$paged = 1;
			$category = 'meeting';
			$mypost = array( 'post_type' => 'news','posts_per_page'=>$post_per_page, 'paged' =>  $paged, 'meta_key' => 'session', 'orderby' => 'meta_value','order' => 'DESC',
			'meta_query' => array(
				   array(
					   'key' => 'category_chooser',
					   'value' => $category,
					   'compare' => '=',
				   )
			   ));
			 $loop = new WP_Query( $mypost );
			
		?>
		<h5><a href="<?php echo get_permalink($loop->posts[0]->ID); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/meeting_news_ttl.jpg" width="220" height="30" alt="総会・例会のご案内"/></a></h5>
		<div id="meeting_news" class="widget_content">
			<?php $i=0; while ( $loop->have_posts() ) : $loop->the_post();
			$i++;
			if($i==1){
				$class= 'first';
			}elseif($i==$post_per_page){
				$class= 'last';
			}else{
				$class= '';
			}
			if($loop->post_count == 1){
				$class= 'first last';
			}
			?>
			<dl class="<?php echo $class;?>">
				<dt class="date"><a href="<?php the_permalink(); ?>"><?php echo mysql2date('Y年m月d日', get_post_meta( get_the_ID(), 'session', true )); ?></a></dt>
				<dd><?php echo $post->post_title;?></dd>
			</dl>
			<?php endwhile;  ?>
			 <?php wp_reset_query(); ?> 
		</div>
		<?php
					
			$category = 'workshop';
			$mypost = array( 'post_type' => 'news','posts_per_page'=>$post_per_page, 'paged' =>  $paged, 'meta_key' => 'date', 'orderby' => 'meta_value','order' => 'DESC',
			'meta_query' => array(
				   array(
					   'key' => 'category_chooser',
					   'value' => $category,
					   'compare' => '=',
				   )
			   ));
			 $loop = new WP_Query( $mypost );
			?>
		<h5><a href="<?php echo get_permalink($loop->posts[0]->ID); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/workshop_news_ttl.jpg" width="220" height="30" alt="講習会・模擬試験のご案内"/></a></h5>
		<div id="workshop_news" class="widget_content">
			<?php $i=0; while ( $loop->have_posts() ) : $loop->the_post();
			$i++;
			if($i==1){
				$class= 'first';
			}elseif($i==$post_per_page){
				$class= 'last';
			}else{
				$class= '';
			}
			if($loop->post_count == 1){
				$class= 'first last';
			}
			?>
			
			<dl class="<?php echo $class;?>">
				<dt class="date"><a href="<?php the_permalink(); ?>"><?php echo mysql2date('Y年m月d日', get_post_meta( get_the_ID(), 'date', true )); ?></a></dt>
				<dd><?php echo $post->post_title;?></dd>
			</dl>
			<?php endwhile;  ?>
			 <?php wp_reset_query(); ?> 
		</div>
	</div>
	<div id="case" class="widget">
		<a href="<?php echo get_post_type_archive_link( 'case' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/case_widget.jpg" width="220" height="62" alt="例会提示症例"/></a>
	</div>
	<div id="link" class="widget">
		<a href="<?php echo get_permalink(5);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/link_widget.jpg" width="220" height="62" alt="リンク"/></a>
	</div>
	<div id="mail-journal" class="widget">
		<a href="<?php echo get_permalink(7);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/mail_widget.jpg" width="220" height="62" alt="メールジャーナル"/></a>
	</div>
	
</div><!-- #secondary .widget-area -->