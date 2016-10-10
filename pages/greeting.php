<?php
/*
Template Name: Greeting
*/
get_header(); ?>
<div id="primary">
	<div id="content">		
		<h2><img src="<?php echo get_template_directory_uri(); ?>/images/greeting/h2_01.jpg" width="720" height="46" alt="ご挨拶" /></h2>
		<div class="content_wrapper">
			<p style="font-weight: 700; font-size: 17px;">日本臨床細胞学会東海連合会会長　都築　豊徳</p>
			<p>この度、日本臨床細胞学会東海連合会会長を拝命いたしました名古屋第二赤十字病院病理診断科の都築豊徳と申します。この場をお借りして、挨拶させて頂きます。</p>
			<p>日本臨床細胞学会東海連合会は愛知、岐阜、三重の３県よりなる会員数約600名から構成されております。本会は全国的、国際的に活躍する人材を数多く輩出し続けている活気に満ちた学究的な会であります。それと同時に、顔なじみ同士が気軽に集まり、細胞診について忌憚のない意見を議論ができる家族的な側面も持つ会です。30年あまりにわたって発展を続けてきた歴史ある東海連合会が今後さらに飛躍できるよう努力してまいりたいと存じます。</p>
			<p>近年、医療において細胞診に求められるものは質量ともに増大傾向を続け、細胞診専門医、細胞検査士の果たす社会的役割は益々増してきています。このような状況下で、東海連合会において、会員一人一人が細胞診の力を最大限に活かし、様々な場で活躍できる環境作りに力を注ぐことが私の役目と考えております。微力ではございますが、職責を全うできるよう努力してまいりたいと存じます。</p>
			<p>会員各位のご指導、ご支援のほどよろしくお願い申し上げます</p>
			<p class="fright">平成27年3月吉日</p>
		</div>
		
		<h2><img src="<?php echo get_template_directory_uri(); ?>/images/greeting/h2_02.jpg" width="720" height="46" alt="日本臨床細胞学会　東海連合会事務局 " /></h2>
		<div class="content_wrapper">
			<table>
				<tr>
					<th>住所</th><td>〒480-1103<br/>愛知県長久手市岩作雁又１－１</td>
				</tr>
				<tr>
					<th>TEL</th><td> 0561-62-3311</td>
				</tr>
				<tr>
					<th>E-mail</th><td><a href="<?php echo get_permalink(10);?>">お問い合わせはこちらまで</a></td>
				</tr>
				<tr>
					<th>担当</th><td>愛知医科大学病院　病院病理部<br/>事務局　和田栄里子</td>
				</tr>
			</table>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>