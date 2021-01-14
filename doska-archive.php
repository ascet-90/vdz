<?php
/*
 * Template Name: Doska Archive page
 */
get_header();
?>

<div class="main catalog_archive_page doska_archive">
	<div class="container">
		<div class="catalog_archive_wrap d-flex">
			<?php get_sidebar('catalog-archive');?>
			<div class="content">
				<?php if(have_posts()):
					while(have_posts()):the_post();?>
						<h1 class="catalog_archive_title"><?php the_title();?></h1>
						<?php 
						$pages = get_pages(array('parent' => get_the_ID(),'hierarchical' => false, 'sort_column' => 'post_date', 'sort_order' => 'asc')); 
						if(count($pages) > 0):
						?>
						<div class="catalog_list d-flex">
						<?php foreach( $pages as $post ) {
							setup_postdata( $post ); ?>
							<div class="product" id="<?php the_ID();?>">
								<a href="<?php the_permalink();?>">
									<div class="product_title d-flex">
										<span><?php the_title();?></span>
										<div class="product_link d-flex">
											<img src="<?php echo get_template_directory_uri() . '/img/product-arrow.png'?>">
										</div>
									</div>
									<div class="product_thumb d-flex">
										<?php if(has_post_thumbnail()):
											the_post_thumbnail();
											endif;
										?>
									</div>								
								</a>
							</div>
							<?php
						}
					wp_reset_postdata();?>
					</div>
				<?php endif;?>
				<?php	
					$pages = [];
					$children = get_posts(array('post_type' => 'page', 'post_parent' => get_the_ID(), 'numberposts' => -1));
					if(count($children) > 0):
					foreach($children as $child) {
						$child_ids[] = $child->ID;
					}			
					$pages = get_posts(array('post_type' => 'page', 'numberposts' => -1, 'post_parent__in' => $child_ids));		
					if(isset($_GET['meta_key']) && $_GET['meta_key'] == 'price' && $_GET['order'] == 'DESC') {
						$pages = get_posts(array('post_type' => 'page', 'post_parent__in' => $child_ids, 'meta_key' => 'price','orderby' => 'meta_value_num', 'order' => 'desc', 'numberposts' => -1));
					}
					elseif (isset($_GET['meta_key']) && $_GET['meta_key'] == 'price' && $_GET['order'] == 'ASC') {
						$pages = get_posts(array('post_type' => 'page', 'post_parent__in' => $child_ids, 'meta_key' => 'price','orderby' => 'meta_value_num', 'order' => 'asc', 'numberposts' => -1));
					}
					endif;?>
				<?php if(count($pages) > 0): ?>
				<div class="similar_products">
					<div class="products_sort_wrap d-flex">
						<div class="products_sort d-flex">
							<span>Сортировка</span>
							<select class="sort_dropdown" name="sort-products" id="sort_dropdown" onchange="document.location.href='?'+this.options[this.selectedIndex].value;">
								<option disabled selected="">Популярное</option>
								<option value="meta_key=price&orderby=meta_value_num&order=DESC">Цена: по убыванию</option>
								<option value="meta_key=price&orderby=meta_value_num&order=ASC">Цена: по возрастанию</option>
							</select>
							<script type="text/javascript">
								$(document).ready(function(){
									if(getObject.meta_key != null && getObject.meta_key == 'price' && getObject.order == 'DESC') {
										document.getElementById('sort_dropdown').value="orderby=date&order=DESC";												
										$('#sort_dropdown').val('meta_key=price&orderby=meta_value_num&order=DESC');
										$('#sort_dropdown').niceSelect('update');
									} 
									else if(getObject.meta_key != null && getObject.meta_key == 'price' && getObject.order == 'ASC') {
										document.getElementById('sort_dropdown').value="orderby=date&order=ASC";												
										$('#sort_dropdown').val('meta_key=price&orderby=meta_value_num&order=ASC');
										$('#sort_dropdown').niceSelect('update');
									} 
								});
								
							</script>
						</div>
					</div>
					<div class="similar_products_list d-flex">						
						<?php foreach( $pages as $post ) {
							setup_postdata( $post ); ?>
							<div class="similar_product d-flex" id="<?php the_ID();?>">
								<div class="thumb">
									<a href="<?php the_permalink();?>">
										<?php if(has_post_thumbnail()):
											the_post_thumbnail('similar_thumb');
											endif;
										?>
										<span class="price"><?php if(!empty(get_field('price'))): echo number_format(get_field('price'), 0, '.', ' '); else: echo 0; endif;?> руб.</span>
									</a>
								</div>
								<div class="title">
									<a href="<?php the_permalink();?>">
										<?php the_title();?>
									</a>
								</div>
								<a class="more" href="<?php the_permalink();?>">Подробнее</a>
							</div>
						<?php
						}
						wp_reset_postdata();?>
					</div>
				</div>
				<?php endif;?>
				<?php endwhile;
				endif;?>
			</div>
		</div>
	</div>	
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