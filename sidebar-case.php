<div id="secondary" class="widget-area">
	<script type="text/javascript">
			jQuery(document).ready(function($) {
			$('ul.hospital_list').each(function(){
			  var max = 9;
			  if ($(this).find("li").length > max) {
				$(this)
				  .find('li:gt('+max+')')
				  .hide()
				  .end()
				  .append(
					$('<li class="more"><a>もっと見る</a></li>').click( function(){
					  $(this).siblings(':hidden').show().end().remove();
					})
				);
			  }
			});
			
			$('ul#category_list').each(function(){
			  var max = 14;
			  if ($(this).find("li").length > max) {
				$(this)
				  .find('li:gt('+max+')')
				  .hide()
				  .end()
				  .append(
					$('<li class="more"><a>もっと見る</a></li>').click( function(){
					  $(this).siblings(':hidden').show().end().remove();
					})
				);
			  }
			});
			
			});
			</script>

	<div id="metting_no" class="widget">
		<h4><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/metting_ttl.jpg" width="220" height="32" alt="例会別"/></h4>
		<?php $terms = get_terms("case_category",array('hide_empty'=>true,'orderby' => 'id', 'order' => 'DESC'));?>
		<div class="widget_content">
			<ul id="category_list" class="clearFix">
			<?php foreach($terms as $term){
				echo "<li>";
				echo "<a href='".get_bloginfo("siteurl")."/case_category/".$term->slug."?current=category'>" . $term->name . "</a>";
				echo "</li>";
			}?>
			</ul>
		</div>
		
	</div>
	<div id="hospital" class="widget">
		<h4><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/hospital_ttl.jpg" width="220" height="32" alt="病院別"/></h4>
		<?php 
			$hospital = array();
			$args = array( 'post_type' => 'case','posts_per_page'=>'-1','post_status'=>'publish','orderby' => 'ID', 'order' => 'DESC');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				$this_hospital = get_post_meta( $post->ID, 'case_hospital', true );
				
					if ( ! in_array( $this_hospital, $hospital ) ) {
						$hospital[$post->ID] = $this_hospital;
					}
			endwhile;
		
		?>
		<div class="widget_content">
			<ul class="hospital_list clearFix">
			<?php foreach($hospital as $key => $item){
				echo "<li>";
				echo "<a href='".get_bloginfo("siteurl")."/case/"."?current=hospital&sa=".$item."'>" . $item . "</a>";
				echo "</li>";
			}?>
			</ul>
		</div>
	
	</div>	
	
	
	<div id="specific" class="widget">
		<h4><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/specific_ttl.jpg" width="220" height="32" alt="部位別"/></h4>
		<?php 
			$specific = array();
		
			while ( $loop->have_posts() ) : $loop->the_post();
				$this_specific = get_post_meta( $post->ID, 'case_site_specific', true );
				
					if ( ! in_array( $this_specific, $specific ) ) {
						$specific[] = $this_specific;
					}
				
			endwhile;
		
		?>
		<div class="widget_content">
			<ul class="hospital_list clearFix">
			<?php foreach($specific as $item){
				echo "<li>";
				echo "<a href='".get_bloginfo("siteurl")."/case/"."?current=specific&sa=".$item."'>" . $item . "</a>";
				echo "</li>";
			}?>
			</ul>
		</div>
		<?php wp_reset_query(); ?> 
	</div>	
</div><!-- #secondary .widget-area -->