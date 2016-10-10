<?php
/*
Template Name: Contact
*/
get_header(); ?>
<div id="primary">
	<div id="content">		
		<h2><img src="<?php echo get_template_directory_uri(); ?>/images/contact/h2_01.jpg" width="720" height="46" alt="お問い合わせ" /></h2>
		<div class="content_wrapper">
			<p class="message_text">記内容をご記入の上、「確認」ボタンをクリックしてください。</p>
			<p class="label"><span class="red bold">*</span>は入力必須項目です。</p>
			<script src="<?php echo get_template_directory_uri(); ?>/js/contact-form7-confirm.js" type="text/javascript"></script>
			<link href="<?php echo get_template_directory_uri(); ?>/js/contact-form7-confirm.css" rel="stylesheet" type="text/css" media="all" />
			<?php echo do_shortcode('[contact-form-7 id="9" title="コンタクトフォーム 1"]');?>
			<div id="contact_banner">
				<img src="<?php echo get_template_directory_uri(); ?>/images/contact_banner.jpg" width="700" height="112" alt="〒 480-1195 愛知県長久手市岩作雁又1-1" />
				<p class="address">〒480-1103 愛知県長久手市岩作雁又１－１</p>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>