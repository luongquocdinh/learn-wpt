<?php
/*
Template Name: Mail Journal
*/
get_header(); ?>
<div id="primary">
	<div id="content">		
		<h2><img src="<?php echo get_template_directory_uri(); ?>/images/mail_journal/h2_01.jpg" width="720" height="46" alt="メールジャーナル" /></h2>
		<div class="content_wrapper">
			<p><em class="bold">日本臨床細胞学会会員の皆様へお知らせ</em><br/>
日本臨床細胞学会情報処理小委員会では最新の情報を随時メールで発信いたします。<br/>
不定期メールジャーナルとお考え下さい。</p>

			<p>情報メールを希望される方は、<a href="mailto:test@yahoo.com">test@yahoo.com</a>まで、<br/>
名前、所属、会員番号と「メールジャーナル希望」とご記入の上、ご連絡ください。</p>

			<div id="contact_banner">
				<a href="<?php echo get_permalink(10);?>"><img src="<?php echo get_template_directory_uri(); ?>/images/contact_banner.jpg" width="700" height="112" alt="〒 480-1195 愛知県長久手市岩作雁又1-1" />
				<p class="address">〒480-1103 愛知県長久手市岩作雁又１－１</p></a>
			</div>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>