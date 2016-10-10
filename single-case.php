<?php
/*
Template Name: News Detail
*/
get_header(); ?>

		<div id="primary">
			<div id="content">	
				<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/elastislide.css" />
				<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css"   type="text/css" media="all">
				<script src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js"></script>
				<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.17475.js"></script>
				<?php if (have_posts()) : while (have_posts()) : the_post(); 
				$custom = get_post_custom($post->ID);
				$upload_image = $custom["upload_image"][0];
				$upload_image = explode( ';', $upload_image);
				$attach_files = array_diff($upload_image, array(""));
				?>
					 		
				<h2 class="h2_title"><p><span><?php echo $post->post_title; ?></span></p></h2>
				<div class="content_wrapper">
				
					<div class="title_bar">
						<?php echo nl2br($custom["case_address"][0]);?>
					</div>
					<?php if(count($attach_files)>0){ ?>
					<div class="slider">
					
						<ul id="carousel" class="elastislide-list clearFix">
						<?php foreach($attach_files as $link)
							{?>
								<li><a href="<?php echo $link;?>" title="" rel="lightbox[present]"><img width="150px" height="120px" src="<?php echo $link;?>" alt="" /></a></li>
							<?php } ?>
							
						</ul>
						<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.elastislide.js"></script>
						<script type="text/javascript">
							jQuery( '#carousel').elastislide();	
						</script>
					</div>
					<?php } ?>
					<?php if($custom["case_case"][0]!=''): ?>
					<h3 class="h3_title">症例</h3>
					
					<div class="text_wrapper">
						<?php echo nl2br($custom["case_site_specific"][0]);?> <?php echo nl2br($custom["case_case"][0]);?> <?php echo nl2br($custom["case_sex"][0]);?><br/><?php echo nl2br($custom["case_case2"][0]);?>
					</div>
					<?php endif;?>
					<?php if($custom["case_cytology"][0]!=''): ?>
					<h3 class="h3_title">細胞診所見</h3>
					<div class="text_wrapper">
						<?php echo nl2br($custom["case_cytology"][0]);?>
					</div>
					<?php endif;?>
					<?php if($custom["case_histology"][0]!=''): ?>
					<h3 class="h3_title">組織所見</h3>
					<div class="text_wrapper">
						<?php echo nl2br($custom["case_histology"][0]);?>
					</div>
					<?php endif;?>
					<?php if($custom["case_conclusion"][0]!=''): ?>
					<h3 class="h3_title">まとめ / 考察</h3>
					<div class="text_wrapper">
						<?php echo nl2br($custom["case_conclusion"][0]);?>
					</div>
					<?php endif;?>
					
				</div>
				<?php endwhile; endif; ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar('case'); ?>
<?php get_footer(); ?>

