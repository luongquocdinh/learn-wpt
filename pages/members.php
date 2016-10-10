<?php
/*
Template Name: Members
*/
get_header(); ?>
<div id="primary">
	<div id="content">		
		<h2><img src="<?php echo get_template_directory_uri(); ?>/images/members/h2_01.jpg" width="720" height="46" alt="会員情報システムについて" /></h2>
		<div class="content_wrapper">

			<p>会員情報システムを導入致しました。</p>
			<p>お手数をお掛け致しますが、下記「会員情報システム」ボタンよりログインし、会員情報の入力をお願い致します。<br />
			会員情報の入力方法は、「入力の手引き(PDF:685kb)」をダウンロードし、参考にして下さい。</p>
			
			<div>
				<a href="http://jscc-tokai.jp/member/login" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/members/btn01.jpg" width="188" height="43" alt="会員情報システム" /></a>
				<a href="<?php echo get_template_directory_uri(); ?>/doc/guidance.pdf" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/members/btn02.jpg" width="188" height="43" alt="入力の手引き" /></a>
			</div>
			
			<div id="contact_banner">
				<a href="<?php echo get_permalink(10);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/contact_banner.jpg" width="700" height="112" alt="〒 466-8650 愛知県名古屋市昭和区妙見町２－９" />
				<p class="address">〒 480-1103 愛知県長久手市岩作雁又１－１</p></a>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>