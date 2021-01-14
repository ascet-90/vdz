<?php
/*
 * Template Name: Production page
 */
get_header();
?>

<div class="main production_page">
	<?php if(have_posts()):
		while(have_posts()):the_post();?>
	<div class="container">
		<div class="catalog_single_wrap d-flex">
			<?php get_sidebar('production');?>
			<div class="content">				
				<h1 class="section_title"><?php the_field('page_title');?></h1>
				<div class="description"><?php the_field('description');?></div>		
				<div class="media_block">
					<div class="videos d-flex">
						<?php 
							if(have_rows('video_list')):
								while(have_rows('video_list')) : the_row();?>
									<div class="video_wrap">
										<div class="video_link">
											<a href="<?php the_sub_field('video_link')?>" data-thumbnail="<?php echo get_sub_field('video_preview')['url']?>" class="wplightbox" data-group="set3"><img src="<?php echo get_sub_field('video_preview')['url']?>"></a>
										</div>
									</div>
								<?php endwhile;
							endif;
						?>
					</div>							
					<div class="media_gallery d-flex">
						<?php 
							if(have_rows('gallery')):
								while(have_rows('gallery')) : the_row();?>
									<div class="media_gallery_item">
										<a href="<?php echo get_sub_field('image')['url'];?>" data-lightbox="media-gallery"><img src="<?php echo get_sub_field('image')['url'];?>"></a>
									</div>
							<?php endwhile;
							endif;
						?>									
					</div>
				</div>
			</div>
		</div>
	</div>		
	<section class="production_text_wrap">
		<div class="container">
			<div class="section_title"><?php the_field('title');?></div>
			<div class="production_text"><?php the_field('text');?></div>
		</div>		
	</section>		
	<?php get_template_part('map-block');?>
	<?php endwhile;
	endif;?>
</div>


<?php get_footer(); ?>