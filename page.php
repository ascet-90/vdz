<?php
/*
 * Template Name: Main page
 */
get_header();?>

<div class="main default_page">
	<div class="container">
		<?php if(have_posts()):
		while(have_posts()):the_post();
			the_content();
		endwhile;
		endif;
		?>
	</div>	
</div>


<?php get_footer(); ?>