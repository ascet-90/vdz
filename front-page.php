<?php
/*
 * Template Name: Front page
 */
get_header();
?>

	<div class="main front_page">			
		<section class="top_section">
			<div class="top_section_bg">
				<div class="container">
					<div class="scroll_down d-flex">
						<span>Листайте вниз</span>
						<span class="border"></span>
						<img src="<?php echo get_template_directory_uri().'/img/mouse.png'?>">						
					</div>
				</div>
				<?php 
					$bg_image = get_field('top_section_bg');
					if(!empty($bg_image)):?>					
						<img src="<?php echo $bg_image;?>">										
					<?php endif;
				?>				
			</div>
			<div class="container">
				<div class="title_wrap">
					<h1 class="top_section_title"><?php the_field('top_section_title');?></h1>
					<div class="top_section_subtitle">
						<?php the_field('top_section_subtitle');?>
					</div>
				</div>				
			</div>			
		</section>
		<section class="about_company">
			<div class="container">
				<div class="title_bg"><?php the_field('about_company_title')?></div>
				<div class="about_company_wrap d-flex">
					<?php 
						$video_link = get_field('video_link');
						if(!empty($video_link)):
					?>
						<div class="video_wrap">
							<div class="video_link">
								<a href="<?php the_field('video_link')?>" data-thumbnail="<?php echo get_field('video_preloader')['url']?>" class="wplightbox" data-group="set1"><img src="<?php echo get_field('video_preloader')['url']?>"></a>
							</div>
							<span class="video_text"><?php the_field('video_text')?></span>
						</div>
					<?php endif;?>
					<div class="about_company_text_wrap">
						<h2 class="section_title"><?php the_field('about_company_title')?></h2>
						<div class="text"><?php the_field('about_company_text')?></div>
					</div>
				</div>				
			</div>
		</section>
		<?php get_template_part('special-offers')?>
		<?php 
			$bg_image = get_field('catalog_bg');
			$style = '';
			if(!empty($bg_image)):
				$style = 'background-image:url(' . $bg_image['url'] . ');';
			endif;
		?>
		<section class="catalog" style="<?php echo $style?>">
			<div class="container">
				<div class="title_bg">Каталог</div>
				<div class="catalog_list_wrap">
					<h2 class="section_title"><?php the_field('catalog_title')?></h2>
					<div class="catalog_list d-flex">
						<?php 	
						$terms = get_terms(array('taxonomy' => 'catalog_type', 'hide_empty' => false, 'parent' => 0));
						if($terms && !is_wp_error($terms)):
							foreach( $terms as $term ) {?>
								<div class="product" id="<?php echo $term->term_id;?>">
									<a href="<?php echo get_term_link($term, 'catalog_type');?>">
										<div class="product_title d-flex">
											<span><?php echo $term->name;?></span>
											<div class="product_link d-flex">
												<img src="<?php echo get_template_directory_uri() . '/img/product-arrow.png'?>">
											</div>
										</div>
										<div class="product_thumb d-flex">
											<?php 
												$thumb = get_field('thumbnail', $term);
												if(!empty($thumb)): ?>
													<img src="<?php echo $thumb['url']?>" alt="">
												<?php endif;
											?>
										</div>								
									</a>
								</div>
							<?php
						}						
						endif; ?>											
					</div>
					<div class="certificates d-flex">
						<?php 
							if(have_rows('cert_list')):
								while(have_rows('cert_list')):the_row(); ?>
									<div class="cert_item d-flex">
										<img src="<?php echo get_sub_field('cert_bg')['url']?>">
										<div class="cert_text">
											<?php the_sub_field('cert_text')?>
										</div>
									</div>
								<?php endwhile;
							endif;
						?>
					</div>
				</div>
			</div>
		</section>
		<section class="send_order">
			<div class="send_order_bg">
				<?php 
					$bg_image = get_field('send_order_bg');
					if(!empty($bg_image)): ?>
						<img src="<?php echo $bg_image['url']?>">
					<?php endif;
				?>		
			</div>
			<div class="container">
				<?php 
					$bg_image1 = get_field('send_order_bg_1');
					$style = 'background-image:url(' . $bg_image1['url'] . ');';
				?>
				<div class="send_order_content" style="<?php echo $style;?>">
					<h2 class="section_title"><?php the_field('send_order_title')?></h2>
					<div class="send_order_text">
						<?php the_field('send_order_text')?>
					</div>
					<button class="order_call">Заказать звонок</button>
				</div>
			</div>
		</section>	
		<section class="pilomaterials">
			<div class="container">
				<h2 class="section_title"><?php the_field('pilomaterials_title', 'options')?></h2>
				<div class="pilomaterials_content">
					<?php the_field('pilomaterials_text', 'options')?>
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
	</div>
<?php get_footer(); ?>