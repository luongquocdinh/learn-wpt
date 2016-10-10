<?php
class Banner_01 extends WP_Widget {	
	function Banner_01(){
		parent::WP_Widget('Banner_01', 
			'Banner_01', 
			array('description' => 'Banner_01'));
	}		
	function widget( $args, $instance ) {
		extract($args);	
		echo $before_widget;
		if ( !empty( $title ) ) { 
			echo $before_title . $title . $after_title; } ?>			
				<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/common/widget/widget_1.jpg" width="180" height="80" alt="" /></a>			  
		<?php
		echo $after_widget;
	}
}
register_widget('Banner_01');

class Banner_02 extends WP_Widget {	
	function Banner_02(){
		parent::WP_Widget('Banner_02', 
			'Banner_02', 
			array('description' => 'Banner_02'));
	}		
	function widget( $args, $instance ) {
		extract($args);	
		echo $before_widget;
		if ( !empty( $title ) ) { 
			echo $before_title . $title . $after_title; } ?>			
				<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/common/widget/widget_2.jpg" width="180" height="65" alt="" /></a>			  
		<?php
		echo $after_widget;
	}
}
register_widget('Banner_02');


class Banner_03 extends WP_Widget {	
	function Banner_03(){
		parent::WP_Widget('Banner_03', 
			'Banner_03', 
			array('description' => 'Banner_03'));
	}		
	function widget( $args, $instance ) {
		extract($args);	
		echo $before_widget;
		if ( !empty( $title ) ) { 
			echo $before_title . $title . $after_title; } ?>			
				<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/common/widget/widget_3.jpg" width="180" height="104" alt="" /></a>			  
		<?php
		echo $after_widget;
	}
}
register_widget('Banner_03');


class About_widget extends WP_Widget {	
	function About_widget(){
		parent::WP_Widget('About_widget', 
			'About_widget', 
			array('description' => 'About_widget'));
	}		
	function widget( $args, $instance ) {
		extract($args);	
		echo $before_widget;
		if ( !empty( $title ) ) { 
			echo $before_title . $title . $after_title; } ?>			
				<div id="aboutMeishoEcoClub" class="corner_box">
					<h3 class="widget_title">名商ecoクラブとは？</h3>
					<div class="text_wrap">
						<p>「名商ｅｃｏクラブ」は名古屋商工会議所が会員企業の環境活動をサポートするために発足しました。<br/>
						視察会、セミナーの他、環境活動を通じた企業PR、交流が簡単にできる本サイトも運営しています。</p>
					</div>
					<p class="imgMore"><a href="#">詳細はこちら</a></p>
				</div>
		<?php
		echo $after_widget;
	}
}
register_widget('About_widget');

class Mail_magazine extends WP_Widget {	
	function Mail_magazine(){
		parent::WP_Widget('Mail_magazine', 
			'Mail_magazine', 
			array('description' => 'Mail_magazine'));
	}		
	function widget( $args, $instance ) {
		extract($args);	
		echo $before_widget;
		if ( !empty( $title ) ) { 
			echo $before_title . $title . $after_title; } ?>			
			
				<div id="mailMagazine" class="corner_box"> 
				<h3>メールマガジン</h3>
				  <p>メールマガジン登録</p>
				 <ul class="clearfix">
				   <li id="mailMagazineRegist"><a href="#">メールマガジン登録</a></li>
				   <li id="mailMagazineCancel" class="last-child"><a href="#">メールマガジン解除</a></li>
				 </ul>
				 </div>
 
		<?php
		echo $after_widget;
	}
}
register_widget('Mail_magazine');

class Regist_widget extends WP_Widget {	
	function Regist_widget(){
		parent::WP_Widget('Regist_widget', 
			'Regist_widget', 
			array('description' => 'Regist_widget'));
	}		
	function widget( $args, $instance ) {
		extract($args);	
		echo $before_widget;
		if ( !empty( $title ) ) { 
			echo $before_title . $title . $after_title; } ?>			
				<div id="registMeishoEcoClub" class="corner_box">
					<h3 class="widget_title">名商ecoクラブに登録</h3>
					<div class="text_wrap">
						<p>「名商ｅｃｏクラブ」は名古屋商工会議所の会員企業であれば、ご登録いただけます。<br/>
利用規約等をご確認の上、お申し込みください。</p>
					</div>
					<p class="imgMore"><a href="#">登録はこちら！</a></p>
				</div>
		<?php
		echo $after_widget;
	}
}
register_widget('Regist_widget');
?>