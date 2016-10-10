<div id="secondary" class="widget-area">
	<div id="news" class="widget">
		<script type="text/javascript">
			jQuery(document).ready(function() {
				if(jQuery("#content").attr('class')=='workshop'){
					jQuery("#meeting_news_wrapper").css('margin-bottom','3px');
					jQuery("#workshop_news_ttl").find('img').attr('src', "<?php echo get_template_directory_uri(); ?>/images/common/widget/workshop_news_ttl2_on.jpg");
					jQuery("#workshop_news").load("<?php echo get_template_directory_uri(); ?>/ajax/news.php?cat=workshop_news&page=1");
					jQuery("#meeting_news").hide();
					
				}else{
					jQuery("#meeting_news_ttl").find('img').attr('src', "<?php echo get_template_directory_uri(); ?>/images/common/widget/meeting_news_ttl2_on.jpg");
					jQuery("#meeting_news").load("<?php echo get_template_directory_uri(); ?>/ajax/news.php?cat=meeting_news&page=1");
					jQuery("#workshop_news").hide();
				}

				jQuery(".slideopen").click(function(){
					
					var slide = jQuery(this).parent().next(".widget_content");
						if (!slide.data("loaded")) {
							slide.load("<?php echo get_template_directory_uri(); ?>/ajax/news.php?cat="+slide.attr('id')+"&page=1");
							slide.data("loaded", true);
						}			
					
					if(slide.css('display')=='block'){
						
						if(jQuery(this).parent().attr('id') == 'meeting_news_ttl'){
							jQuery("#meeting_news_wrapper").css('margin-bottom','3px');
							jQuery("#meeting_news_ttl").find('img').attr('src', "<?php echo get_template_directory_uri(); ?>/images/common/widget/meeting_news_ttl2.jpg");
							
						}else if(jQuery(this).parent().attr('id') == 'workshop_news_ttl'){
							jQuery("#workshop_news_ttl").find('img').attr('src', "<?php echo get_template_directory_uri(); ?>/images/common/widget/workshop_news_ttl2.jpg");
						}
					}else if(slide.css('display')=='none'){
					
						if(jQuery(this).parent().attr('id') == 'meeting_news_ttl'){
							jQuery("#meeting_news_wrapper").css('margin-bottom','0px');
							jQuery("#meeting_news_ttl").find('img').attr('src', "<?php echo get_template_directory_uri(); ?>/images/common/widget/meeting_news_ttl2_on.jpg");
							
						}else if(jQuery(this).parent().attr('id') == 'workshop_news_ttl'){
							jQuery("#workshop_news_ttl").find('img').attr('src', "<?php echo get_template_directory_uri(); ?>/images/common/widget/workshop_news_ttl2_on.jpg");
						}
					}
					slide.slideToggle("medium");
					return false;
				});

			});
			
			jQuery("body").on("click", "ul.pagination li a", function(event){
					var slide = jQuery(this).parent().parent().parent();
					slide.load(jQuery(this).attr("href"));
					slide.data("loaded", true);		
					return false;
			});
		</script>
		<h4><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/news_ttl.jpg" width="220" height="32" alt="お知らせ"/></h4>
		<div id = 'meeting_news_wrapper' class="cboth clearFix">
			<h5 id="meeting_news_ttl" class="fleft"><a href="#" class="slideopen"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/meeting_news_ttl2.jpg" width="220" height="30" alt="総会・例会のご案内"/></a></h5>
			<div id="meeting_news" class="widget_content fleft"></div>
		</div>
		
		<div id = 'meeting_news_wrapper' class="cboth clearFix">
			<h5 id="workshop_news_ttl" class="fleft"><a href="#" class="slideopen"><img src="<?php echo get_template_directory_uri(); ?>/images/common/widget/workshop_news_ttl2.jpg" width="220" height="30" alt="講習会・模擬試験のご案内"/></a></h5>
			<div id="workshop_news" class="widget_content fleft"></div>
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