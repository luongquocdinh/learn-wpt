<?php
/*
Template Name: Contact Complete
*/
get_header(); ?>
<div id="primary">
	<div id="content">		
		<h2><img src="<?php echo get_template_directory_uri(); ?>/images/contact/h2_01.jpg" width="720" height="46" alt="お問い合わせ" /></h2>
		<div class="content_wrapper">
			<p>この度はお問い合わせ頂ありがとうございます。<br/>
内容を確認の上ご連絡を差し上げますので、しばらくの間お待ちください。</p>
<p>
3営業日以上経っても連絡がない場合は、当事務局ににお問い合わせ内容が届いてない可能性がございます。
その場合は、恐れ入りますが、もう一度お問い合わせ下さい。</p>
			
			<div id="contact_banner">
				<a href="<?php echo get_permalink(10);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/contact_banner.jpg" width="700" height="112" alt="〒 466-8650 愛知県名古屋市昭和区妙見町２－９" />
				<p class="address">〒480-1103 愛知県長久手市岩作雁又１－１</p></a>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>