<?php
/*
 * Template Name: Catalog page
 */
get_header();
?>

<div class="main catalog_archive">
	<section class="catalog">
		<div class="container">
			<div class="catalog_list_wrap">
				<h2 class="section_title">Каталог продукции</h2>
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
			</div>
		</div>
	</section>
	<?php get_template_part('special-offers')?>
	<section class="pilomaterials">
		<div class="container">
			<h2 class="section_title"><?php the_field('pilomaterials_title', 'options')?></h2>
			<div class="pilomaterials_content">
				<?php the_field('pilomaterials_text', 'options')?>
			</div>
		</div>
	</section>
	<section class="calculate">
		<div class="calculate_bg">
			<?php 
				$bg_image = get_field('calculate_bg', 'options');
				if(!empty($bg_image)): ?>
					<img src="<?php echo $bg_image['url']?>">
				<?php endif;
			?>		
		</div>
		<div class="container">			
			<div class="calculate_from_wrap">				
				<div class="form">
					<div class="calculate_title">
						<?php the_field('calculate_title', 'options')?>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="335" title="Закажите расчет стоимости материалов"]') ?>
				</div>
				<?php 
					$bg_image1 = get_field('calculate_bg_2', 'options');
					if(!empty($bg_image1)):?>
						<div class="form_image d-flex">
							<img src="<?php echo $bg_image1['url']?>">
						</div>
					<?php endif;
				?>
			</div>			
		</div>		
	</section>
	<?php get_template_part('map-block');?>
</div>


<?php get_footer(); ?>