<?php
/*
 * Template Name: Credit page
 */
get_header();
?>

<div class="main credit_page">
	<?php if(have_posts()):
		while(have_posts()):the_post();?>
			<section class="description_wrap">
				<div class="container">
					<h1 class="section_title"><?php the_field('title');?></h1>
					<div class="description"><?php the_field('description');?></div>
				</div>					
			</section>				
			<section class="send_order">
				<div class="container">
					<div class="send_order_content">
						<h2 class="section_title"><?php the_field('order_title')?></h2>
						<div class="send_order_text">
							<?php the_field('order_subtitle')?>
						</div>
						<button class="order_credit">Отправить заявку</button>
					</div>
				</div>
			</section>	
			<section class="advantages">
				<div class="advantages_bg">
					<?php 
						$bg_image = get_field('advs_bg', 'options');
						if(!empty($bg_image)): ?>
							<img src="<?php echo $bg_image['url']?>">
						<?php endif;
					?>		
				</div>
				<div class="container">
					<h2 class="section_title"><?php the_field('advs_title', 'options')?></h2>
					<div class="advantages_list d-flex">
						<?php 
							if(have_rows('advs_list', 'options')):
								while(have_rows('advs_list', 'options')):the_row(); ?>
									<div class="adv_item">
										<div class="adv_icon">
											<?php 
												$icon = get_sub_field('icon');
												if(!empty($icon)): ?>
													<img src="<?php echo $icon['url']?>">
												<?php endif;
											?>
										</div>									
										<div class="adv_content">
											<?php the_sub_field('text')?>
										</div>
									</div>
								<?php endwhile;
							endif;
						?>
					</div>
				</div>
			</section>
			<?php get_template_part('map-block');?>
	<?php endwhile;
	endif;?>
</div>


<?php get_footer(); ?>