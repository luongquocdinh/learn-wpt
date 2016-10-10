<?php
/*
Template Name: News Detail
*/
get_header(); ?>

		<div id="primary">
			<?php if (have_posts()) : while (have_posts()) : the_post(); 
					$custom = get_post_custom($post->ID);
					$category = $custom["category_chooser"][0];
					$upload_image = $custom["upload_image"][0];
					$upload_image = explode( ';', $upload_image);
					$attach_files = array_diff($upload_image, array(""));
			?>	
				
			<div id="content" class="<? echo $category;?>">	
				
				<h2 class="h2_title"><p><span><?php echo $post->post_title; ?></span></p></h2>
				<div class="content_wrapper">
					<?php if($custom["description"][0]!='') : ?>
					<div class="description">
						<?php echo nl2br($custom["description"][0]); ?>
					</div>
					<?php endif;?>
					<table>
						
						<?php 
						
						$arrWeek= array('日','月','火','水','木','金','土');
						if($category == 'workshop'):?>
							<?php if($custom["date"][0]!='') : 
							$date = str_replace("/", "-", $custom["date"][0]);
							$year = date('Y', strtotime($date)) - 1988;
							if($year <= 0) $year = '1970';
							$month = date('n', strtotime($date));
							$day = date('j', strtotime($date));
							$dayofweek = $arrWeek[date('w', strtotime($date))];
						
							?>
							<tr>
								<th>開催日時</th><td><?php echo '平成'.$year.'年'.$month.'月'.$day.'日（'.$dayofweek.'）'; ?> <?php echo nl2br($custom["time"][0]); ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["target"][0]!='') : ?>
							<tr>
								<th>対象</th><td><?php echo nl2br($custom["target"][0]); ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["place"][0]!='') : ?>
							<tr>
								<th>開催場所</th><td><?php echo nl2br($custom["place"][0]); ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["fee"][0]!='') : ?>
							<tr>
								<th>受講料</th><td><?php echo nl2br($custom["fee"][0]); ?></td>
							</tr>
							<?php endif;?>
							
							<?php if($custom["deadline"][0]!='') : 
							$date = str_replace("/", "-", $custom["deadline"][0]);
							$year = date('Y', strtotime($date)) - 1988;
							if($year <= 0) $year = '1970';
							$month = date('n', strtotime($date));
							$day = date('j', strtotime($date));
							$dayofweek = $arrWeek[date('w', strtotime($date))];
							?>
							
							<tr>
								<th>申込み締切日</th><td><?php echo '平成'.$year.'年'.$month.'月'.$day.'日（'.$dayofweek.'）'; ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["charge"][0]!='' || $custom["charge_person"][0]!='') : ?>
							<tr>
								<th>申込みおよび問合せ先</th>
								<td><?php if($custom["charge"][0]!='') : echo nl2br($custom["charge"][0]); ?><br/><?php endif;?>
									<?php if($custom["charge_person"][0]!='') : ?>担当： <?php echo nl2br($custom["charge_person"][0]); ?><br/><?php endif;?>
									<?php if($custom["charge_address"][0]!='') : echo nl2br($custom["charge_address"][0]); ?><br/><?php endif;?> 
									<?php if($custom["charge_tel"][0]!='') : ?>TEL：　<?php echo nl2br($custom["charge_tel"][0]); ?><br/><?php endif;?>
									<?php if($custom["charge_fax"][0]!='') : ?>FAX：　<?php echo nl2br($custom["charge_fax"][0]); ?><br/><?php endif;?>
									<?php if($custom["charge_email"][0]!='') : ?>E-mail： <a href="mailto:<?php echo $custom["charge_email"][0];?>"><?php echo $custom["charge_email"][0]; ?><br/></a><?php endif;?>
								</td>
							</tr>
							<?php endif;?>
							<?php if(count($attach_files)>0){ ?>
							<tr>
								<th>申込み用紙</th><td>
								
								<div class="attach_file">
									<ul id="file_list">
										<?php foreach($attach_files as $link)
												{
													$file =  explode("/", $link);
													$file_name =  $file[count($file) - 1];
													$file_type = pathinfo($file_name, PATHINFO_EXTENSION);?>
													<li class="<?php echo $file_type;?>"><a href="<?php echo $link;?>" target="_blank"><?php echo $file_name;?></a></li>
													<?php
												} ?>
										
									</ul>
								</div>
								</td>
							</tr>
							<?php } ?>
						<?php endif;?>
						
						<?php
	// Meeting
						if($category == 'meeting'):?>
							<?php if($custom["session"][0]!='') : 
							$date = str_replace("/", "-", $custom["session"][0]);
							$year = date('Y', strtotime($date)) - 1988;
							if($year <= 0) $year = '1970';
							$month = date('n', strtotime($date));
							$day = date('j', strtotime($date));
							$dayofweek = $arrWeek[date('w', strtotime($date))];
							?>
							<tr>
								<th>会期</th><td><?php echo '平成'.$year.'年'.$month.'月'.$day.'日（'.$dayofweek.'）'; ?> <?php echo nl2br($custom["session_time"][0]); ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["place_2"][0]!='') : ?>
							<tr>
								<th>会場</th><td><?php echo nl2br($custom["place_2"][0]); ?>
								<?php if($custom["map_link"][0]!='') : ?>
								<p><a target="_blank" href="<?php echo $custom["map_link"][0]; ?>">地図はこちら >></a></p>
								<?php endif;?>
								</td>
							</tr>
							<?php endif;?>
							<?php if($custom["fee_2"][0]!='') : ?>
							<tr>
								<th>参加費</th><td><?php echo nl2br($custom["fee_2"][0]); ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["program"][0]!='') : ?>
							<tr>
								<th>プログラム</th><td><?php echo nl2br($custom["program"][0]); ?></td>
							</tr>
							<?php endif;?>
							<?php if($custom["chief"][0]!='') : ?>
							<tr>
								<th>主査</th><td><?php echo nl2br($custom["chief"][0]); ?></td>
							</tr>
							<?php endif;?>
						<?php endif;?>
					</table>
					
					<?php if($category == 'meeting'):?>
					<?php if($custom["deadline_2"][0]!='' || $custom["present_style"][0]!='') : ?>
					<h3 class="h3_title">募集要項</h3>
					<?php if($custom["general"][0]!='') : ?>
					<div class="description">
						<?php echo nl2br($custom["general"][0]); ?>
					</div>
					<?php endif;?>
					<table>
						<?php if($custom["deadline_2"][0]!='') : ?>
						<tr>
							<th>応募締切日</th><td><?php echo nl2br($custom["deadline_2"][0]); ?></td>
						</tr>
						<?php endif;?>
						<?php if($custom["present_style"][0]!='') : ?>
						<tr>
							<th>発表形式</th><td><?php echo nl2br($custom["present_style"][0]); ?></td>
						</tr>
						<?php endif;?>
						<?php if($custom["charge"][0]!='' || $custom["charge_person"][0]!='') : ?>
						<tr>
							<th>申込みおよび問合せ先</th>
							<td><?php if($custom["charge"][0]!='') : echo nl2br($custom["charge"][0]); ?><br/><?php endif;?>
								<?php if($custom["charge_person"][0]!='') : ?>担当： <?php echo nl2br($custom["charge_person"][0]); ?><br/><?php endif;?>
								<?php if($custom["charge_address"][0]!='') : echo nl2br($custom["charge_address"][0]); ?><br/><?php endif;?> 
								<?php if($custom["charge_tel"][0]!='') : ?>TEL：　<?php echo nl2br($custom["charge_tel"][0]); ?><br/><?php endif;?>
								<?php if($custom["charge_fax"][0]!='') : ?>FAX：　<?php echo nl2br($custom["charge_fax"][0]); ?><br/><?php endif;?>
								<?php if($custom["charge_email"][0]!='') : ?>E-mail： <a href="mailto:<?php echo $custom["charge_email"][0];?>"><?php echo $custom["charge_email"][0]; ?><br/></a><?php endif;?>
							</td>
						</tr>
						<?php endif;?>
						<?php if(count($attach_files)>0){ ?>
						<tr>
							<th>抄録原稿<br/>フォーマット</th><td>
							
							<div class="attach_file">
								<ul id="file_list">
									<?php foreach($attach_files as $link)
											{
												$file = basename($link);
												$file_type = pathinfo($file, PATHINFO_EXTENSION);?>
												<li class="<?php echo $file_type;?>"><a href="<?php echo $link;?>" target="_blank"><?php echo $file;?></a></li>
												<?php
											} ?>
									
								</ul>
							</div>
							</td>
						</tr>
						<?php } ?>
					</table>
					<?php endif;?>
					<?php endif;?>
				</div>
				<?php endwhile; endif; ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar('news'); ?>
<?php get_footer(); ?>

