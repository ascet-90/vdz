<?php
/*
 * Template Name: Construction page
 */
get_header();
?>

<div class="main construction_page">
	<?php if(have_posts()):
		while(have_posts()):the_post();?>
		<div class="container">
			<div class="catalog_single_wrap d-flex">
				<?php get_sidebar('noform');?>
				<div class="content">				
					<h1 class="section_title"><?php the_field('page_title');?></h1>
					<div class="description"><?php the_content();?></div>		
					<div class="info_wrap d-flex">
						<div class="info">
							<div class="section_title"><?php the_field('title');?></div>
							<div class="production_text"><?php the_field('description');?></div>
						</div>			
						<div class="form">
							<?php echo do_shortcode('[contact-form-7 id="488" title="Заказать строительство"]'); ?>
						</div>			
					</div>
				</div>
			</div>
		</div>				
		<?php get_template_part('map-block');?>		
	<?php endwhile;
	endif;?>
</div>


<?php get_footer(); ?>