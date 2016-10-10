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
				<a class="rlov" href="#"><img src="<?php echo bloginfo('template_url'); ?>/images/common/widget/widget_1.jpg" width="0" height="0" alt="" /></a>			  
		<?php
		echo $after_widget;
	}
}
?>